# PHIL recipes

The Symfony Flex recipes of the PHIL packages (Proclaim Honestly, Interact Liberally). Until the packages have their
public launch, a site reads them from this repository; at the launch, the recipes are proposed to
[symfony/recipes-contrib](https://github.com/symfony/recipes-contrib), and this repository is no longer needed.

## Use it from a site

Add one line to the `composer.json` of the site, keeping the official recipes with `flex://defaults`:

```json
{
    "extra": {
        "symfony": {
            "endpoint": [
                "https://raw.githubusercontent.com/parler-haut-interagir-librement/phil-recipes/main/endpoint/index.json",
                "flex://defaults"
            ]
        }
    }
}
```

A `composer require` of a package listed here then applies its recipe.

| Package | Versions | What the recipe does |
|---|---|---|
| `phil/ux-css` | 0.1 | Writes `config/packages/phil_ux_css.yaml`, which maps `dist/` in AssetMapper as `phil-ux` |

## Layout

| Path | What it holds |
|---|---|
| `<vendor>/<package>/<version>/manifest.json` and its files | The sources of a recipe, in the shape of `symfony/recipes` |
| `endpoint/index.json` | The list of the recipes and the links Flex follows, `recipe_template` among them |
| `endpoint/<vendor>.<package>.<version>.json` | One recipe, its manifest and its files inlined |
| `repository.txt` | The GitHub repository, `owner/name`: the one value to change when it moves |
| `bin/build-endpoint.php` | Writes `endpoint/` and the address above from the sources and `repository.txt` |

## Change a recipe

Edit the sources, then write the endpoint again; nothing else in `endpoint/` is edited by hand.

```sh
php bin/build-endpoint.php
php bin/build-endpoint.php --check    # fails while endpoint/ or this file are out of date
```

Requires PHP 8.5 or later, with no package to install.

## License

MIT, see [LICENSE](LICENSE).
