<?php if (!defined('ABSPATH')) { exit; } ?><!doctype html>
<html <?php language_attributes(); ?> dir="<?php echo beem360_lang() === 'ar' ? 'rtl' : 'ltr'; ?>">
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width,initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>><?php wp_body_open(); ?>
<nav id="beemNav" class="beem-nav navbar navbar-expand-xl fixed-top" aria-label="<?php esc_attr_e('Primary navigation','beem360'); ?>">
  <div class="container-fluid px-xl-5">
    <a class="navbar-brand beem-brand" href="<?php echo esc_url(beem360_home_url()); ?>">
      <?php if (has_custom_logo()) { the_custom_logo(); } else { ?><img src="<?php echo beem360_media('logo'); ?>" alt="Beem View 360"><b>Beem View <i>360</i></b><?php } ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#beemNavLinks" aria-controls="beemNavLinks" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="beemNavLinks">
      <ul class="navbar-nav me-auto ms-xl-4 beem-nav-links"><?php foreach(beem360_items('navigation') as $item){ ?><li class="nav-item"><a class="nav-link" href="<?php echo esc_url(beem360_link_url((string)($item['url']??'#'))); ?>"><?php echo esc_html($item['label']??''); ?></a></li><?php } ?></ul>
      <div class="beem-nav-actions d-flex align-items-center gap-2">
        <?php echo beem360_language_links(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <a class="beem-login" href="<?php echo esc_url(beem360_login_url()); ?>"><?php echo esc_html(beem360_x('Login','تسجيل الدخول','Connexion')); ?></a>
        <a class="beem-btn beem-btn-sm beem-start-free" href="<?php echo esc_url(beem360_register_url()); ?>"><?php echo esc_html(beem360_x('Start free','ابدأ مجانًا','Commencer gratuitement')); ?> <i class="bi <?php echo beem360_lang()==='ar'?'bi-arrow-up-left':'bi-arrow-up-right'; ?>"></i></a>
      </div>
    </div>
  </div>
</nav>
<main id="content">
