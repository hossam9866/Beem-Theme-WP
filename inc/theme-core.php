<?php
if (!defined('ABSPATH')) { exit; }

function beem360_sections(): array {
    return [
        'hero' => 'Hero',
        'pillars' => 'Four pillars',
        'problem' => 'Problem / comparison',
        'solution' => 'Connected solution',
        'features' => 'Feature breakdowns',
        'cta' => 'Get started',
    ];
}

function beem360_defaults(): array {
    return [
        'section_order' => array_keys(beem360_sections()),
        'enabled' => array_fill_keys(array_keys(beem360_sections()), 1),
        'admin_email' => get_option('admin_email'),
        'from_name' => get_bloginfo('name') ?: 'Beem 360',
        'from_email' => get_option('admin_email'),
        'login_url' => '#',
        'privacy_url' => '#',
        'terms_url' => '#',
        'copy' => [
            'hero_kicker' => ['en'=>'Overview','ar'=>'نظرة عامة','fr'=>'Aperçu'],
            'hero_title' => ['en'=>'Clarity for every decision.','ar'=>'وضوح في كل قرار.','fr'=>'De la clarté pour chaque décision.'],
            'hero_text' => ['en'=>'Beem 360 connects your tasks, teams, and data in one intelligent workspace. See everything. Decide faster.','ar'=>'يربط Beem 360 مهامك وفرقك وبياناتك في مساحة عمل ذكية واحدة. شاهد كل شيء واتخذ القرار أسرع.','fr'=>'Beem 360 connecte vos tâches, vos équipes et vos données dans un espace intelligent unique. Voyez tout. Décidez plus vite.'],
            'hero_primary' => ['en'=>'Book a Demo','ar'=>'احجز عرضًا توضيحيًا','fr'=>'Réserver une démo'],
            'hero_secondary' => ['en'=>'Contact us','ar'=>'تواصل معنا','fr'=>'Nous contacter'],
            'pillars_title' => ['en'=>'Four pillars. One connected system.','ar'=>'أربع ركائز. نظام واحد مترابط.','fr'=>'Quatre piliers. Un système connecté.'],
            'pillars_text' => ['en'=>'Everything leaders need to see, teams need to execute, and companies need to scale.','ar'=>'كل ما يحتاجه القادة للرؤية والفرق للتنفيذ والشركات للنمو.','fr'=>'Tout ce que les dirigeants doivent voir, les équipes exécuter et les entreprises développer.'],
            'problem_title' => ['en'=>'Work is scattered across too many tools.','ar'=>'العمل مشتت بين عدد كبير من الأدوات.','fr'=>'Le travail est dispersé dans trop d’outils.'],
            'problem_text' => ['en'=>'Important updates, files, and tasks live in different places — and nothing is truly connected.','ar'=>'التحديثات والملفات والمهام المهمة موجودة في أماكن مختلفة — ولا شيء مترابط فعليًا.','fr'=>'Les mises à jour, fichiers et tâches sont éparpillés — rien n’est vraiment connecté.'],
            'solution_title' => ['en'=>'Beem 360 connects everything that matters.','ar'=>'Beem 360 يربط كل ما يهم.','fr'=>'Beem 360 connecte tout ce qui compte.'],
            'solution_text' => ['en'=>'All your work, data, and teams in one intelligent command center.','ar'=>'كل أعمالك وبياناتك وفرقك في مركز قيادة ذكي واحد.','fr'=>'Tout votre travail, vos données et vos équipes dans un centre de commande intelligent.'],
            'features_title' => ['en'=>'Powerful features that drive results.','ar'=>'مزايا قوية تصنع النتائج.','fr'=>'Des fonctionnalités puissantes qui génèrent des résultats.'],
            'features_text' => ['en'=>'Real product screens, presented feature by feature.','ar'=>'شاشات فعلية من المنتج، معروضة ميزة بعد أخرى.','fr'=>'De vrais écrans produit, fonctionnalité par fonctionnalité.'],
            'cta_title' => ['en'=>'One workspace. Total clarity. Better results.','ar'=>'مساحة عمل واحدة. وضوح كامل. نتائج أفضل.','fr'=>'Un espace. Une clarté totale. De meilleurs résultats.'],
            'cta_text' => ['en'=>'Ready to bring clarity to your business?','ar'=>'هل أنت مستعد لإضافة الوضوح إلى أعمالك؟','fr'=>'Prêt à apporter de la clarté à votre entreprise ?'],
        ],
    ];
}

function beem360_options(): array {
    return array_replace_recursive(beem360_defaults(), (array) get_option('beem360_options', []));
}

function beem360_lang(): string {
    if (function_exists('pll_current_language')) {
        $lang = pll_current_language('slug');
        if ($lang) { return substr(sanitize_key($lang), 0, 2); }
    }
    return substr(determine_locale(), 0, 2);
}

function beem360_t(string $key): string {
    $options = beem360_options();
    $value = $options['copy'][$key] ?? '';
    if (!is_array($value)) { return (string) $value; }
    $lang = beem360_lang();
    return (string) ($value[$lang] ?? $value['en'] ?? reset($value));
}

function beem360_x(string $en, string $ar, string $fr): string {
    return match (beem360_lang()) { 'ar' => $ar, 'fr' => $fr, default => $en };
}

function beem360_asset(string $file): string {
    return esc_url(BEEM360_URI . '/assets/images/' . ltrim($file, '/'));
}

function beem360_setup(): void {
    load_theme_textdomain('beem360', BEEM360_DIR . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', ['height'=>80, 'width'=>220, 'flex-height'=>true, 'flex-width'=>true]);
    add_theme_support('html5', ['search-form','comment-form','gallery','caption','style','script']);
    register_nav_menus(['primary'=>__('Primary navigation','beem360')]);
}
add_action('after_setup_theme', 'beem360_setup');

function beem360_assets(): void {
    wp_enqueue_style('beem360-font', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Noto+Kufi+Arabic:wght@400;500;600;700;800&display=swap', [], null);
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css', [], '5.3.8');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css', [], '1.13.1');
    wp_enqueue_style('beem360', BEEM360_URI . '/assets/css/beem360.css', ['bootstrap','bootstrap-icons'], BEEM360_VERSION);
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', [], '5.3.8', true);
    wp_enqueue_script('beem360', BEEM360_URI . '/assets/js/beem360.js', ['bootstrap'], BEEM360_VERSION, true);
    wp_localize_script('beem360', 'Beem360', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('beem360_inquiry'),
        'sending' => beem360_lang() === 'ar' ? 'جارٍ الإرسال…' : (beem360_lang() === 'fr' ? 'Envoi…' : 'Sending…'),
    ]);
}
add_action('wp_enqueue_scripts', 'beem360_assets');

function beem360_body_classes(array $classes): array {
    $classes[] = 'beem360-theme';
    $classes[] = beem360_lang() === 'ar' ? 'beem-rtl' : 'beem-ltr';
    return $classes;
}
add_filter('body_class', 'beem360_body_classes');

function beem360_language_links(): string {
    if (!function_exists('pll_the_languages')) { return ''; }
    $languages = pll_the_languages(['raw'=>1, 'hide_if_empty'=>0]);
    if (!is_array($languages) || count($languages) < 2) { return ''; }
    $out = '<div class="dropdown beem-languages"><button class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-globe2"></i> ' . esc_html(strtoupper(beem360_lang())) . '</button><ul class="dropdown-menu dropdown-menu-end">';
    foreach ($languages as $language) {
        $out .= '<li><a class="dropdown-item' . (!empty($language['current_lang']) ? ' active' : '') . '" href="' . esc_url($language['url']) . '" hreflang="' . esc_attr($language['slug']) . '">' . esc_html($language['name']) . '</a></li>';
    }
    return $out . '</ul></div>';
}
