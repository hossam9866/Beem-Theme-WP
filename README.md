# Beem 360 Modular WordPress Theme

## Install

1. Copy this folder into `wp-content/themes/`.
2. Activate **Beem 360 Modular** in **Appearance → Themes**.
3. Open **Beem 360 → Theme control** to reorder sections, hide sections, edit English/Arabic/French copy, replace global images, and configure email delivery.
4. If Polylang is active with two or more languages, the language selector appears automatically in the header. Use language slugs `en`, `ar`, and `fr` for the built-in copy.

## Section shortcodes

- `[beem_hero]`
- `[beem_pillars]`
- `[beem_problem]`
- `[beem_solution]`
- `[beem_features]`
- `[beem_cta]`

The front page uses the order saved under **Beem 360 → Theme control**. The same shortcodes can be placed in any page or block editor layout independently. Under **Repeatable items**, header links, pillar cards, comparison rows, hub items, feature rows, and footer links can all be added, removed, reordered, translated, linked, and assigned Media Library images.

## Inquiries and email

Request and contact popup submissions are stored under **Beem 360 → Inquiries** and emailed to the configured notification address. All popup fields are required. Phone numbers use a searchable international selector limited to Arab League countries, defaulting to Saudi Arabia. A branded HTML thank-you message is sent to the visitor through `wp_mail()`.

Use **Beem 360 → Email center** to reply to one contact or send to all collected contacts. The email center includes subject and message fields plus an on-screen preview before sending.

WordPress uses the server's configured mail transport. On production, configure an SMTP plugin or transactional mail provider for reliable delivery.
