<?php
if (!defined('ABSPATH')) { exit; }

function beem360_capture(callable $renderer): string {
    ob_start(); $renderer(); return (string) ob_get_clean();
}

function beem360_device(string $primary, string $alt, string $secondary = ''): void { ?>
  <div class="beem-device beem-spot">
    <div class="beem-device-rail"><img src="<?php echo beem360_asset('02-brand-mark.png'); ?>" alt=""><i></i><i></i><i></i><i></i><i></i><i></i></div>
    <div class="beem-device-body"><div class="beem-shot"><img src="<?php echo beem360_asset($primary); ?>" alt="<?php echo esc_attr($alt); ?>"></div><?php if ($secondary) { ?><div class="beem-shot beem-shot-scroll"><img src="<?php echo beem360_asset($secondary); ?>" alt=""></div><?php } ?></div>
  </div><?php
}

function beem360_hero_shortcode(): string {
    return beem360_capture(function () { ?>
    <header class="beem-hero" id="overview"><div class="beem-blob beem-blob-a"></div><div class="beem-blob beem-blob-b"></div>
      <div class="container beem-hero-grid">
        <div class="beem-reveal">
          <div class="beem-overline"><?php echo esc_html(beem360_t('hero_kicker')); ?></div>
          <h1><?php $title=beem360_t('hero_title'); $parts=explode(' ', $title); ?><span class="beem-blue"><?php echo esc_html(array_shift($parts)); ?></span> <?php echo esc_html(implode(' ', $parts)); ?></h1>
          <p><?php echo esc_html(beem360_t('hero_text')); ?></p>
          <div class="d-flex flex-wrap gap-3"><button class="beem-btn" data-beem-modal="request"><?php echo esc_html(beem360_t('hero_primary')); ?> <i class="bi bi-arrow-right"></i></button><button class="beem-btn beem-btn-ghost" data-beem-modal="contact"><i class="bi bi-chat-dots"></i> <?php echo esc_html(beem360_t('hero_secondary')); ?></button></div>
        </div>
        <div class="beem-hero-visual beem-reveal-scale">
          <div class="beem-float-card beem-float-one"><small>Health Score</small><strong data-count="89">0</strong><span>▲ live</span></div>
          <div class="beem-float-card beem-float-two"><small>Tasks Done</small><strong data-count="164">0</strong><span>▲ 8%</span></div>
          <?php beem360_device('03-system-kpis.jpg','System KPIs','04-ai-progress-summary.jpg'); ?>
        </div>
      </div>
    </header><?php });
}
add_shortcode('beem_hero', 'beem360_hero_shortcode');

function beem360_pillars_shortcode(): string {
    $cards = [
      ['bi-journal-text','orange',beem360_x('Smart Notes & Reminders','ملاحظات وتذكيرات ذكية','Notes et rappels intelligents'),beem360_x('Capture ideas, tag them by type, and set a reminder for exactly the right moment.','سجّل الأفكار وصنّفها واضبط تذكيرًا في الوقت المناسب تمامًا.','Capturez vos idées, classez-les et programmez un rappel au bon moment.'),[beem360_x('Timed reminders','تذكيرات موقّتة','Rappels programmés'),beem360_x('Categories','تصنيفات','Catégories'),beem360_x('Full-text search','بحث شامل','Recherche intégrale')],'06-smart-notes.jpg'],
      ['bi-calendar3','blue',beem360_x('Unified Scheduling','جدولة موحّدة','Planification unifiée'),beem360_x('Align meetings, deadlines, and priorities across every team — your whole week at a glance.','وحّد الاجتماعات والمواعيد والأولويات بين جميع الفرق — أسبوعك كاملًا في لمحة.','Alignez réunions, échéances et priorités entre toutes les équipes.'),[beem360_x('Week view','عرض الأسبوع','Vue semaine'),beem360_x('Calendar sync','مزامنة التقويم','Synchro calendrier'),beem360_x('Deadlines','مواعيد نهائية','Échéances')],'07-week-view.jpg'],
      ['bi-bar-chart-line','teal',beem360_x('Real-time Analytics','تحليلات لحظية','Analyses en temps réel'),beem360_x('Turn daily work into confident decisions with live health scores, burn rate, and progress.','حوّل العمل اليومي إلى قرارات واثقة عبر المؤشرات والتقدم المباشر.','Transformez le travail quotidien en décisions éclairées avec des indicateurs en direct.'),[beem360_x('Health score','مؤشر الصحة','Score de santé'),beem360_x('Monthly burn','الصرف الشهري','Dépenses mensuelles'),beem360_x('Live KPIs','مؤشرات مباشرة','KPI en direct')],'08-analytics.jpg'],
      ['bi-check2-square','orange',beem360_x('Task Tracking','تتبّع المهام','Suivi des tâches'),beem360_x('Every task carries its owner, priority, and deadline wherever the work moves.','كل مهمة تحمل المسؤول والأولوية والموعد النهائي أينما انتقل العمل.','Chaque tâche conserve son responsable, sa priorité et son échéance.'),[beem360_x('Kanban board','لوحة كانبان','Tableau Kanban'),beem360_x('Priorities','الأولويات','Priorités'),beem360_x('Owners','المسؤولون','Responsables')],'09-task-board.jpg'],
    ];
    return beem360_capture(function () use ($cards) { ?>
    <section class="beem-section beem-pillars" id="platform"><div class="container">
      <div class="beem-mark beem-reveal-scale"><img src="<?php echo beem360_asset('05-beem-360.png'); ?>" alt="Beem 360"></div>
      <div class="beem-section-head text-center beem-reveal"><h2><?php echo esc_html(beem360_t('pillars_title')); ?></h2><p><?php echo esc_html(beem360_t('pillars_text')); ?></p></div>
      <div class="row g-4 justify-content-center"><?php foreach ($cards as $card) { ?><div class="col-md-6"><article class="beem-pillar-card beem-spot beem-reveal-scale"><div class="beem-card-icon <?php echo esc_attr($card[1]); ?>"><i class="bi <?php echo esc_attr($card[0]); ?>"></i></div><h3><?php echo esc_html($card[2]); ?></h3><p><?php echo esc_html($card[3]); ?></p><div class="beem-chips"><?php foreach ($card[4] as $chip) { ?><span><?php echo esc_html($chip); ?></span><?php } ?></div><div class="beem-card-shot"><img src="<?php echo beem360_asset($card[5]); ?>" alt=""></div></article></div><?php } ?></div>
    </div></section><?php });
}
add_shortcode('beem_pillars', 'beem360_pillars_shortcode');

function beem360_problem_shortcode(): string {
    $bad=beem360_lang()==='ar'?['تحديثات المهام|داخل المحادثات','ملفات المشاريع|في أقراص مشتركة','الميزانيات|في جداول بيانات','التقارير|تُبنى يدويًا','تقدم الفريق|غير واضح']: (beem360_lang()==='fr'?['Mises à jour|dans les discussions','Fichiers projet|dans des drives','Budgets|dans des feuilles','Rapports|créés à la main','Progression|personne ne sait']:['Task updates|in chat threads','Project files|in shared drives','Budgets|in spreadsheets','Reports|built by hand','Team progress|nobody’s sure']);
    $good=beem360_lang()==='ar'?['تحديثات المهام|مباشرة وفي سياقها','ملفات المشاريع|داخل المهمة','الميزانيات|لكل مشروع','التقارير|بالذكاء الاصطناعي','تقدم الفريق|ظاهر للجميع']: (beem360_lang()==='fr'?['Mises à jour|en direct et en contexte','Fichiers projet|sur la tâche','Budgets|suivis par projet','Rapports|générés par IA','Progression|visible par tous']:['Task updates|live, in context','Project files|on the task','Budgets|tracked per project','Reports|AI-generated','Team progress|visible to all']);
    return beem360_capture(function () use ($bad,$good) { ?>
    <section class="beem-section" id="problem"><div class="container"><div class="beem-section-head text-center beem-reveal"><div class="beem-num"><b>01</b> <?php echo esc_html(beem360_x('PROBLEM','المشكلة','PROBLÈME')); ?></div><h2><?php echo esc_html(beem360_t('problem_title')); ?></h2><p><?php echo esc_html(beem360_t('problem_text')); ?></p></div>
      <div class="beem-compare"><article class="beem-compare-card is-bad beem-reveal"><h3><i class="bi bi-x-circle"></i> <?php echo esc_html(beem360_x('WITHOUT BEEM 360','بدون BEEM 360','SANS BEEM 360')); ?></h3><?php foreach($bad as $row){[$a,$b]=explode('|',$row);?><div><i class="bi bi-x"></i><b><?php echo esc_html($a); ?></b><small><?php echo esc_html($b); ?></small></div><?php } ?></article>
      <div class="beem-compare-arrow"><span><i class="bi bi-arrow-right"></i></span><small>ONE SYSTEM</small></div>
      <article class="beem-compare-card is-good beem-spot beem-reveal"><h3 class="beem-mini-brand"><img src="<?php echo beem360_asset('10-brand-mark.png'); ?>" alt=""> Beem <em>360</em></h3><?php foreach($good as $row){[$a,$b]=explode('|',$row);?><div><i class="bi bi-check"></i><b><?php echo esc_html($a); ?></b><small><?php echo esc_html($b); ?></small></div><?php } ?></article></div>
    </div></section><?php });
}
add_shortcode('beem_problem', 'beem360_problem_shortcode');

function beem360_solution_shortcode(): string {
    $left=[['bi-check2-square',beem360_x('Tasks','المهام','Tâches')],['bi-file-earmark-text',beem360_x('Reports','التقارير','Rapports')],['bi-folder2-open',beem360_x('Files','الملفات','Fichiers')],['bi-bell',beem360_x('Updates','التحديثات','Mises à jour')],['bi-patch-check',beem360_x('Approvals','الموافقات','Approbations')]];
    $right=[['bi-people',beem360_x('Team','الفريق','Équipe')],['bi-kanban',beem360_x('Projects','المشاريع','Projets')],['bi-lightbulb',beem360_x('Insights','الرؤى','Insights')],['bi-gear',beem360_x('Automation','الأتمتة','Automatisation')],['bi-graph-up-arrow',beem360_x('Performance','الأداء','Performance')]];
    return beem360_capture(function () use ($left,$right) { ?>
    <section class="beem-section beem-solution" id="workflow"><div class="container"><div class="beem-section-head text-center beem-reveal"><div class="beem-num"><b>02</b> <?php echo esc_html(beem360_x('SOLUTION','الحل','SOLUTION')); ?></div><h2><?php echo esc_html(beem360_t('solution_title')); ?></h2><p><?php echo esc_html(beem360_t('solution_text')); ?></p></div>
      <div class="beem-hub beem-reveal"><div class="beem-hub-panel"><?php foreach($left as $item){?><div><i class="bi <?php echo esc_attr($item[0]); ?>"></i><?php echo esc_html($item[1]); ?></div><?php } ?></div><div class="beem-hub-core"><img src="<?php echo beem360_asset('11-brand-mark.png'); ?>" alt=""><b>Beem <em>360</em></b></div><div class="beem-hub-panel is-right"><?php foreach($right as $item){?><div><i class="bi <?php echo esc_attr($item[0]); ?>"></i><?php echo esc_html($item[1]); ?></div><?php } ?></div></div>
    </div></section><?php });
}
add_shortcode('beem_solution', 'beem360_solution_shortcode');

function beem360_feature_copy(): array {
    return [
      ['ai','bi-stars',beem360_x('AI INSIGHTS','رؤى الذكاء الاصطناعي','INSIGHTS IA'),beem360_x('From work data to decisions — faster.','من بيانات العمل إلى القرار — أسرع.','Des données aux décisions — plus vite.'),beem360_x('Beem 360 turns daily team activity into smart reports for a project, a portfolio, or an employee.','يحوّل Beem 360 نشاط الفريق اليومي إلى تقارير ذكية للمشروع أو المحفظة أو الموظف.','Beem 360 transforme l’activité quotidienne en rapports intelligents pour un projet, un portefeuille ou un collaborateur.'),[beem360_x('AI reports for any project','تقارير ذكية لأي مشروع','Rapports IA pour chaque projet'),beem360_x('Employee wins, delays and current work','إنجازات الموظف وتأخيراته وعمله الحالي','Réussites, retards et travail en cours'),beem360_x('Suggestions and risk detection','اقتراحات واكتشاف المخاطر','Suggestions et détection des risques')],'13-ai-insight.jpg','14-ai-progress-summary.jpg','blue'],
      ['planner','bi-calendar-week',beem360_x('DIGITAL PLANNER','المخطط الرقمي','PLANIFICATEUR NUMÉRIQUE'),beem360_x('Plan the week without losing the month.','خطط للأسبوع دون أن تفقد رؤية الشهر.','Planifiez la semaine sans perdre le mois.'),beem360_x('Board, week, and calendar views stay in sync — every task carries its owner, priority, and deadline.','تظل عروض اللوحة والأسبوع والتقويم متزامنة، وتحمل كل مهمة مسؤولها وأولويتها وموعدها.','Les vues tableau, semaine et calendrier restent synchronisées avec responsable, priorité et échéance.'),[beem360_x('Drag-and-drop Kanban boards','لوحات كانبان بالسحب والإفلات','Kanban par glisser-déposer'),beem360_x('Weekly capacity at a glance','السعة الأسبوعية في لمحة','Capacité hebdomadaire en un coup d’œil'),beem360_x('Clear ownership and priorities','مسؤوليات وأولويات واضحة','Responsabilités et priorités claires')],'16-kanban-board.jpg','','orange'],
      ['notes','bi-journal-check',beem360_x('SMART NOTES','ملاحظات ذكية','NOTES INTELLIGENTES'),beem360_x('Ideas captured. Reminders that remind.','أفكار محفوظة. وتذكيرات في موعدها.','Idées capturées. Rappels efficaces.'),beem360_x('Capture thoughts, tag them by type, and set a timed reminder — at exactly the right moment.','سجّل أفكارك وصنّفها واضبط تذكيرًا في اللحظة المناسبة.','Capturez vos idées, classez-les et programmez un rappel au bon moment.'),[beem360_x('Timed reminders on any note','تذكير موقّت لأي ملاحظة','Rappels sur chaque note'),beem360_x('Color-coded categories','تصنيفات ملوّنة','Catégories colorées'),beem360_x('Searchable across everything','بحث شامل في كل شيء','Recherche globale')],'18-smart-notes-row-1.jpg','19-smart-notes-row-2.jpg','teal'],
      ['workspace','bi-rocket-takeoff',beem360_x('WORKSPACE — UNIQUE','مساحة عمل — فريدة','ESPACE — UNIQUE'),beem360_x('Discuss the idea. Then make it real — in one click.','ناقش الفكرة. ثم حوّلها إلى واقع — بنقرة واحدة.','Discutez de l’idée. Réalisez-la en un clic.'),beem360_x('Invite members, chat, collect suggestions, and start tasks. Convert the whole workspace into a real project with all its data.','ادعُ الأعضاء وتبادلوا النقاش واجمعوا الاقتراحات وابدؤوا المهام، ثم حوّلوا المساحة إلى مشروع كامل بكل بياناته.','Invitez les membres, discutez, collectez les idées et lancez les tâches, puis convertissez tout en projet.'),[beem360_x('Invite members and managers','دعوة الأعضاء والمديرين','Inviter membres et managers'),beem360_x('Start tasks inside the discussion','بدء المهام داخل النقاش','Créer des tâches dans la discussion'),beem360_x('One click to a full project','نقرة واحدة لمشروع كامل','Un clic vers un projet complet')],'workspace','','blue'],
      ['delivery','bi-box-seam',beem360_x('PROJECT DELIVERY','تسليم المشروع','LIVRAISON DE PROJET'),beem360_x('Every deliverable, tracked start to finish.','كل مخرج عمل متتبّع من البداية للنهاية.','Chaque livrable suivi du début à la fin.'),beem360_x('Test files, approvals, budgets, and final assets — organized per project so nothing gets lost.','ملفات الاختبار والموافقات والميزانيات والأصول النهائية منظّمة داخل كل مشروع.','Fichiers, validations, budgets et livrables finaux organisés par projet.'),[beem360_x('Built-in approval workflow','مسار موافقات مدمج','Flux d’approbation intégré'),beem360_x('Budget flow and deadlines','الميزانية والمواعيد','Budgets et échéances'),beem360_x('Full team visibility','رؤية كاملة للفريق','Visibilité complète')],'21-project-objective.jpg','22-project-deliverables.jpg','blue'],
    ];
}

function beem360_workspace_mock(): void { ?><div class="beem-workspace beem-spot"><div class="beem-workspace-head"><span><i class="bi bi-lightbulb"></i></span><div><b><?php echo esc_html(beem360_x('New Product Idea','فكرة منتج جديد','Nouvelle idée produit')); ?></b><small><?php echo esc_html(beem360_x('Workspace · 5 members invited','مساحة عمل · تمت دعوة 5 أعضاء','Espace · 5 membres invités')); ?></small></div><div class="beem-avatars"><i>SA</i><i>OF</i><i>+3</i></div></div><div class="beem-message"><i>SA</i><span><?php echo esc_html(beem360_x('What if we launch the mobile version first?','ماذا لو أطلقنا نسخة الجوال أولًا؟','Et si nous lancions la version mobile d’abord ?')); ?></span></div><div class="beem-message"><i>OF</i><span><?php echo esc_html(beem360_x('Agreed — I’ll draft the scope 👍','موافق — سأعد نطاق العمل 👍','D’accord — je prépare le périmètre 👍')); ?></span></div><div class="beem-workspace-tags"><span>✓ <?php echo esc_html(beem360_x('Draft scope','مسودة النطاق','Projet de périmètre')); ?></span><span>⏱ <?php echo esc_html(beem360_x('Market research','بحث السوق','Étude de marché')); ?></span><span>+ <?php echo esc_html(beem360_x('Budget estimate','تقدير الميزانية','Estimation du budget')); ?></span></div><button><?php echo esc_html(beem360_x('Convert to Project — one click','تحويل إلى مشروع — نقرة واحدة','Convertir en projet — un clic')); ?> <i class="bi bi-rocket-takeoff"></i></button></div><?php }

function beem360_features_shortcode(): string {
    $features=beem360_feature_copy();
    return beem360_capture(function () use ($features) { ?>
    <section class="beem-section beem-features" id="features"><div class="container"><div class="beem-section-head text-center beem-reveal"><div class="beem-num"><b>03</b> <?php echo esc_html(beem360_x('FEATURES','المزايا','FONCTIONNALITÉS')); ?></div><h2><?php echo esc_html(beem360_t('features_title')); ?></h2><p><?php echo esc_html(beem360_t('features_text')); ?></p></div>
      <?php foreach($features as $i=>$f){ ?><article class="beem-feature <?php echo $i%2 ? 'is-flipped' : ''; ?>" id="<?php echo esc_attr($f[0]); ?>"><div class="beem-feature-copy beem-reveal"><span class="beem-feature-tag <?php echo esc_attr($f[8]); ?>"><i class="bi <?php echo esc_attr($f[1]); ?>"></i> <?php echo esc_html($f[2]); ?></span><h3><?php echo esc_html($f[3]); ?></h3><p><?php echo esc_html($f[4]); ?></p><ul><?php foreach($f[5] as $point){?><li><i class="bi bi-check2"></i><?php echo esc_html($point); ?></li><?php } ?></ul></div><div class="beem-feature-visual beem-reveal-scale"><?php if($f[6]==='workspace'){beem360_workspace_mock();} else {beem360_device($f[6],$f[2],$f[7]);} ?></div></article><?php } ?>
    </div></section><?php });
}
add_shortcode('beem_features', 'beem360_features_shortcode');

function beem360_cta_shortcode(): string {
    return beem360_capture(function () { ?>
    <section class="beem-section beem-cta" id="cta"><div class="container text-center"><div class="beem-reveal"><div class="beem-num"><b>04</b> <?php echo esc_html(beem360_x('GET STARTED','ابدأ الآن','COMMENCER')); ?></div><h2><?php echo esc_html(beem360_t('cta_title')); ?></h2></div><div class="beem-cta-pill beem-spot beem-reveal-scale"><img src="<?php echo beem360_asset('24-beem-360.png'); ?>" alt=""><strong><?php echo esc_html(beem360_t('cta_text')); ?></strong><button class="beem-btn" data-beem-modal="request"><?php echo esc_html(beem360_t('hero_primary')); ?> <i class="bi bi-arrow-right"></i></button></div></div></section><?php });
}
add_shortcode('beem_cta', 'beem360_cta_shortcode');
