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

function beem360_default_items(): array {
    $t = static fn(string $en, string $ar, string $fr): array => compact('en', 'ar', 'fr');
    $asset = static fn(string $file): string => BEEM360_URI . '/assets/images/' . $file;
    return [
        'navigation' => [
            ['icon'=>'bi-grid','label'=>$t('Platform','المنصة','Plateforme'),'url'=>'#platform'],
            ['icon'=>'bi-stars','label'=>$t('Features','المزايا','Fonctionnalités'),'url'=>'#features'],
            ['icon'=>'bi-cpu','label'=>$t('AI Insights','رؤى الذكاء الاصطناعي','Insights IA'),'url'=>'#ai'],
            ['icon'=>'bi-diagram-3','label'=>$t('Workflow','سير العمل','Flux de travail'),'url'=>'#workflow'],
        ],
        'pillars' => [
            ['icon'=>'bi-journal-text','color'=>'orange','title'=>$t('Smart Notes & Reminders','ملاحظات وتذكيرات ذكية','Notes et rappels intelligents'),'text'=>$t('Capture ideas, tag them by type, and set a reminder for exactly the right moment.','سجّل الأفكار وصنّفها واضبط تذكيرًا في الوقت المناسب تمامًا.','Capturez vos idées, classez-les et programmez un rappel au bon moment.'),'chips'=>$t("Timed reminders\nCategories\nFull-text search","تذكيرات موقّتة\nتصنيفات\nبحث شامل","Rappels programmés\nCatégories\nRecherche intégrale"),'image'=>$asset('06-smart-notes.jpg'),'url'=>''],
            ['icon'=>'bi-calendar3','color'=>'blue','title'=>$t('Unified Scheduling','جدولة موحّدة','Planification unifiée'),'text'=>$t('Align meetings, deadlines, and priorities across every team — your whole week at a glance.','وحّد الاجتماعات والمواعيد والأولويات بين جميع الفرق — أسبوعك كاملًا في لمحة.','Alignez réunions, échéances et priorités entre toutes les équipes.'),'chips'=>$t("Week view\nCalendar sync\nDeadlines","عرض الأسبوع\nمزامنة التقويم\nمواعيد نهائية","Vue semaine\nSynchro calendrier\nÉchéances"),'image'=>$asset('07-week-view.jpg'),'url'=>''],
            ['icon'=>'bi-bar-chart-line','color'=>'teal','title'=>$t('Real-time Analytics','تحليلات لحظية','Analyses en temps réel'),'text'=>$t('Turn daily work into confident decisions with live health scores, burn rate, and progress.','حوّل العمل اليومي إلى قرارات واثقة عبر المؤشرات والتقدم المباشر.','Transformez le travail quotidien en décisions éclairées avec des indicateurs en direct.'),'chips'=>$t("Health score\nMonthly burn\nLive KPIs","مؤشر الصحة\nالصرف الشهري\nمؤشرات مباشرة","Score de santé\nDépenses mensuelles\nKPI en direct"),'image'=>$asset('08-analytics.jpg'),'url'=>''],
            ['icon'=>'bi-check2-square','color'=>'orange','title'=>$t('Task Tracking','تتبّع المهام','Suivi des tâches'),'text'=>$t('Every task carries its owner, priority, and deadline wherever the work moves.','كل مهمة تحمل المسؤول والأولوية والموعد النهائي أينما انتقل العمل.','Chaque tâche conserve son responsable, sa priorité et son échéance.'),'chips'=>$t("Kanban board\nPriorities\nOwners","لوحة كانبان\nالأولويات\nالمسؤولون","Tableau Kanban\nPriorités\nResponsables"),'image'=>$asset('09-task-board.jpg'),'url'=>''],
        ],
        'problem_bad' => [
            ['label'=>$t('Task updates','تحديثات المهام','Mises à jour'),'meta'=>$t('in chat threads','داخل المحادثات','dans les discussions')],['label'=>$t('Project files','ملفات المشاريع','Fichiers projet'),'meta'=>$t('in shared drives','في أقراص مشتركة','dans des drives')],['label'=>$t('Budgets','الميزانيات','Budgets'),'meta'=>$t('in spreadsheets','في جداول بيانات','dans des feuilles')],['label'=>$t('Reports','التقارير','Rapports'),'meta'=>$t('built by hand','تُبنى يدويًا','créés à la main')],['label'=>$t('Team progress','تقدم الفريق','Progression'),'meta'=>$t('nobody’s sure','غير واضح','personne ne sait')],
        ],
        'problem_good' => [
            ['label'=>$t('Task updates','تحديثات المهام','Mises à jour'),'meta'=>$t('live, in context','مباشرة وفي سياقها','en direct et en contexte')],['label'=>$t('Project files','ملفات المشاريع','Fichiers projet'),'meta'=>$t('on the task','داخل المهمة','sur la tâche')],['label'=>$t('Budgets','الميزانيات','Budgets'),'meta'=>$t('tracked per project','لكل مشروع','suivis par projet')],['label'=>$t('Reports','التقارير','Rapports'),'meta'=>$t('AI-generated','بالذكاء الاصطناعي','générés par IA')],['label'=>$t('Team progress','تقدم الفريق','Progression'),'meta'=>$t('visible to all','ظاهر للجميع','visible par tous')],
        ],
        'hub_left' => [
            ['icon'=>'bi-check2-square','label'=>$t('Tasks','المهام','Tâches')],['icon'=>'bi-file-earmark-text','label'=>$t('Reports','التقارير','Rapports')],['icon'=>'bi-folder2-open','label'=>$t('Files','الملفات','Fichiers')],['icon'=>'bi-bell','label'=>$t('Updates','التحديثات','Mises à jour')],['icon'=>'bi-patch-check','label'=>$t('Approvals','الموافقات','Approbations')],
        ],
        'hub_right' => [
            ['icon'=>'bi-people','label'=>$t('Team','الفريق','Équipe')],['icon'=>'bi-kanban','label'=>$t('Projects','المشاريع','Projets')],['icon'=>'bi-lightbulb','label'=>$t('Insights','الرؤى','Insights')],['icon'=>'bi-gear','label'=>$t('Automation','الأتمتة','Automatisation')],['icon'=>'bi-graph-up-arrow','label'=>$t('Performance','الأداء','Performance')],
        ],
        'features' => [
            ['id'=>'ai','icon'=>'bi-stars','color'=>'blue','tag'=>$t('AI INSIGHTS','رؤى الذكاء الاصطناعي','INSIGHTS IA'),'title'=>$t('From work data to decisions — faster.','من بيانات العمل إلى القرار — أسرع.','Des données aux décisions — plus vite.'),'text'=>$t('Beem 360 turns daily team activity into smart reports for a project, a portfolio, or an employee.','يحوّل Beem 360 نشاط الفريق اليومي إلى تقارير ذكية للمشروع أو المحفظة أو الموظف.','Beem 360 transforme l’activité quotidienne en rapports intelligents.'),'bullets'=>$t("AI reports for any project\nEmployee wins, delays and current work\nSuggestions and risk detection","تقارير ذكية لأي مشروع\nإنجازات الموظف وتأخيراته وعمله الحالي\nاقتراحات واكتشاف المخاطر","Rapports IA pour chaque projet\nRéussites, retards et travail en cours\nSuggestions et détection des risques"),'image'=>$asset('13-ai-insight.jpg'),'image_secondary'=>$asset('14-ai-progress-summary.jpg'),'url'=>''],
            ['id'=>'planner','icon'=>'bi-calendar-week','color'=>'orange','tag'=>$t('DIGITAL PLANNER','المخطط الرقمي','PLANIFICATEUR NUMÉRIQUE'),'title'=>$t('Plan the week without losing the month.','خطط للأسبوع دون أن تفقد رؤية الشهر.','Planifiez la semaine sans perdre le mois.'),'text'=>$t('Board, week, and calendar views stay in sync — every task carries its owner, priority, and deadline.','تظل عروض اللوحة والأسبوع والتقويم متزامنة، وتحمل كل مهمة مسؤولها وأولويتها وموعدها.','Les vues tableau, semaine et calendrier restent synchronisées.'),'bullets'=>$t("Drag-and-drop Kanban boards\nWeekly capacity at a glance\nClear ownership and priorities","لوحات كانبان بالسحب والإفلات\nالسعة الأسبوعية في لمحة\nمسؤوليات وأولويات واضحة","Kanban par glisser-déposer\nCapacité hebdomadaire en un coup d’œil\nResponsabilités et priorités claires"),'image'=>$asset('16-kanban-board.jpg'),'image_secondary'=>'','url'=>''],
            ['id'=>'notes','icon'=>'bi-journal-check','color'=>'teal','tag'=>$t('SMART NOTES','ملاحظات ذكية','NOTES INTELLIGENTES'),'title'=>$t('Ideas captured. Reminders that remind.','أفكار محفوظة. وتذكيرات في موعدها.','Idées capturées. Rappels efficaces.'),'text'=>$t('Capture thoughts, tag them by type, and set a timed reminder — at exactly the right moment.','سجّل أفكارك وصنّفها واضبط تذكيرًا في اللحظة المناسبة.','Capturez vos idées, classez-les et programmez un rappel.'),'bullets'=>$t("Timed reminders on any note\nColor-coded categories\nSearchable across everything","تذكير موقّت لأي ملاحظة\nتصنيفات ملوّنة\nبحث شامل في كل شيء","Rappels sur chaque note\nCatégories colorées\nRecherche globale"),'image'=>$asset('18-smart-notes-row-1.jpg'),'image_secondary'=>$asset('19-smart-notes-row-2.jpg'),'url'=>''],
            ['id'=>'workspace','icon'=>'bi-rocket-takeoff','color'=>'blue','tag'=>$t('WORKSPACE — UNIQUE','مساحة عمل — فريدة','ESPACE — UNIQUE'),'title'=>$t('Discuss the idea. Then make it real — in one click.','ناقش الفكرة. ثم حوّلها إلى واقع — بنقرة واحدة.','Discutez de l’idée. Réalisez-la en un clic.'),'text'=>$t('Invite members, chat, collect suggestions, and start tasks. Convert the whole workspace into a real project with all its data.','ادعُ الأعضاء وتبادلوا النقاش واجمعوا الاقتراحات وابدؤوا المهام، ثم حوّلوا المساحة إلى مشروع كامل.','Invitez les membres, discutez et convertissez tout en projet.'),'bullets'=>$t("Invite members and managers\nStart tasks inside the discussion\nOne click to a full project","دعوة الأعضاء والمديرين\nبدء المهام داخل النقاش\nنقرة واحدة لمشروع كامل","Inviter membres et managers\nCréer des tâches dans la discussion\nUn clic vers un projet complet"),'image'=>'workspace','image_secondary'=>'','url'=>''],
            ['id'=>'delivery','icon'=>'bi-box-seam','color'=>'blue','tag'=>$t('PROJECT DELIVERY','تسليم المشروع','LIVRAISON DE PROJET'),'title'=>$t('Every deliverable, tracked start to finish.','كل مخرج عمل متتبّع من البداية للنهاية.','Chaque livrable suivi du début à la fin.'),'text'=>$t('Test files, approvals, budgets, and final assets — organized per project so nothing gets lost.','ملفات الاختبار والموافقات والميزانيات والأصول النهائية منظّمة داخل كل مشروع.','Fichiers, validations, budgets et livrables finaux organisés par projet.'),'bullets'=>$t("Built-in approval workflow\nBudget flow and deadlines\nFull team visibility","مسار موافقات مدمج\nالميزانية والمواعيد\nرؤية كاملة للفريق","Flux d’approbation intégré\nBudgets et échéances\nVisibilité complète"),'image'=>$asset('21-project-objective.jpg'),'image_secondary'=>$asset('22-project-deliverables.jpg'),'url'=>''],
        ],
        'footer_links' => [
            ['label'=>$t('Terms','الشروط','Conditions'),'url'=>'#'],['label'=>$t('Privacy','الخصوصية','Confidentialité'),'url'=>'#'],['label'=>$t('Security','الأمان','Sécurité'),'url'=>'#'],
        ],
    ];
}

function beem360_defaults(): array {
    return [
        'section_order' => array_keys(beem360_sections()),
        'enabled' => array_fill_keys(array_keys(beem360_sections()), 1),
        'admin_email' => get_option('admin_email'),
        'from_name' => get_bloginfo('name') ?: 'Beem 360',
        'from_email' => get_option('admin_email'),
        'login_url' => 'https://beemview.com/login',
        'register_url' => 'https://beemview.com/register',
        'privacy_url' => '#',
        'terms_url' => '#',
        'media' => [
            'logo' => BEEM360_URI . '/assets/images/01-beem-360.png',
            'hero_primary' => BEEM360_URI . '/assets/images/03-system-kpis.jpg',
            'hero_secondary' => BEEM360_URI . '/assets/images/04-ai-progress-summary.jpg',
            'cta_logo' => BEEM360_URI . '/assets/images/24-beem-360.png',
        ],
        'items' => beem360_default_items(),
        'copy' => [
            'hero_kicker' => ['en'=>'Overview','ar'=>'نظرة عامة','fr'=>'Aperçu'],
            'hero_title' => ['en'=>'Clarity for every decision.','ar'=>'وضوح في كل قرار.','fr'=>'De la clarté pour chaque décision.'],
            'hero_text' => ['en'=>'Beem 360 connects your tasks, teams, and data in one intelligent workspace. See everything. Decide faster.','ar'=>'يربط Beem 360 مهامك وفرقك وبياناتك في مساحة عمل ذكية واحدة. شاهد كل شيء واتخذ القرار أسرع.','fr'=>'Beem 360 connecte vos tâches, vos équipes et vos données dans un espace intelligent unique. Voyez tout. Décidez plus vite.'],
            'hero_primary' => ['en'=>'Book a Demo','ar'=>'احجز عرضًا توضيحيًا','fr'=>'Réserver une démo'],
            'hero_secondary' => ['en'=>'Contact us','ar'=>'تواصل معنا','fr'=>'Nous contacter'],
            'request_title' => ['en'=>'Request a demo','ar'=>'طلب عرض توضيحي','fr'=>'Demander une démo'],
            'contact_title' => ['en'=>'Contact us','ar'=>'تواصل معنا','fr'=>'Nous contacter'],
            'contact_intro' => ['en'=>'Tell us a little about you and our team will get back to you shortly.','ar'=>'أخبرنا قليلًا عنك وسيتواصل معك فريقنا قريبًا.','fr'=>'Parlez-nous de vous et notre équipe vous répondra rapidement.'],
            'field_name' => ['en'=>'Full name','ar'=>'الاسم الكامل','fr'=>'Nom complet'],
            'field_email' => ['en'=>'Work email','ar'=>'البريد الإلكتروني للعمل','fr'=>'E-mail professionnel'],
            'field_phone' => ['en'=>'Phone number','ar'=>'رقم الهاتف','fr'=>'Téléphone'],
            'field_company' => ['en'=>'Company','ar'=>'الشركة','fr'=>'Entreprise'],
            'field_message' => ['en'=>'How can we help?','ar'=>'كيف يمكننا مساعدتك؟','fr'=>'Comment pouvons-nous vous aider ?'],
            'form_submit' => ['en'=>'Send request','ar'=>'إرسال الطلب','fr'=>'Envoyer'],
            'form_success' => ['en'=>'Thank you. Your request was received and we will contact you shortly.','ar'=>'شكرًا لك. تم استلام طلبك وسنتواصل معك قريبًا.','fr'=>'Merci. Votre demande a été reçue et nous vous contacterons bientôt.'],
            'thankyou_subject' => ['en'=>'Thank you for contacting Beem 360','ar'=>'شكرًا لتواصلك مع Beem 360','fr'=>'Merci d’avoir contacté Beem 360'],
            'thankyou_title' => ['en'=>'Thank you — we received your request.','ar'=>'شكرًا لك — استلمنا طلبك.','fr'=>'Merci — nous avons reçu votre demande.'],
            'thankyou_text' => ['en'=>'Our team will review your message and contact you shortly.','ar'=>'سيراجع فريقنا رسالتك ويتواصل معك قريبًا.','fr'=>'Notre équipe examinera votre message et vous contactera rapidement.'],
            'workspace_idea' => ['en'=>'New Product Idea','ar'=>'فكرة منتج جديد','fr'=>'Nouvelle idée produit'],
            'workspace_meta' => ['en'=>'Workspace · 5 members invited','ar'=>'مساحة عمل · تمت دعوة 5 أعضاء','fr'=>'Espace · 5 membres invités'],
            'workspace_message_one' => ['en'=>'What if we launch the mobile version first?','ar'=>'ماذا لو أطلقنا نسخة الجوال أولًا؟','fr'=>'Et si nous lancions la version mobile d’abord ?'],
            'workspace_message_two' => ['en'=>'Agreed — I’ll draft the scope 👍','ar'=>'موافق — سأعد نطاق العمل 👍','fr'=>'D’accord — je prépare le périmètre 👍'],
            'workspace_task_one' => ['en'=>'Draft scope','ar'=>'مسودة النطاق','fr'=>'Projet de périmètre'],
            'workspace_task_two' => ['en'=>'Market research','ar'=>'بحث السوق','fr'=>'Étude de marché'],
            'workspace_task_three' => ['en'=>'Budget estimate','ar'=>'تقدير الميزانية','fr'=>'Estimation du budget'],
            'workspace_convert' => ['en'=>'Convert to Project — one click','ar'=>'تحويل إلى مشروع — نقرة واحدة','fr'=>'Convertir en projet — un clic'],
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
    $saved=(array)get_option('beem360_options',[]);$options=array_replace_recursive(beem360_defaults(),$saved);
    if(isset($saved['section_order'])&&is_array($saved['section_order']))$options['section_order']=$saved['section_order'];
    if(isset($saved['items'])&&is_array($saved['items']))foreach($saved['items'] as $group=>$items)$options['items'][$group]=is_array($items)?array_values($items):[];
    return $options;
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

function beem360_localized(mixed $value): mixed {
    if (!is_array($value)) { return $value; }
    if (isset($value['en']) || isset($value['ar']) || isset($value['fr'])) {
        return $value[beem360_lang()] ?? $value['en'] ?? reset($value);
    }
    return array_map('beem360_localized', $value);
}

function beem360_items(string $group): array {
    $items = beem360_options()['items'][$group] ?? [];
    return is_array($items) ? beem360_localized($items) : [];
}

function beem360_media(string $key): string {
    return esc_url((string) (beem360_options()['media'][$key] ?? ''));
}

function beem360_asset_version(string $relative_path): string {
    $path=BEEM360_DIR.'/'.ltrim($relative_path,'/');
    return file_exists($path)?(string)filemtime($path):BEEM360_VERSION;
}

function beem360_asset(string $file): string {
    return esc_url(BEEM360_URI . '/assets/images/' . ltrim($file, '/'));
}

function beem360_image_url(string $value): string {
    if (!$value) { return ''; }
    return esc_url(preg_match('~^https?://~i', $value) ? $value : BEEM360_URI . '/assets/images/' . ltrim($value, '/'));
}

function beem360_login_url(): string {
    $url = (string) (beem360_options()['login_url'] ?? '');
    return (!$url || $url === '#') ? 'https://beemview.com/login' : $url;
}

function beem360_register_url(): string {
    $url = (string) (beem360_options()['register_url'] ?? '');
    return (!$url || $url === '#') ? 'https://beemview.com/register' : $url;
}

function beem360_section_url(string $anchor): string {
    return is_front_page() ? '#' . $anchor : beem360_home_url() . '#' . $anchor;
}

function beem360_link_url(string $url): string {
    if (str_starts_with($url, '#') && !is_front_page()) { return beem360_home_url() . $url; }
    return $url;
}

function beem360_home_url(): string {
    if(function_exists('pll_home_url')){$url=pll_home_url();if($url)return trailingslashit($url);}
    return trailingslashit(home_url('/'));
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
    wp_enqueue_style('intl-tel-input', BEEM360_URI . '/assets/vendor/intl-tel-input/css/intlTelInput.min.css', [], beem360_asset_version('assets/vendor/intl-tel-input/css/intlTelInput.min.css'));
    wp_enqueue_style('beem360', BEEM360_URI . '/assets/css/beem360.css', ['bootstrap','bootstrap-icons','intl-tel-input'], beem360_asset_version('assets/css/beem360.css'));
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', [], '5.3.8', true);
    wp_enqueue_script('intl-tel-input', BEEM360_URI . '/assets/vendor/intl-tel-input/js/intlTelInputWithUtils.min.js', [], beem360_asset_version('assets/vendor/intl-tel-input/js/intlTelInputWithUtils.min.js'), true);
    wp_enqueue_script('beem360', BEEM360_URI . '/assets/js/beem360.js', ['bootstrap','intl-tel-input'], beem360_asset_version('assets/js/beem360.js'), true);
    wp_localize_script('beem360', 'Beem360', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('beem360_inquiry'),
        'sending' => beem360_lang() === 'ar' ? 'جارٍ الإرسال…' : (beem360_lang() === 'fr' ? 'Envoi…' : 'Sending…'),
        'invalidPhone' => beem360_x('Enter a valid phone number.','أدخل رقم هاتف صحيحًا.','Saisissez un numéro de téléphone valide.'),
        'phoneCountries' => ['sa','ae','kw','qa','bh','om','eg','jo','lb','iq','sy','ye','ps','ma','dz','tn','ly','sd','so','dj','mr','km'],
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
    $languages = pll_the_languages(['raw'=>1, 'hide_if_empty'=>0, 'hide_if_no_translation'=>1]);
    if (!is_array($languages)) { return ''; }
    $languages = array_filter($languages, static fn($language) => !empty($language['url']) && empty($language['no_translation']));
    $alternatives = array_filter($languages, static fn($language) => empty($language['current_lang']));
    if (!$alternatives) { return ''; }
    $out = '<div class="dropdown beem-languages"><button class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-globe2"></i> ' . esc_html(strtoupper(beem360_lang())) . '</button><ul class="dropdown-menu dropdown-menu-end">';
    foreach ($languages as $language) {
        $out .= '<li><a class="dropdown-item' . (!empty($language['current_lang']) ? ' active' : '') . '" href="' . esc_url($language['url']) . '" hreflang="' . esc_attr($language['slug']) . '">' . esc_html($language['name']) . '</a></li>';
    }
    return $out . '</ul></div>';
}
