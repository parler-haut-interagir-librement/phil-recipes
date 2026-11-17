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
| `phil/accessibility-statement-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_accessibility_statement.yaml` and the routes of `config/routes/phil_accessibility_statement.yaml` |
| `phil/audio-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_audio.yaml` |
| `phil/commerce-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_commerce.yaml` and the routes of `config/routes/phil_commerce.yaml` |
| `phil/data-table-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_data_table.yaml` and the routes of `config/routes/phil_data_table.yaml` |
| `phil/embed-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_embed.yaml` and the routes of `config/routes/phil_embed.yaml`, and adds `EMBED_KEY` to `.env` |
| `phil/forms-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_forms.yaml` and the routes of `config/routes/phil_forms.yaml` |
| `phil/identity-provider-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_identity_provider.yaml` and the routes of `config/routes/phil_identity_provider.yaml` |
| `phil/legal-notices-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_legal_notices.yaml`, the routes of `config/routes/phil_legal_notices.yaml` and the legal notice and privacy policy to fill in `legal/`, in English and in French |
| `phil/lti-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_lti.yaml` and the routes of `config/routes/phil_lti.yaml`, and adds `LTI_MASTER_KEY` to `.env` |
| `phil/mentions-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_mentions.yaml` and `src/Mentions/Members.php`, the member directory to fill |
| `phil/moderation-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_moderation.yaml` and the routes of `config/routes/phil_moderation.yaml` |
| `phil/newsletter-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_newsletter.yaml` and the routes of `config/routes/phil_newsletter.yaml`, and adds `NEWSLETTER_SECRET` to `.env` |
| `phil/onboarding-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_onboarding.yaml` and the routes of `config/routes/phil_onboarding.yaml` |
| `phil/outbox-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_outbox.yaml` |
| `phil/pwa-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_pwa.yaml` and the routes of `config/routes/phil_pwa.yaml` |
| `phil/settings-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_settings.yaml` and the routes of `config/routes/phil_settings.yaml` |
| `phil/status-page-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_status_page.yaml` and the routes of `config/routes/phil_status_page.yaml` |
| `phil/stockroom-bundle` | 0.1 | Registers the bundle and writes `config/packages/phil_stockroom.yaml` |
| `phil/terms-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_terms.yaml`, the routes of `config/routes/phil_terms.yaml` and `src/Terms/CurrentMember.php` and `src/Terms/Members.php`, the member services to fill |
| `phil/ux-css` | 0.1 | Writes `config/packages/phil_ux_css.yaml`, which maps `dist/` in AssetMapper as `phil-ux` |
| `phil/ux-easyadmin-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_ux_easy_admin.yaml` |

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
