<?php
if (!defined('ABSPATH')) { exit; }

function beem360_capture(callable $renderer): string {
    ob_start(); $renderer(); return (string) ob_get_clean();
}

function beem360_lines(string $value): array {
    $lines=preg_split('/\r\n|\r|\n/u',$value)?:[];
    return array_values(array_filter(array_map('trim',$lines),static fn(string $line): bool=>$line!==''));
}

function beem360_device(string $primary, string $alt, string $secondary = ''): void { ?>
  <div class="beem-device beem-spot">
    <div class="beem-device-rail"><img src="<?php echo beem360_asset('02-brand-mark.png'); ?>" alt=""><i></i><i></i><i></i><i></i><i></i><i></i></div>
    <div class="beem-device-body"><div class="beem-shot"><img src="<?php echo beem360_image_url($primary); ?>" alt="<?php echo esc_attr($alt); ?>"></div><?php if ($secondary) { ?><div class="beem-shot beem-shot-scroll"><img src="<?php echo beem360_image_url($secondary); ?>" alt=""></div><?php } ?></div>
  </div><?php
}

function beem360_hero_shortcode(): string {
    return beem360_capture(function () { ?>
    <header class="beem-hero" id="overview"><div class="beem-blob beem-blob-a"></div><div class="beem-blob beem-blob-b"></div>
      <div class="container beem-hero-grid">
        <div class="beem-reveal">
          <div class="beem-overline"><?php echo esc_html(beem360_t('hero_kicker')); ?></div>
          <h1><?php $title=beem360_t('hero_title'); $parts=explode(' ', $title); ?><span class="beem-blue"><?php echo esc_html(array_shift($parts)); ?></span> <?php echo beem360_text_breaks(implode(' ', $parts)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h1>
          <div class="beem-rich-copy"><?php echo beem360_content('hero_text'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
          <div class="d-flex flex-wrap gap-3"><button class="beem-btn" data-beem-modal="request"><?php echo esc_html(beem360_t('hero_primary')); ?> <i class="bi bi-arrow-right"></i></button><button class="beem-btn beem-btn-ghost" data-beem-modal="contact"><i class="bi bi-chat-dots"></i> <?php echo esc_html(beem360_t('hero_secondary')); ?></button></div>
        </div>
        <div class="beem-hero-visual beem-reveal-scale">
          <div class="beem-float-card beem-float-one"><small><?php echo esc_html(beem360_x('Health Score','مؤشر الأداء','Indice de santé')); ?></small><strong data-count="89">0</strong><span>▲ <?php echo esc_html(beem360_x('live','مباشر','en direct')); ?></span></div>
          <div class="beem-float-card beem-float-two"><small><?php echo esc_html(beem360_x('Tasks Done','المهام المكتملة','Tâches terminées')); ?></small><strong data-count="164">0</strong><span>▲ 8%</span></div>
          <?php beem360_device((string)beem360_options()['media']['hero_primary'],beem360_x('System KPIs','مؤشرات أداء النظام','Indicateurs du système'),(string)beem360_options()['media']['hero_secondary']); ?>
        </div>
      </div>
    </header><?php });
}
add_shortcode('beem_hero', 'beem360_hero_shortcode');

function beem360_pillars_shortcode(): string {
    $cards = beem360_items('pillars');
    return beem360_capture(function () use ($cards) { ?>
    <section class="beem-section beem-pillars" id="platform"><div class="container">
      <div class="beem-mark beem-reveal-scale"><img src="<?php echo beem360_asset('05-beem-360.png'); ?>" alt="Beem View 360"></div>
      <div class="beem-section-head text-center beem-reveal"><h2><?php echo beem360_text_breaks(beem360_t('pillars_title')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2><div class="beem-rich-copy"><?php echo beem360_content('pillars_text'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></div>
      <div class="row g-4 justify-content-center"><?php foreach ($cards as $card) { $chips=beem360_lines((string)($card['chips']??'')); ?><div class="col-md-6"><article class="beem-pillar-card beem-spot beem-reveal-scale"><div class="beem-card-icon <?php echo esc_attr($card['color']??'blue'); ?>"><i class="bi <?php echo esc_attr($card['icon']??'bi-grid'); ?>"></i></div><h3><?php echo beem360_text_breaks((string)($card['title']??'')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h3><div class="beem-rich-copy"><?php echo beem360_format_content((string)($card['text']??'')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div><div class="beem-chips"><?php foreach ($chips as $chip) { ?><span><?php echo esc_html($chip); ?></span><?php } ?></div><?php if(!empty($card['image'])){?><div class="beem-card-shot"><img src="<?php echo beem360_image_url($card['image']); ?>" alt=""></div><?php } ?><?php if(!empty($card['url'])){?><a class="beem-card-link" href="<?php echo esc_url($card['url']); ?>" aria-label="<?php echo esc_attr($card['title']??''); ?>"></a><?php } ?></article></div><?php } ?></div>
    </div></section><?php });
}
add_shortcode('beem_pillars', 'beem360_pillars_shortcode');

function beem360_problem_shortcode(): string {
    $bad=beem360_items('problem_bad'); $good=beem360_items('problem_good');
    return beem360_capture(function () use ($bad,$good) { ?>
    <section class="beem-section" id="problem"><div class="container"><div class="beem-section-head text-center beem-reveal"><div class="beem-num"><b>01</b> <?php echo esc_html(beem360_x('THE PROBLEM','التحدي','LE DÉFI')); ?></div><h2><?php echo beem360_text_breaks(beem360_t('problem_title')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2><div class="beem-rich-copy"><?php echo beem360_content('problem_text'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></div>
      <div class="beem-compare"><article class="beem-compare-card is-bad beem-reveal"><h3><i class="bi bi-x-circle"></i> <?php echo esc_html(beem360_x('WITHOUT BEEM VIEW 360','بدون بيم ڤيو 360','SANS BEEM VIEW 360')); ?></h3><?php foreach($bad as $row){?><div><i class="bi bi-x"></i><b><?php echo esc_html($row['label']??''); ?></b><small><?php echo esc_html($row['meta']??''); ?></small></div><?php } ?></article>
      <div class="beem-compare-arrow"><span><i class="bi <?php echo beem360_lang()==='ar'?'bi-arrow-left':'bi-arrow-right'; ?>"></i></span><small><?php echo esc_html(beem360_x('ONE SYSTEM','نظام واحد','UN SEUL SYSTÈME')); ?></small></div>
      <article class="beem-compare-card is-good beem-spot beem-reveal"><h3 class="beem-mini-brand"><img src="<?php echo beem360_asset('10-brand-mark.png'); ?>" alt=""> Beem View <em>360</em></h3><?php foreach($good as $row){?><div><i class="bi bi-check"></i><b><?php echo esc_html($row['label']??''); ?></b><small><?php echo esc_html($row['meta']??''); ?></small></div><?php } ?></article></div>
    </div></section><?php });
}
add_shortcode('beem_problem', 'beem360_problem_shortcode');

function beem360_solution_shortcode(): string {
    $left=beem360_items('hub_left'); $right=beem360_items('hub_right');
    return beem360_capture(function () use ($left,$right) { ?>
    <section class="beem-section beem-solution" id="workflow"><div class="container"><div class="beem-section-head text-center beem-reveal"><div class="beem-num"><b>02</b> <?php echo esc_html(beem360_x('THE SOLUTION','الحل','LA SOLUTION')); ?></div><h2><?php echo beem360_text_breaks(beem360_t('solution_title')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2><div class="beem-rich-copy"><?php echo beem360_content('solution_text'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></div>
      <div class="beem-hub beem-reveal"><div class="beem-hub-panel"><?php foreach($left as $item){?><div><i class="bi <?php echo esc_attr($item['icon']??'bi-circle'); ?>"></i><?php echo esc_html($item['label']??''); ?></div><?php } ?></div><div class="beem-hub-core"><img src="<?php echo beem360_asset('11-brand-mark.png'); ?>" alt=""><b>Beem View <em>360</em></b></div><div class="beem-hub-panel is-right"><?php foreach($right as $item){?><div><i class="bi <?php echo esc_attr($item['icon']??'bi-circle'); ?>"></i><?php echo esc_html($item['label']??''); ?></div><?php } ?></div></div>
    </div></section><?php });
}
add_shortcode('beem_solution', 'beem360_solution_shortcode');

function beem360_feature_copy(): array {
    return [
      ['ai','bi-stars',beem360_x('AI INSIGHTS','رؤى مدعومة بالذكاء الاصطناعي','ANALYSES AUGMENTÉES PAR L’IA'),beem360_x('Know what deserves your attention','اعرف ما يستحق انتباهك','Identifiez plus tôt ce qui mérite votre attention'),beem360_x('Turn ongoing team and project activity into concise reports, meaningful summaries, and early signals that surface what needs a closer look.','حوّل نشاط الفرق والمشروعات إلى تقارير مختصرة وملخصات واضحة وإشارات مبكرة تساعدك على اكتشاف ما يحتاج إلى متابعة قبل أن يتحول إلى مشكلة أكبر.','Transformez l’activité des équipes et des projets en rapports synthétiques, en résumés clairs et en signaux d’alerte précoces afin d’identifier les points nécessitant un suivi avant qu’un problème ne prenne de l’ampleur.'),[beem360_x('AI-generated project reports','تقارير للمشروعات مدعومة بالذكاء الاصطناعي','Rapports de projet générés par l’IA'),beem360_x('Summaries of wins, delays, and active priorities','ملخصات للإنجازات والتأخيرات والأولويات الحالية','Résumés des avancées, des retards et des priorités en cours'),beem360_x('Suggestions and risk detection','اقتراحات وتنبيهات للمخاطر','Suggestions et alertes de risque')],'13-ai-insight.jpg','14-ai-progress-summary.jpg','blue'],
      ['planner','bi-calendar-week',beem360_x('DIGITAL PLANNER','المخطط الرقمي','PLANIFICATEUR NUMÉRIQUE'),beem360_x('Turn priorities into an executable plan','حوّل الأولويات إلى خطة قابلة للتنفيذ','Transformez les priorités en plans d’action'),beem360_x('Structure responsibilities across board, weekly, and calendar views while keeping deadlines, ownership, and capacity aligned.','نظّم المهام بين لوحة العمل والعرض الأسبوعي والتقويم، مع وضوح المواعيد والمسؤوليات وحجم العمل لدى الفريق.','Organisez le travail grâce aux tableaux, aux vues hebdomadaires et au calendrier, avec une vision claire des échéances, des responsabilités et de la charge de travail de l’équipe.'),[beem360_x('Drag-and-drop Kanban boards','لوحات كانبان بالسحب والإفلات','Tableaux Kanban en glisser-déposer'),beem360_x('Weekly capacity overview','نظرة أسبوعية على حجم العمل','Vue hebdomadaire de la charge de travail'),beem360_x('Clear ownership and priorities','وضوح المسؤوليات والأولويات','Responsabilités et priorités clairement définies')],'16-kanban-board.jpg','','orange'],
      ['notes','bi-journal-check',beem360_x('SMART NOTES','الملاحظات الذكية','NOTES INTELLIGENTES'),beem360_x('Keep important context from getting lost','احتفظ بالسياق المهم في متناولك','Gardez le contexte essentiel à portée de main'),beem360_x('Capture decisions, ideas, and follow-ups as they happen, then organize and retrieve them when they become relevant again.','سجّل القرارات والأفكار والمتابعات لحظة حدوثها، ونظّمها بحيث تجد ما تحتاجه بسهولة عندما يحين وقت الرجوع إليها.','Consignez les décisions, les idées et les actions de suivi au moment où elles émergent, puis organisez-les pour retrouver facilement les informations lorsqu’elles redeviennent utiles.'),[beem360_x('Timed reminders','تذكيرات مجدولة','Rappels programmés'),beem360_x('Color-coded categories','تصنيفات مميزة بالألوان','Catégories avec code couleur'),beem360_x('Search across saved notes','بحث داخل الملاحظات المحفوظة','Recherche dans les notes enregistrées')],'18-smart-notes-row-1.jpg','19-smart-notes-row-2.jpg','teal'],
      ['workspace','bi-rocket-takeoff',beem360_x('WORKSPACE','مساحة العمل','ESPACE DE TRAVAIL'),beem360_x('Move from discussion to execution','من النقاش إلى التنفيذ','De la discussion à l’exécution'),beem360_x("Create a focused space where the right people can exchange ideas, share input, and assign responsibilities as plans take shape.\n\nWhen a conversation becomes a real initiative, turn the workspace into a project without losing the thinking behind it.","أنشئ مساحة مخصصة تجمع الأشخاص المناسبين لتبادل الأفكار ومشاركة الآراء وتوزيع المسؤوليات أثناء تشكّل الخطة.\n\nوعندما تتحول الفكرة إلى مبادرة فعلية، حوّل مساحة العمل إلى مشروع دون أن تفقد النقاشات والسياق الذي سبقها.","Créez un espace dédié où les bonnes personnes peuvent échanger des idées, partager leurs retours et répartir les responsabilités au fur et à mesure que le plan se précise.\n\nLorsqu’une idée devient une initiative concrète, transformez l’espace de travail en projet sans perdre les échanges ni le contexte qui l’ont précédée."),[beem360_x('Invite members and managers','دعوة الأعضاء والمديرين','Inviter des membres et des managers'),beem360_x('Create tasks from discussions','إنشاء المهام من داخل النقاشات','Créer des tâches directement depuis les discussions'),beem360_x('Convert a workspace into a project','تحويل مساحة العمل إلى مشروع','Transformer un espace de travail en projet')],'workspace','','blue'],
      ['delivery','bi-box-seam',beem360_x('PROJECT DELIVERY','إدارة تسليم المشروعات','PILOTAGE DE PROJET'),beem360_x('Control every stage through completion','تابع كل مرحلة حتى التسليم','Gardez le contrôle jusqu’à la livraison'),beem360_x("Manage files, approvals, budgets, deadlines, and final deliverables throughout the project lifecycle.\n\nSee what has been completed, what is still pending, and what requires action next.","أدِر الملفات والموافقات والميزانيات والمواعيد النهائية والمخرجات من بداية المشروع حتى اكتماله.\n\nواعرف في أي لحظة ما تم إنجازه، وما لا يزال قيد التنفيذ، وما يحتاج إلى إجراء تالٍ.","Gérez les fichiers, les validations, les budgets, les échéances et les livrables du lancement jusqu’à la finalisation du projet.\n\nÀ tout moment, identifiez ce qui est terminé, ce qui est encore en cours et ce qui nécessite une prochaine action."),[beem360_x('Built-in approval workflow','مسار موافقات مدمج','Circuit de validation intégré'),beem360_x('Budget and deadline tracking','متابعة الميزانية والمواعيد النهائية','Suivi du budget et des échéances'),beem360_x('Shared project oversight','رؤية مشتركة لحالة المشروع','Vue partagée de l’état du projet')],'21-project-objective.jpg','22-project-deliverables.jpg','blue'],
    ];
}

function beem360_workspace_mock(): void { ?><div class="beem-workspace beem-spot"><div class="beem-workspace-head"><span><i class="bi bi-lightbulb"></i></span><div><b><?php echo esc_html(beem360_t('workspace_idea')); ?></b><small><?php echo esc_html(beem360_t('workspace_meta')); ?></small></div><div class="beem-avatars"><i>SA</i><i>OF</i><i>+3</i></div></div><div class="beem-message"><i>SA</i><span><?php echo esc_html(beem360_t('workspace_message_one')); ?></span></div><div class="beem-message"><i>OF</i><span><?php echo esc_html(beem360_t('workspace_message_two')); ?></span></div><div class="beem-workspace-tags"><span>✓ <?php echo esc_html(beem360_t('workspace_task_one')); ?></span><span>⏱ <?php echo esc_html(beem360_t('workspace_task_two')); ?></span><span>+ <?php echo esc_html(beem360_t('workspace_task_three')); ?></span></div><button><?php echo esc_html(beem360_t('workspace_convert')); ?> <i class="bi bi-rocket-takeoff"></i></button></div><?php }

function beem360_features_shortcode(): string {
    $features=beem360_items('features');
    return beem360_capture(function () use ($features) { ?>
    <section class="beem-section beem-features" id="features"><div class="container"><div class="beem-section-head text-center beem-reveal"><div class="beem-num"><b>03</b> <?php echo esc_html(beem360_x('FEATURES','المزايا','FONCTIONNALITÉS')); ?></div><h2><?php echo beem360_text_breaks(beem360_t('features_title')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2><div class="beem-rich-copy"><?php echo beem360_content('features_text'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></div>
      <?php foreach($features as $i=>$f){$points=beem360_lines((string)($f['bullets']??''));?><article class="beem-feature <?php echo $i%2 ? 'is-flipped' : ''; ?>" id="<?php echo esc_attr($f['id']??'feature-'.$i); ?>"><div class="beem-feature-copy beem-reveal"><span class="beem-feature-tag <?php echo esc_attr($f['color']??'blue'); ?>"><i class="bi <?php echo esc_attr($f['icon']??'bi-stars'); ?>"></i> <?php echo esc_html($f['tag']??''); ?></span><h3><?php echo beem360_text_breaks((string)($f['title']??'')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h3><div class="beem-rich-copy"><?php echo beem360_format_content((string)($f['text']??'')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div><ul><?php foreach($points as $point){?><li><i class="bi bi-check2"></i><span><?php echo esc_html($point); ?></span></li><?php } ?></ul><?php if(!empty($f['url'])){?><a class="beem-feature-more" href="<?php echo esc_url($f['url']); ?>"><?php echo esc_html(beem360_x('Learn more','اعرف المزيد','En savoir plus')); ?> <i class="bi bi-arrow-right"></i></a><?php } ?></div><div class="beem-feature-visual beem-reveal-scale"><?php if(($f['image']??'')==='workspace'){beem360_workspace_mock();} else {beem360_device((string)($f['image']??''),(string)($f['tag']??''),(string)($f['image_secondary']??''));} ?></div></article><?php } ?>
    </div></section><?php });
}
add_shortcode('beem_features', 'beem360_features_shortcode');

function beem360_cta_shortcode(): string {
    return beem360_capture(function () { ?>
    <section class="beem-section beem-cta" id="cta"><div class="container text-center"><div class="beem-reveal"><div class="beem-num"><b>04</b> <?php echo esc_html(beem360_x('GET STARTED','ابدأ الآن','PASSEZ À L’ACTION')); ?></div><h2><?php echo beem360_text_breaks(beem360_t('cta_title')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2></div><div class="beem-cta-pill beem-spot beem-reveal-scale"><img src="<?php echo beem360_media('cta_logo'); ?>" alt=""><strong><?php echo beem360_text_breaks(beem360_t('cta_text')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong><button class="beem-btn" data-beem-modal="request"><?php echo esc_html(beem360_t('hero_primary')); ?> <i class="bi bi-arrow-right"></i></button></div></div></section><?php });
}
add_shortcode('beem_cta', 'beem360_cta_shortcode');

/**
 * Render a saved legal document inside a regular WordPress page.
 *
 * Examples:
 * [beem_privacy_policy]
 * [beem_terms_conditions]
 * [beem_legal type="privacy" lang="fr"]
 */
function beem360_legal_content_shortcode(array|string $atts = [], ?string $content = null, string $tag = ''): string {
    $atts=shortcode_atts(['type'=>'privacy','lang'=>''],is_array($atts)?$atts:[],$tag?:'beem_legal');
    $type=sanitize_key((string)$atts['type']);
    if($tag==='beem_privacy_policy')$type='privacy';
    if(in_array($tag,['beem_terms_conditions','beem_terms_and_conditions'],true))$type='terms';
    if(!in_array($type,['privacy','terms'],true))$type='privacy';

    $requested_lang=substr(sanitize_key((string)$atts['lang']),0,2);
    $lang=in_array($requested_lang,['en','ar','fr'],true)?$requested_lang:beem360_lang();
    $document=beem360_legal_document($type,$lang);
    $title=(string)($document['title']??'');
    $intro=(string)($document['intro']??'');
    $updated=(string)($document['updated']??'');
    $body=(string)($document['content']??'');
    $labels=[
      'privacy'=>['en'=>'PRIVACY','ar'=>'الخصوصية','fr'=>'CONFIDENTIALITÉ'],
      'terms'=>['en'=>'TERMS','ar'=>'الشروط','fr'=>'CONDITIONS'],
    ];

    return beem360_capture(function () use ($type,$lang,$document,$title,$intro,$updated,$body,$labels) { ?>
      <section class="beem-legal-embed<?php echo $lang==='ar'?' beem-rtl':''; ?>" lang="<?php echo esc_attr($lang); ?>" dir="<?php echo $lang==='ar'?'rtl':'ltr'; ?>">
        <header class="beem-legal-hero">
          <span class="beem-legal-kicker"><?php echo esc_html($labels[$type][$lang]); ?></span>
          <?php if($title!==''){?><h1><?php echo beem360_text_breaks($title); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h1><?php } ?>
          <?php if($intro!==''){?><div class="beem-legal-intro"><?php echo beem360_format_content($intro); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div><?php } ?>
          <?php if($updated!==''){?><p class="beem-legal-updated"><i class="bi bi-clock-history"></i> <?php echo esc_html($updated); ?></p><?php } ?>
        </header>
        <article class="beem-legal-content beem-spot">
          <?php echo beem360_format_content($body); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </article>
      </section>
    <?php });
}
add_shortcode('beem_legal','beem360_legal_content_shortcode');
add_shortcode('beem_privacy_policy','beem360_legal_content_shortcode');
add_shortcode('beem_terms_conditions','beem360_legal_content_shortcode');
add_shortcode('beem_terms_and_conditions','beem360_legal_content_shortcode');
