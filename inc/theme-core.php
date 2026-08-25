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
            ['icon'=>'bi-journal-text','color'=>'orange','title'=>$t('Smart Notes & Reminders','الملاحظات الذكية والتذكيرات','Notes intelligentes & rappels'),'text'=>$t('Capture important context, organize it instantly, and make sure critical follow-ups happen on time.','سجّل المعلومات المهمة، نظّمها بسهولة، وتأكد من أن كل متابعة تتم في وقتها.','Centralisez les informations importantes, organisez-les facilement et assurez-vous que chaque suivi intervient au bon moment.'),'chips'=>$t("Timed reminders\nCategories\nFull-text search","تذكيرات مجدولة\nتصنيفات\nبحث شامل","Rappels programmés\nCatégories\nRecherche avancée"),'image'=>$asset('06-smart-notes.jpg'),'url'=>''],
            ['icon'=>'bi-calendar3','color'=>'blue','title'=>$t('Unified Scheduling','الجدولة الموحدة','Planification unifiée'),'text'=>$t('Coordinate meetings, deadlines, and upcoming priorities through one shared schedule.','اجمع الاجتماعات والمواعيد النهائية والأولويات القادمة في جدول واحد يسهل متابعته.','Centralisez les réunions, les échéances et les priorités à venir dans un agenda partagé, simple à consulter.'),'chips'=>$t("Week view\nCalendar sync\nDeadlines","عرض أسبوعي\nمزامنة التقويم\nالمواعيد النهائية","Vue hebdomadaire\nSynchronisation du calendrier\nÉchéances"),'image'=>$asset('07-week-view.jpg'),'url'=>''],
            ['icon'=>'bi-bar-chart-line','color'=>'teal','title'=>$t('Real-time Analytics','التحليلات اللحظية','Analyses en temps réel'),'text'=>$t('Track business health, spending, and key metrics as activity unfolds.','تابع مؤشرات الأداء والإنفاق وحالة المشروعات مع تطور العمل، دون انتظار إعداد التقارير يدويًا.','Suivez les indicateurs clés, les dépenses et l’avancement des projets au fil de leur exécution, sans attendre la préparation manuelle de rapports.'),'chips'=>$t("Health score\nMonthly burn\nLive KPIs","مؤشر الأداء\nمعدل الإنفاق الشهري\nمؤشرات مباشرة","Indicateurs de performance\nDépenses mensuelles\nKPI en temps réel"),'image'=>$asset('08-analytics.jpg'),'url'=>''],
            ['icon'=>'bi-check2-square','color'=>'orange','title'=>$t('Task Tracking','متابعة المهام','Suivi des tâches'),'text'=>$t('Make every responsibility explicit with an owner, priority, deadline, and status.','اجعل كل مهمة واضحة: من المسؤول عنها، وما أولويتها، ومتى يجب إنجازها، وإلى أين وصلت.','Donnez à chaque tâche un cadre clair avec un responsable, une priorité, une échéance et un statut d’avancement.'),'chips'=>$t("Kanban board\nPriorities\nOwners","لوحة كانبان\nالأولويات\nالمسؤولون","Tableau Kanban\nPriorités\nResponsables"),'image'=>$asset('09-task-board.jpg'),'url'=>''],
        ],
        'problem_bad' => [
            ['label'=>$t('Task updates','تحديثات المهام','Mises à jour des tâches'),'meta'=>$t('scattered across conversations','موزعة بين المحادثات','Dispersées dans les conversations')],['label'=>$t('Project files','ملفات المشروعات','Fichiers projet'),'meta'=>$t('stored in separate folders','محفوظة في مجلدات منفصلة','Stockés dans des dossiers séparés')],['label'=>$t('Budgets','الميزانيات','Budgets'),'meta'=>$t('tracked outside the workflow','تُتابع بعيدًا عن سير التنفيذ','Suivis en dehors du processus d’exécution')],['label'=>$t('Reports','التقارير','Rapports'),'meta'=>$t('built manually','تُعد يدويًا','Préparés manuellement')],['label'=>$t('Overall status','الوضع العام','Vision globale'),'meta'=>$t('difficult to assess quickly','يحتاج إلى وقت لفهمه','Difficile à reconstituer')],
        ],
        'problem_good' => [
            ['label'=>$t('Task updates','تحديثات المهام','Mises à jour des tâches'),'meta'=>$t('linked to the activity','مرتبطة بما يجري فعليًا','Reliées à l’activité réelle')],['label'=>$t('Project files','ملفات المشروعات','Fichiers projet'),'meta'=>$t('available where they are needed','متاحة حيث تحتاجها','Disponibles au bon endroit, au bon moment')],['label'=>$t('Budgets','الميزانيات','Budgets'),'meta'=>$t('tracked alongside delivery','تُتابع بالتوازي مع التنفيذ','Suivis en parallèle de l’exécution')],['label'=>$t('Reports','التقارير','Rapports'),'meta'=>$t('generated from current activity','تُنشأ من البيانات الحالية','Générés à partir des données actualisées')],['label'=>$t('Overall status','الوضع العام','Vision globale'),'meta'=>$t('easy to review at a glance','واضح من نظرة سريعة','Accessible en un coup d’œil')],
        ],
        'hub_left' => [
            ['icon'=>'bi-check2-square','label'=>$t('Tasks','المهام','Tâches')],['icon'=>'bi-kanban','label'=>$t('Projects','المشروعات','Projets')],['icon'=>'bi-folder2-open','label'=>$t('Files','الملفات','Fichiers')],['icon'=>'bi-file-earmark-text','label'=>$t('Reports','التقارير','Rapports')],['icon'=>'bi-patch-check','label'=>$t('Approvals','الموافقات','Validations')],
        ],
        'hub_right' => [
            ['icon'=>'bi-people','label'=>$t('Teams','الفرق','Équipes')],['icon'=>'bi-cash-stack','label'=>$t('Budgets','الميزانيات','Budgets')],['icon'=>'bi-lightbulb','label'=>$t('Insights','الرؤى','Analyses')],['icon'=>'bi-gear','label'=>$t('Automation','الأتمتة','Automatisation')],['icon'=>'bi-graph-up-arrow','label'=>$t('Performance','الأداء','Performance')],
        ],
        'features' => [
            ['id'=>'ai','icon'=>'bi-stars','color'=>'blue','tag'=>$t('AI INSIGHTS','رؤى مدعومة بالذكاء الاصطناعي','ANALYSES AUGMENTÉES PAR L’IA'),'title'=>$t('Know what deserves your attention','اعرف ما يستحق انتباهك','Identifiez plus tôt ce qui mérite votre attention'),'text'=>$t('Turn ongoing team and project activity into concise reports, meaningful summaries, and early signals that surface what needs a closer look.','حوّل نشاط الفرق والمشروعات إلى تقارير مختصرة وملخصات واضحة وإشارات مبكرة تساعدك على اكتشاف ما يحتاج إلى متابعة قبل أن يتحول إلى مشكلة أكبر.','Transformez l’activité des équipes et des projets en rapports synthétiques, en résumés clairs et en signaux d’alerte précoces afin d’identifier les points nécessitant un suivi avant qu’un problème ne prenne de l’ampleur.'),'bullets'=>$t("AI-generated project reports\nSummaries of wins, delays, and active priorities\nSuggestions and risk detection","تقارير للمشروعات مدعومة بالذكاء الاصطناعي\nملخصات للإنجازات والتأخيرات والأولويات الحالية\nاقتراحات وتنبيهات للمخاطر","Rapports de projet générés par l’IA\nRésumés des avancées, des retards et des priorités en cours\nSuggestions et alertes de risque"),'image'=>$asset('13-ai-insight.jpg'),'image_secondary'=>$asset('14-ai-progress-summary.jpg'),'url'=>''],
            ['id'=>'planner','icon'=>'bi-calendar-week','color'=>'orange','tag'=>$t('DIGITAL PLANNER','المخطط الرقمي','PLANIFICATEUR NUMÉRIQUE'),'title'=>$t('Turn priorities into an executable plan','حوّل الأولويات إلى خطة قابلة للتنفيذ','Transformez les priorités en plans d’action'),'text'=>$t('Structure responsibilities across board, weekly, and calendar views while keeping deadlines, ownership, and capacity aligned.','نظّم المهام بين لوحة العمل والعرض الأسبوعي والتقويم، مع وضوح المواعيد والمسؤوليات وحجم العمل لدى الفريق.','Organisez le travail grâce aux tableaux, aux vues hebdomadaires et au calendrier, avec une vision claire des échéances, des responsabilités et de la charge de travail de l’équipe.'),'bullets'=>$t("Drag-and-drop Kanban boards\nWeekly capacity overview\nClear ownership and priorities","لوحات كانبان بالسحب والإفلات\nنظرة أسبوعية على حجم العمل\nوضوح المسؤوليات والأولويات","Tableaux Kanban en glisser-déposer\nVue hebdomadaire de la charge de travail\nResponsabilités et priorités clairement définies"),'image'=>$asset('16-kanban-board.jpg'),'image_secondary'=>'','url'=>''],
            ['id'=>'notes','icon'=>'bi-journal-check','color'=>'teal','tag'=>$t('SMART NOTES','الملاحظات الذكية','NOTES INTELLIGENTES'),'title'=>$t('Keep important context from getting lost','احتفظ بالسياق المهم في متناولك','Gardez le contexte essentiel à portée de main'),'text'=>$t('Capture decisions, ideas, and follow-ups as they happen, then organize and retrieve them when they become relevant again.','سجّل القرارات والأفكار والمتابعات لحظة حدوثها، ونظّمها بحيث تجد ما تحتاجه بسهولة عندما يحين وقت الرجوع إليها.','Consignez les décisions, les idées et les actions de suivi au moment où elles émergent, puis organisez-les pour retrouver facilement les informations lorsqu’elles redeviennent utiles.'),'bullets'=>$t("Timed reminders\nColor-coded categories\nSearch across saved notes","تذكيرات مجدولة\nتصنيفات مميزة بالألوان\nبحث داخل الملاحظات المحفوظة","Rappels programmés\nCatégories avec code couleur\nRecherche dans les notes enregistrées"),'image'=>$asset('18-smart-notes-row-1.jpg'),'image_secondary'=>$asset('19-smart-notes-row-2.jpg'),'url'=>''],
            ['id'=>'workspace','icon'=>'bi-rocket-takeoff','color'=>'blue','tag'=>$t('WORKSPACE','مساحة العمل','ESPACE DE TRAVAIL'),'title'=>$t('Move from discussion to execution','من النقاش إلى التنفيذ','De la discussion à l’exécution'),'text'=>$t('Create a focused space where the right people can exchange ideas, share input, and assign responsibilities as plans take shape. When a conversation becomes a real initiative, turn the workspace into a project without losing the thinking behind it.','أنشئ مساحة مخصصة تجمع الأشخاص المناسبين لتبادل الأفكار ومشاركة الآراء وتوزيع المسؤوليات أثناء تشكّل الخطة. وعندما تتحول الفكرة إلى مبادرة فعلية، حوّل مساحة العمل إلى مشروع دون أن تفقد النقاشات والسياق الذي سبقها.','Créez un espace dédié où les bonnes personnes peuvent échanger des idées, partager leurs retours et répartir les responsabilités au fur et à mesure que le plan se précise. Lorsqu’une idée devient une initiative concrète, transformez l’espace de travail en projet sans perdre les échanges ni le contexte qui l’ont précédée.'),'bullets'=>$t("Invite members and managers\nCreate tasks from discussions\nConvert a workspace into a project","دعوة الأعضاء والمديرين\nإنشاء المهام من داخل النقاشات\nتحويل مساحة العمل إلى مشروع","Inviter des membres et des managers\nCréer des tâches directement depuis les discussions\nTransformer un espace de travail en projet"),'image'=>'workspace','image_secondary'=>'','url'=>''],
            ['id'=>'delivery','icon'=>'bi-box-seam','color'=>'blue','tag'=>$t('PROJECT DELIVERY','إدارة تسليم المشروعات','PILOTAGE DE PROJET'),'title'=>$t('Control every stage through completion','تابع كل مرحلة حتى التسليم','Gardez le contrôle jusqu’à la livraison'),'text'=>$t('Manage files, approvals, budgets, deadlines, and final deliverables throughout the project lifecycle. See what has been completed, what is still pending, and what requires action next.','أدِر الملفات والموافقات والميزانيات والمواعيد النهائية والمخرجات من بداية المشروع حتى اكتماله. واعرف في أي لحظة ما تم إنجازه، وما لا يزال قيد التنفيذ، وما يحتاج إلى إجراء تالٍ.','Gérez les fichiers, les validations, les budgets, les échéances et les livrables du lancement jusqu’à la finalisation du projet. À tout moment, identifiez ce qui est terminé, ce qui est encore en cours et ce qui nécessite une prochaine action.'),'bullets'=>$t("Built-in approval workflow\nBudget and deadline tracking\nShared project oversight","مسار موافقات مدمج\nمتابعة الميزانية والمواعيد النهائية\nرؤية مشتركة لحالة المشروع","Circuit de validation intégré\nSuivi du budget et des échéances\nVue partagée de l’état du projet"),'image'=>$asset('21-project-objective.jpg'),'image_secondary'=>$asset('22-project-deliverables.jpg'),'url'=>''],
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
        'from_name' => get_bloginfo('name') ?: 'Beem View 360',
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
            'hero_kicker' => ['en'=>'HERO','ar'=>'الواجهة الرئيسية','fr'=>'HERO'],
            'hero_title' => ['en'=>'From daily work to the bigger picture','ar'=>'من تفاصيل اليوم إلى رؤية أوضح للأعمال','fr'=>'Du quotidien à une vision d’ensemble'],
            'hero_text' => ['en'=>'Beem View 360 brings tasks, projects, teams, and performance into one intelligent workspace — so people know what to do next and leaders know where the business stands.','ar'=>'يجمع بيم ڤيو 360 المهام والمشروعات والفرق ومؤشرات الأداء في مساحة عمل ذكية واحدة — ليعرف كل فريق أولوياته، وتعرف الإدارة أين يقف العمل وما يحتاج إلى اهتمام.','fr'=>'Beem View 360 réunit les tâches, les projets, les équipes et les indicateurs de performance dans un espace de travail intelligent. Chaque équipe sait ainsi où concentrer ses efforts, tandis que la direction dispose d’une vision claire de l’activité et des priorités qui nécessitent son attention.'],
            'hero_primary' => ['en'=>'Book a Demo','ar'=>'احجز عرضًا توضيحيًا','fr'=>'Demander une démo'],
            'hero_secondary' => ['en'=>'Contact Us','ar'=>'تواصل معنا','fr'=>'Nous contacter'],
            'request_title' => ['en'=>'See Beem View 360 in action','ar'=>'شاهد بيم ڤيو 360 أثناء العمل','fr'=>'Découvrez Beem View 360 en action'],
            'request_intro' => ['en'=>'Explore how Beem View 360 can support day-to-day execution and management oversight across your organization.','ar'=>'اكتشف كيف يساعد بيم ڤيو 360 فرقك على إدارة العمل اليومي، ويمنح الإدارة رؤية أوضح للأداء على مستوى المؤسسة.','fr'=>'Découvrez comment Beem View 360 aide vos équipes à gérer efficacement le travail quotidien tout en offrant à la direction une vision plus claire de la performance à l’échelle de l’organisation.'],
            'contact_title' => ['en'=>'Talk to our team','ar'=>'تحدث مع فريقنا','fr'=>'Parlons de vos besoins'],
            'contact_intro' => ['en'=>'Have a question about Beem View 360 or how it could fit your organization? Tell us what you need and our team will get back to you.','ar'=>'لديك سؤال عن بيم ڤيو 360 أو تريد معرفة مدى ملاءمته لطريقة العمل في مؤسستك؟ أخبرنا بما تحتاجه وسيتواصل معك فريقنا.','fr'=>'Vous avez une question sur Beem View 360 ou souhaitez savoir comment la solution peut s’adapter au fonctionnement de votre organisation ? Décrivez-nous vos besoins et notre équipe vous recontactera dans les meilleurs délais.'],
            'field_name' => ['en'=>'Full name','ar'=>'الاسم الكامل','fr'=>'Nom complet'],
            'field_email' => ['en'=>'Work email','ar'=>'البريد الإلكتروني للعمل','fr'=>'E-mail professionnel'],
            'field_phone' => ['en'=>'Phone number','ar'=>'رقم الهاتف','fr'=>'Numéro de téléphone'],
            'field_company' => ['en'=>'Company','ar'=>'الشركة','fr'=>'Entreprise'],
            'field_message' => ['en'=>'How can we help?','ar'=>'كيف يمكننا مساعدتك؟','fr'=>'Comment pouvons-nous vous aider ?'],
            'form_submit' => ['en'=>'Send Request','ar'=>'إرسال الطلب','fr'=>'Envoyer la demande'],
            'form_success' => ['en'=>'Thank you. Your request was received and we will contact you shortly.','ar'=>'شكرًا لك. تم استلام طلبك وسنتواصل معك قريبًا.','fr'=>'Merci. Votre demande a été reçue et nous vous contacterons bientôt.'],
            'thankyou_subject' => ['en'=>'Thank you for contacting Beem View 360','ar'=>'شكرًا لتواصلك مع Beem View 360','fr'=>'Merci d’avoir contacté Beem View 360'],
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
            'pillars_title' => ['en'=>'Everything you need to keep momentum','ar'=>'كل ما تحتاجه للحفاظ على سير العمل','fr'=>'L’essentiel pour garder le cap'],
            'pillars_text' => ['en'=>'Bring planning, scheduling, measurement, and accountability into the flow of everyday execution.','ar'=>'خطط للأولويات، نسّق المواعيد، تابع الأداء، وحدد المسؤوليات بوضوح — ضمن تجربة عمل واحدة ومتكاملة.','fr'=>'Planifiez les priorités, coordonnez les échéances, suivez la performance et clarifiez les responsabilités, le tout dans un environnement de travail unifié.'],
            'problem_title' => ['en'=>'Your work is connected. Your tools aren’t','ar'=>'العمل مترابط. الأدوات متفرقة','fr'=>'Le travail est connecté. Les outils sont dispersés.'],
            'problem_text' => ['en'=>'Tasks move in one place. Files live in another. Budgets sit in spreadsheets. Reports are rebuilt manually. When information is fragmented, teams spend more time piecing together status and less time moving priorities forward.','ar'=>'المهام في مكان، والملفات في مكان آخر، والميزانيات داخل جداول منفصلة، والتقارير تحتاج إلى إعداد يدوي في كل مرة. ومع تشتت المعلومات، يضيع وقت أكبر في جمع التحديثات وفهم الوضع الحالي بدلًا من دفع الأولويات إلى الأمام.','fr'=>'Les tâches sont réparties entre différents outils, les fichiers stockés ailleurs, les budgets suivis dans des feuilles de calcul distinctes et les rapports préparés manuellement à chaque fois. Lorsque l’information est fragmentée, les équipes consacrent davantage de temps à rassembler les mises à jour et à comprendre la situation qu’à faire avancer les priorités.'],
            'solution_title' => ['en'=>'Run the work. See what matters','ar'=>'أدِر العمل. وركّز على المهم','fr'=>'Pilotez l’exécution. Concentrez-vous sur l’essentiel.'],
            'solution_text' => ['en'=>'Beem View 360 brings operational activity and business information into the same environment, helping teams stay organized while giving management the insight needed to stay informed.','ar'=>'يجمع بيم ڤيو 360 النشاط التشغيلي ومعلومات الأعمال في بيئة واحدة، ليمنح الفرق طريقة أكثر تنظيمًا للعمل، ويمنح الإدارة ما تحتاجه لفهم الوضع واتخاذ الخطوة المناسبة.','fr'=>'Beem View 360 réunit l’activité opérationnelle et les informations de gestion dans un environnement unique. Les équipes peuvent ainsi mieux organiser leur travail, tandis que la direction dispose des informations nécessaires pour comprendre la situation et agir au bon moment.'],
            'features_title' => ['en'=>'Built around how initiatives move','ar'=>'مصمم ليتماشى مع طريقة العمل الفعلية','fr'=>'Conçu pour suivre le rythme réel du travail'],
            'features_text' => ['en'=>'From the first discussion to final delivery, Beem View 360 keeps the people, information, and actions behind every initiative easy to manage and follow.','ar'=>'من أول نقاش إلى التسليم النهائي، يجمع بيم ڤيو 360 الأشخاص والمعلومات والخطوات المرتبطة بكل مبادرة لتبقى سهلة الإدارة والمتابعة.','fr'=>'Du premier échange à la livraison finale, Beem View 360 rassemble les personnes, les informations et les actions associées à chaque initiative afin de simplifier son pilotage et son suivi.'],
            'cta_title' => ['en'=>'Bring execution and oversight together','ar'=>'وحّد التنفيذ والمتابعة في مكان واحد','fr'=>'Réunissez exécution et pilotage dans un même espace'],
            'cta_text' => ['en'=>'Ready to see your business more clearly?','ar'=>'هل أنت مستعد لرؤية أعمالك بوضوح أكبر؟','fr'=>'Prêt à avoir une vision plus claire de votre activité ?'],
        ],
    ];
}

function beem360_brand_value(mixed $value): mixed {
    if(is_array($value))return array_map('beem360_brand_value',$value);
    return is_string($value)?str_replace(['BEEM 360','Beem 360'],['BEEM VIEW 360','Beem View 360'],$value):$value;
}

function beem360_options(): array {
    $saved=(array)get_option('beem360_options',[]);$options=array_replace_recursive(beem360_defaults(),$saved);
    if(isset($saved['section_order'])&&is_array($saved['section_order']))$options['section_order']=$saved['section_order'];
    if(isset($saved['items'])&&is_array($saved['items']))foreach($saved['items'] as $group=>$items)$options['items'][$group]=is_array($items)?array_values($items):[];
    return beem360_brand_value($options);
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
