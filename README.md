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
| `phil/calendar-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_calendar.yaml` and the routes of `config/routes/phil_calendar.yaml` |
| `phil/circuit-breaker-bundle` | 0.2 | Registers the bundle, writes `config/packages/phil_circuit_breaker.yaml`, with its options and an example circuit commented |
| `phil/commerce-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_commerce.yaml` and the routes of `config/routes/phil_commerce.yaml` |
| `phil/commerce-consignment-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_commerce_consignment.yaml` |
| `phil/commerce-reports-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_commerce_reports.yaml` |
| `phil/conversation-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_conversation.yaml` and the routes of `config/routes/phil_conversation.yaml`, and adds `PHIL_CONVERSATION_KEY` to `.env` |
| `phil/cors-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_cors.yaml`, and adds `CORS_ALLOW_ORIGIN` to `.env` |
| `phil/courses-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_courses.yaml` and the routes of `config/routes/phil_courses.yaml`, and adds `PHIL_COURSES_CONTENT_URL` and `PHIL_COURSES_HOME_PAGE` to `.env` |
| `phil/data-table-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_data_table.yaml` and the routes of `config/routes/phil_data_table.yaml` |
| `phil/document-import-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_document_import.yaml` |
| `phil/email-address-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_email_address.yaml` and the routes of `config/routes/phil_email_address.yaml` |
| `phil/email-templates-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_email_templates.yaml`, the admin routes of `config/routes/phil_email_templates_admin.yaml`, and an `email_templates/` folder with its README |
| `phil/embed-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_embed.yaml` and the routes of `config/routes/phil_embed.yaml`, and adds `EMBED_KEY` to `.env` |
| `phil/error-tracking-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_error_tracking.yaml` and the routes of `config/routes/phil_error_tracking.yaml` |
| `phil/faq-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_faq.yaml` and the routes of `config/routes/phil_faq.yaml` |
| `phil/feature-flags-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_feature_flags.yaml`, with the anonymous context and its other options commented |
| `phil/feed-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_feed.yaml` and the routes of `config/routes/phil_feed.yaml` |
| `phil/follow-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_follow.yaml` and the routes of `config/routes/phil_follow.yaml` |
| `phil/forms-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_forms.yaml` and the routes of `config/routes/phil_forms.yaml` |
| `phil/helpdesk-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_helpdesk.yaml` and the routes of `config/routes/phil_helpdesk.yaml` |
| `phil/identity-provider-bundle` | 0.1, 0.3 | Registers the bundle, writes `config/packages/phil_identity_provider.yaml` and the routes of `config/routes/phil_identity_provider.yaml`; from 0.3, with `public_origin` read from `APP_PUBLIC_ORIGIN` |
| `phil/identity-provider-google` | 0.1 | Registers the bundle, writes `config/packages/phil_identity_provider_google.yaml` and the routes of `config/routes/phil_identity_provider_google.yaml`, and adds `GOOGLE_CLIENT_ID` to `.env` |
| `phil/incident-mode-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_incident_mode.yaml` and the routes of `config/routes/phil_incident_mode.yaml` |
| `phil/legal-notices-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_legal_notices.yaml`, the routes of `config/routes/phil_legal_notices.yaml` and the legal notice and privacy policy to fill in `legal/`, in English and in French |
| `phil/library-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_library.yaml` and the routes of `config/routes/phil_library.yaml` |
| `phil/licensing-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_licensing.yaml` |
| `phil/lti-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_lti.yaml` and the routes of `config/routes/phil_lti.yaml`, and adds `LTI_MASTER_KEY` to `.env` |
| `phil/map-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_map.yaml` and the routes of `config/routes/phil_map.yaml` |
| `phil/mentions-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_mentions.yaml` and `src/Mentions/Members.php`, the member directory to fill |
| `phil/moderation-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_moderation.yaml` and the routes of `config/routes/phil_moderation.yaml` |
| `phil/newsletter-archive` | 0.1 | Registers the bundle, writes `config/packages/phil_newsletter_archive.yaml` and the routes of `config/routes/phil_newsletter_archive.yaml` |
| `phil/newsletter-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_newsletter.yaml` and the routes of `config/routes/phil_newsletter.yaml`, and adds `NEWSLETTER_SECRET` to `.env` |
| `phil/onboarding-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_onboarding.yaml` and the routes of `config/routes/phil_onboarding.yaml` |
| `phil/organizations-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_organizations.yaml`, and adds `ORGANIZATIONS_INVITATION_KEY` to `.env` |
| `phil/outbox-bundle` | 0.1, 0.2 | Registers the bundle, writes `config/packages/phil_outbox.yaml`; from 0.2, with `relay.unknown_type_grace` |
| `phil/privacy-bundle` | 0.2 | Registers the bundle, writes `config/packages/phil_privacy.yaml`, with `public_origin` read from `APP_PUBLIC_ORIGIN` |
| `phil/pwa-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_pwa.yaml` and the routes of `config/routes/phil_pwa.yaml` |
| `phil/reactions-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_reactions.yaml`, the routes of `config/routes/phil_reactions.yaml` and `src/Reactions/CurrentMember.php`, the member service to fill |
| `phil/reservation-bundle` | 0.1 | Registers the bundle |
| `phil/reviews-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_reviews.yaml` and the routes of `config/routes/phil_reviews.yaml` |
| `phil/saml-sp-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_saml_sp.yaml` and the routes of `config/routes/phil_saml_sp.yaml`, and adds `SAML_SP_CERTIFICATE` and `SAML_SP_PRIVATE_KEY` to `.env` |
| `phil/scheduling-poll-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_scheduling_poll.yaml` and the routes of `config/routes/phil_scheduling_poll.yaml`, and adds `SCHEDULING_POLL_LINK_KEY` to `.env` |
| `phil/settings-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_settings.yaml` and the routes of `config/routes/phil_settings.yaml` |
| `phil/shifts-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_shifts.yaml` and the routes of `config/routes/phil_shifts.yaml` |
| `phil/short-link-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_short_link.yaml` and the routes of `config/routes/phil_short_link.yaml`, and adds `SHORT_LINK_HOST` and `SHORT_LINK_TARGET_HOST` to `.env` |
| `phil/sites-console-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_sites_console.yaml` and the routes of `config/routes/phil_sites_console.yaml` |
| `phil/slides` | 0.1 | Registers the bundle, writes `config/packages/phil_slides.yaml` and the routes of `config/routes/phil_slides.yaml` |
| `phil/status-page-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_status_page.yaml` and the routes of `config/routes/phil_status_page.yaml` |
| `phil/stockroom-bundle` | 0.1 | Registers the bundle and writes `config/packages/phil_stockroom.yaml` |
| `phil/survey-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_survey.yaml` and the routes of `config/routes/phil_survey.yaml` |
| `phil/terms-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_terms.yaml`, the routes of `config/routes/phil_terms.yaml` and `src/Terms/CurrentMember.php` and `src/Terms/Members.php`, the member services to fill |
| `phil/user-secrets-bundle` | 0.1 | Registers the bundle and Symfony's KeyManagementBundle, writes `config/packages/phil_user_secrets.yaml` and `config/packages/key_management.yaml`, and adds `USER_SECRETS_KEY_2026` to `.env` |
| `phil/ux-css` | 0.1 | Writes `config/packages/phil_ux_css.yaml`, which maps `dist/` in AssetMapper as `phil-ux` |
| `phil/ux-easyadmin-bundle` | 0.1 | Registers the bundle, writes `config/packages/phil_ux_easy_admin.yaml` |
| `phil/waitlist-bundle` | 0.1 | Registers the bundle |
| `phil/workshops-bundle` | 0.1 | Registers the bundle |

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
