<?php if (!defined('ABSPATH')) { exit; } ?><!doctype html>
<html <?php language_attributes(); ?> dir="<?php echo beem360_lang() === 'ar' ? 'rtl' : 'ltr'; ?>">
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width,initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>><?php wp_body_open(); ?>
<nav id="beemNav" class="beem-nav navbar navbar-expand-lg fixed-top" aria-label="<?php esc_attr_e('Primary navigation','beem360'); ?>">
  <div class="container-fluid px-lg-5">
    <a class="navbar-brand beem-brand" href="<?php echo esc_url(home_url('/')); ?>">
      <?php if (has_custom_logo()) { the_custom_logo(); } else { ?><img src="<?php echo beem360_asset('01-beem-360.png'); ?>" alt="Beem 360"><b>Beem <i>360</i></b><?php } ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#beemNavLinks" aria-controls="beemNavLinks" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="beemNavLinks">
      <ul class="navbar-nav me-auto ms-lg-5 beem-nav-links">
        <li class="nav-item"><a class="nav-link" href="#platform"><?php echo esc_html(beem360_lang()==='ar'?'المنصة':(beem360_lang()==='fr'?'Plateforme':'Platform')); ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#features"><?php echo esc_html(beem360_lang()==='ar'?'المزايا':(beem360_lang()==='fr'?'Fonctionnalités':'Features')); ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#ai"><?php echo esc_html(beem360_lang()==='ar'?'رؤى الذكاء الاصطناعي':(beem360_lang()==='fr'?'Insights IA':'AI Insights')); ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#workflow"><?php echo esc_html(beem360_lang()==='ar'?'سير العمل':(beem360_lang()==='fr'?'Flux de travail':'Workflow')); ?></a></li>
      </ul>
      <div class="beem-nav-actions d-flex align-items-center gap-2">
        <?php echo beem360_language_links(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <a class="beem-login d-none d-xl-inline" href="<?php echo esc_url(beem360_options()['login_url']); ?>"><?php echo esc_html(beem360_lang()==='ar'?'تسجيل الدخول':(beem360_lang()==='fr'?'Connexion':'Log in')); ?></a>
        <button class="beem-btn beem-btn-sm" data-beem-modal="request"><?php echo esc_html(beem360_t('hero_primary')); ?> <i class="bi bi-arrow-up-right"></i></button>
      </div>
    </div>
  </div>
</nav>
<main id="content">
