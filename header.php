<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<?php
$body_class = beem360_is_rtl() ? 'beem-rtl' : '';
?>
<body <?php body_class($body_class); ?>>
<a class="skip-link screen-reader-text" href="#beem-main-content"><?php esc_html_e('Skip to content', 'beem360'); ?></a>

<header class="beem-header">
    <div class="container d-flex flex-wrap align-items-center justify-content-between gap-3">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="beem-brand d-flex align-items-center">
            <img src="<?php echo esc_url(beem360_get_data()['logo_url']); ?>" alt="<?php echo esc_attr(beem360_localize_value(beem360_get_data()['copy']['brand_name'], beem360_language())); ?>">
            <span><?php echo esc_html(beem360_localize_value(beem360_get_data()['copy']['brand_name'], beem360_language())); ?></span>
        </a>

        <button class="btn btn-outline-primary d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#beemMainMenu" aria-controls="beemMainMenu" aria-expanded="false" aria-label="<?php esc_attr_e('Menu', 'beem360'); ?>">
            <i class="bi bi-list"></i> <?php echo esc_html(beem360_localize_value(beem360_get_data()['copy']['menu_label'], beem360_language())); ?>
        </button>

        <div class="collapse d-lg-flex align-items-center justify-content-between flex-grow-1 gap-3" id="beemMainMenu">
            <ul class="nav">
                <?php echo beem360_section_menu_links(); ?>
            </ul>
            <div class="beem-header-actions d-flex gap-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#beem-contact-modal" data-type="request">
                    <?php echo esc_html(beem360_localize_value(beem360_get_data()['copy']['hero_request_btn'], beem360_language())); ?>
                </button>
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#beem-contact-modal" data-type="contact">
                    <?php echo esc_html(beem360_localize_value(beem360_get_data()['copy']['header_contact'], beem360_language())); ?>
                </button>
                <a href="<?php echo esc_url(beem360_localize_value(beem360_get_data()['copy']['hero_login_url'], beem360_language())); ?>" class="btn btn-link">
                    <?php echo esc_html(beem360_localize_value(beem360_get_data()['copy']['header_login'], beem360_language())); ?>
                </a>
            </div>
            <?php $langs = beem360_language_switcher(); ?>
            <?php if (! empty($langs)) : ?>
                <?php echo $langs; ?>
            <?php endif; ?>
        </div>
    </div>
</header>

<main id="beem-main-content">
