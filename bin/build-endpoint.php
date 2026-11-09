#!/usr/bin/env php
<?php

declare(strict_types=1);

/*
 * Writes endpoint/, what Symfony Flex downloads, from the recipes under <vendor>/<package>/<version>/ and from
 * repository.txt, the one value to change when the repository moves: an index and one JSON file per recipe, each
 * manifest with its files inlined. `--check` writes nothing and fails while endpoint/ or the README are out of date.
 */

const ROOT = __DIR__.'/..';
const BRANCH = 'main';

/**
 * @return list<string> Every file under a directory, relative to it, sorted
 */
function filesOf(string $directory): array
{
    $files = [];
    $entries = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS));

    foreach ($entries as $entry) {
        if ($entry->isFile()) {
            $files[] = substr($entry->getPathname(), strlen($directory) + 1);
        }
    }

    sort($files);

    return $files;
}

/**
 * @return array<string, mixed>
 */
function recipeOf(string $package, string $version): array
{
    $directory = ROOT.'/'.$package.'/'.$version;
    $manifest = json_decode((string) file_get_contents($directory.'/manifest.json'), true, 16, JSON_THROW_ON_ERROR);
    $files = [];

    foreach (filesOf($directory) as $file) {
        if ('manifest.json' === $file) {
            continue;
        }

        $contents = (string) file_get_contents($directory.'/'.$file);
        $files[$file] = [
            'contents' => preg_match('//u', $contents) ? explode("\n", $contents) : base64_encode($contents),
            'executable' => is_executable($directory.'/'.$file),
        ];
    }

    $recipe = ['manifest' => $manifest];

    if ([] !== $files) {
        $recipe['files'] = $files;
    }

    return ['manifests' => [$package => $recipe + ['ref' => sha1(json_encode($recipe, JSON_THROW_ON_ERROR))]]];
}

function encoded(mixed $value): string
{
    return json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR)."\n";
}

/**
 * @return array<string, string> What endpoint/ holds, by file name
 */
function endpoint(string $repository): array
{
    $files = [];
    $recipes = [];

    foreach (glob(ROOT.'/*/*/*/manifest.json') ?: [] as $manifest) {
        $version = basename(dirname($manifest));
        $package = basename(dirname($manifest, 3)).'/'.basename(dirname($manifest, 2));
        $recipes[$package][] = $version;
        $files[str_replace('/', '.', $package).'.'.$version.'.json'] = encoded(recipeOf($package, $version));
    }

    ksort($recipes);

    $raw = 'https://raw.githubusercontent.com/'.$repository.'/'.BRANCH.'/endpoint/';
    $files['index.json'] = encoded([
        'aliases' => new stdClass(),
        'recipes' => $recipes,
        'branch' => BRANCH,
        'is_contrib' => true,
        '_links' => [
            'repository' => 'github.com/'.$repository,
            'origin_template' => '{package}:{version}@github.com/'.$repository.':'.BRANCH,
            'recipe_template' => $raw.'{package_dotted}.{version}.json',
            'recipe_template_relative' => '{package_dotted}.{version}.json',
        ],
    ]);
    ksort($files);

    return $files;
}

function readme(string $repository): string
{
    $line = '"https://raw.githubusercontent.com/'.$repository.'/'.BRANCH.'/endpoint/index.json"';

    return (string) preg_replace('/"https:\/\/raw\.githubusercontent\.com\/[^"]+\/endpoint\/index\.json"/', $line, (string) file_get_contents(ROOT.'/README.md'));
}

$repository = trim((string) file_get_contents(ROOT.'/repository.txt'));
$files = endpoint($repository);
$check = in_array('--check', $argv, true);
$stale = [];

foreach ($files as $name => $contents) {
    if (!$check) {
        @mkdir(ROOT.'/endpoint');
        file_put_contents(ROOT.'/endpoint/'.$name, $contents);
    } elseif (!is_file(ROOT.'/endpoint/'.$name) || (string) file_get_contents(ROOT.'/endpoint/'.$name) !== $contents) {
        $stale[] = 'endpoint/'.$name;
    }
}

foreach (is_dir(ROOT.'/endpoint') ? filesOf(ROOT.'/endpoint') : [] as $name) {
    if (!isset($files[$name])) {
        $check ? $stale[] = 'endpoint/'.$name : unlink(ROOT.'/endpoint/'.$name);
    }
}

if (!$check) {
    file_put_contents(ROOT.'/README.md', readme($repository));
} elseif ((string) file_get_contents(ROOT.'/README.md') !== readme($repository)) {
    $stale[] = 'README.md';
}

if ([] !== $stale) {
    fwrite(STDERR, implode("\n", $stale)." out of date: run php bin/build-endpoint.php.\n");

    exit(1);
}

echo $check ? "The endpoint is up to date.\n" : count($files)." files written under endpoint/.\n";
