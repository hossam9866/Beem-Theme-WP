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
            ['id'=>'workspace','icon'=>'bi-rocket-takeoff','color'=>'blue','tag'=>$t('WORKSPACE','مساحة العمل','ESPACE DE TRAVAIL'),'title'=>$t('Move from discussion to execution','من النقاش إلى التنفيذ','De la discussion à l’exécution'),'text'=>$t("Create a focused space where the right people can exchange ideas, share input, and assign responsibilities as plans take shape.\n\nWhen a conversation becomes a real initiative, turn the workspace into a project without losing the thinking behind it.","أنشئ مساحة مخصصة تجمع الأشخاص المناسبين لتبادل الأفكار ومشاركة الآراء وتوزيع المسؤوليات أثناء تشكّل الخطة.\n\nوعندما تتحول الفكرة إلى مبادرة فعلية، حوّل مساحة العمل إلى مشروع دون أن تفقد النقاشات والسياق الذي سبقها.","Créez un espace dédié où les bonnes personnes peuvent échanger des idées, partager leurs retours et répartir les responsabilités au fur et à mesure que le plan se précise.\n\nLorsqu’une idée devient une initiative concrète, transformez l’espace de travail en projet sans perdre les échanges ni le contexte qui l’ont précédée."),'bullets'=>$t("Invite members and managers\nCreate tasks from discussions\nConvert a workspace into a project","دعوة الأعضاء والمديرين\nإنشاء المهام من داخل النقاشات\nتحويل مساحة العمل إلى مشروع","Inviter des membres et des managers\nCréer des tâches directement depuis les discussions\nTransformer un espace de travail en projet"),'image'=>'workspace','image_secondary'=>'','url'=>''],
            ['id'=>'delivery','icon'=>'bi-box-seam','color'=>'blue','tag'=>$t('PROJECT DELIVERY','إدارة تسليم المشروعات','PILOTAGE DE PROJET'),'title'=>$t('Control every stage through completion','تابع كل مرحلة حتى التسليم','Gardez le contrôle jusqu’à la livraison'),'text'=>$t("Manage files, approvals, budgets, deadlines, and final deliverables throughout the project lifecycle.\n\nSee what has been completed, what is still pending, and what requires action next.","أدِر الملفات والموافقات والميزانيات والمواعيد النهائية والمخرجات من بداية المشروع حتى اكتماله.\n\nواعرف في أي لحظة ما تم إنجازه، وما لا يزال قيد التنفيذ، وما يحتاج إلى إجراء تالٍ.","Gérez les fichiers, les validations, les budgets, les échéances et les livrables du lancement jusqu’à la finalisation du projet.\n\nÀ tout moment, identifiez ce qui est terminé, ce qui est encore en cours et ce qui nécessite une prochaine action."),'bullets'=>$t("Built-in approval workflow\nBudget and deadline tracking\nShared project oversight","مسار موافقات مدمج\nمتابعة الميزانية والمواعيد النهائية\nرؤية مشتركة لحالة المشروع","Circuit de validation intégré\nSuivi du budget et des échéances\nVue partagée de l’état du projet"),'image'=>$asset('21-project-objective.jpg'),'image_secondary'=>$asset('22-project-deliverables.jpg'),'url'=>''],
        ],
        'footer_links' => [
            ['label'=>$t('Terms & Conditions','الشروط والأحكام','Conditions générales'),'url'=>'@terms'],
            ['label'=>$t('Privacy Policy','سياسة الخصوصية','Politique de confidentialité'),'url'=>'@privacy'],
        ],
    ];
}

function beem360_default_legal_content(): array {
    $t=static fn(string $en,string $ar,string $fr): array=>compact('en','ar','fr');
    $privacy_en=<<<'HTML'
<h2>1. What this policy covers</h2>
<p>This Privacy Policy explains how Beem View 360 handles personal information when you visit our website, request a demonstration, contact our team, create an account, or use our workspace and project-management services.</p>
<h2>2. Information we collect</h2>
<ul><li><strong>Account and contact information:</strong> name, work email, phone number, company, role, and account credentials.</li><li><strong>Workspace content:</strong> tasks, projects, notes, files, approvals, schedules, messages, budgets, reports, and other information submitted by users.</li><li><strong>Usage and device information:</strong> log data, browser and device details, IP address, activity records, and diagnostic information.</li><li><strong>Communications:</strong> demo requests, support messages, feedback, and other correspondence.</li></ul>
<h2>3. How we use information</h2>
<p>We use information to provide and secure the service, manage accounts, process requests, support users, generate requested reports and insights, improve performance, communicate service updates, prevent misuse, and comply with applicable obligations.</p>
<h2>4. How information is shared</h2>
<p>We may share information with trusted service providers that support hosting, communications, analytics, security, and customer service; with administrators of the organisation that controls your workspace; when required by law or necessary to protect rights and safety; or as part of a merger, financing, acquisition, or transfer of business assets. We do not sell personal information.</p>
<h2>5. Retention and security</h2>
<p>We retain information for as long as needed to provide the service, meet contractual and legal requirements, resolve disputes, and maintain legitimate business records. We use organisational and technical safeguards designed to protect information, but no online service can guarantee absolute security.</p>
<h2>6. International data transfers</h2>
<p>Our service providers may process information in countries other than your own. Where required, we use appropriate safeguards for international transfers.</p>
<h2>7. Your choices and rights</h2>
<p>Depending on your location, you may have rights to access, correct, delete, restrict, object to, or receive a copy of your personal information, and to withdraw consent where processing relies on consent. Some workspace requests may need to be directed to the organisation that controls your account.</p>
<h2>8. Cookies and similar technologies</h2>
<p>We may use essential technologies to operate the website and optional analytics technologies to understand usage. Where required, we will request consent before using non-essential cookies.</p>
<h2>9. Children</h2>
<p>Beem View 360 is a business service and is not intended for children. We do not knowingly collect personal information from children through the service.</p>
<h2>10. Changes and contact</h2>
<p>We may update this policy as our service or legal obligations change. The revised version will be posted here with an updated date. To ask a privacy question or exercise a right, use the contact form on this website.</p>
HTML;
    $privacy_ar=<<<'HTML'
<h2>1. نطاق هذه السياسة</h2>
<p>توضح سياسة الخصوصية هذه كيفية تعامل بيم ڤيو 360 مع المعلومات الشخصية عند زيارة موقعنا، أو طلب عرض توضيحي، أو التواصل مع فريقنا، أو إنشاء حساب، أو استخدام خدمات مساحة العمل وإدارة المشروعات.</p>
<h2>2. المعلومات التي نجمعها</h2>
<ul><li><strong>معلومات الحساب والتواصل:</strong> الاسم، والبريد الإلكتروني للعمل، ورقم الهاتف، والشركة، والدور الوظيفي، وبيانات تسجيل الدخول.</li><li><strong>محتوى مساحة العمل:</strong> المهام، والمشروعات، والملاحظات، والملفات، والموافقات، والجداول، والرسائل، والميزانيات، والتقارير، وغيرها من المعلومات التي يقدمها المستخدمون.</li><li><strong>معلومات الاستخدام والجهاز:</strong> بيانات السجل، وتفاصيل المتصفح والجهاز، وعنوان بروتوكول الإنترنت، وسجلات النشاط، والمعلومات التشخيصية.</li><li><strong>المراسلات:</strong> طلبات العروض التوضيحية، ورسائل الدعم، والملاحظات، وأي مراسلات أخرى.</li></ul>
<h2>3. كيفية استخدام المعلومات</h2>
<p>نستخدم المعلومات لتقديم الخدمة وتأمينها، وإدارة الحسابات، ومعالجة الطلبات، ودعم المستخدمين، وإنشاء التقارير والرؤى المطلوبة، وتحسين الأداء، وإرسال تحديثات الخدمة، ومنع إساءة الاستخدام، والامتثال للالتزامات المعمول بها.</p>
<h2>4. كيفية مشاركة المعلومات</h2>
<p>قد نشارك المعلومات مع مزودي الخدمات الموثوقين الذين يدعمون الاستضافة والاتصالات والتحليلات والأمان وخدمة العملاء، ومع مسؤولي المؤسسة التي تدير مساحة عملك، أو عندما يقتضي القانون ذلك أو يكون ضروريًا لحماية الحقوق والسلامة، أو ضمن اندماج أو تمويل أو استحواذ أو نقل لأصول العمل. نحن لا نبيع المعلومات الشخصية.</p>
<h2>5. الاحتفاظ والأمان</h2>
<p>نحتفظ بالمعلومات للمدة اللازمة لتقديم الخدمة، والوفاء بالمتطلبات التعاقدية والقانونية، وحل النزاعات، والاحتفاظ بسجلات العمل المشروعة. نستخدم إجراءات تنظيمية وتقنية مصممة لحماية المعلومات، لكن لا توجد خدمة عبر الإنترنت تضمن الأمان المطلق.</p>
<h2>6. نقل البيانات دوليًا</h2>
<p>قد يعالج مزودو خدماتنا المعلومات في دول غير دولتك. وعندما يكون ذلك مطلوبًا، نستخدم ضمانات مناسبة لعمليات النقل الدولية.</p>
<h2>7. خياراتك وحقوقك</h2>
<p>بحسب موقعك، قد يكون لك الحق في الوصول إلى معلوماتك الشخصية أو تصحيحها أو حذفها أو تقييد معالجتها أو الاعتراض عليها أو الحصول على نسخة منها، وسحب الموافقة عندما تعتمد المعالجة عليها. وقد يلزم توجيه بعض الطلبات المتعلقة بمساحة العمل إلى المؤسسة التي تدير حسابك.</p>
<h2>8. ملفات تعريف الارتباط والتقنيات المشابهة</h2>
<p>قد نستخدم تقنيات أساسية لتشغيل الموقع، وتقنيات تحليل اختيارية لفهم الاستخدام. وعندما يكون ذلك مطلوبًا، سنطلب الموافقة قبل استخدام ملفات تعريف ارتباط غير أساسية.</p>
<h2>9. الأطفال</h2>
<p>بيم ڤيو 360 خدمة مخصصة للأعمال وليست موجهة للأطفال، ولا نجمع عن علم معلومات شخصية من الأطفال عبر الخدمة.</p>
<h2>10. التغييرات والتواصل</h2>
<p>قد نحدّث هذه السياسة مع تطور خدمتنا أو التزاماتنا القانونية. وسيتم نشر النسخة المعدلة هنا مع تاريخ تحديث جديد. لطرح سؤال يتعلق بالخصوصية أو ممارسة أحد حقوقك، استخدم نموذج التواصل في هذا الموقع.</p>
HTML;
    $privacy_fr=<<<'HTML'
<h2>1. Champ d’application</h2>
<p>La présente Politique de confidentialité explique comment Beem View 360 traite les données personnelles lorsque vous consultez notre site, demandez une démonstration, contactez notre équipe, créez un compte ou utilisez nos services d’espace de travail et de gestion de projet.</p>
<h2>2. Informations collectées</h2>
<ul><li><strong>Informations de compte et de contact :</strong> nom, e-mail professionnel, numéro de téléphone, entreprise, fonction et identifiants de connexion.</li><li><strong>Contenu de l’espace de travail :</strong> tâches, projets, notes, fichiers, validations, calendriers, messages, budgets, rapports et autres informations fournies par les utilisateurs.</li><li><strong>Données d’utilisation et de l’appareil :</strong> journaux, informations sur le navigateur et l’appareil, adresse IP, historique d’activité et données de diagnostic.</li><li><strong>Communications :</strong> demandes de démonstration, messages d’assistance, commentaires et autres échanges.</li></ul>
<h2>3. Utilisation des informations</h2>
<p>Nous utilisons les informations pour fournir et sécuriser le service, gérer les comptes, traiter les demandes, assister les utilisateurs, produire les rapports et analyses demandés, améliorer les performances, communiquer les mises à jour, prévenir les abus et respecter les obligations applicables.</p>
<h2>4. Partage des informations</h2>
<p>Nous pouvons partager des informations avec des prestataires de confiance qui assurent l’hébergement, les communications, l’analyse, la sécurité et l’assistance ; avec les administrateurs de l’organisation qui contrôle votre espace de travail ; lorsque la loi l’exige ou pour protéger les droits et la sécurité ; ou dans le cadre d’une fusion, d’un financement, d’une acquisition ou d’un transfert d’actifs. Nous ne vendons pas les données personnelles.</p>
<h2>5. Conservation et sécurité</h2>
<p>Nous conservons les informations aussi longtemps que nécessaire pour fournir le service, respecter les exigences contractuelles et légales, résoudre les litiges et tenir des registres professionnels légitimes. Nous appliquons des mesures organisationnelles et techniques destinées à protéger les informations, mais aucun service en ligne ne peut garantir une sécurité absolue.</p>
<h2>6. Transferts internationaux</h2>
<p>Nos prestataires peuvent traiter des informations dans des pays autres que le vôtre. Lorsque cela est requis, nous utilisons des garanties appropriées pour les transferts internationaux.</p>
<h2>7. Vos choix et vos droits</h2>
<p>Selon votre lieu de résidence, vous pouvez disposer de droits d’accès, de rectification, d’effacement, de limitation, d’opposition ou de portabilité, ainsi que du droit de retirer votre consentement lorsque le traitement repose sur celui-ci. Certaines demandes liées à un espace de travail doivent être adressées à l’organisation qui contrôle votre compte.</p>
<h2>8. Cookies et technologies similaires</h2>
<p>Nous pouvons utiliser des technologies essentielles au fonctionnement du site et des outils d’analyse facultatifs pour comprendre son utilisation. Lorsque la loi l’exige, nous demandons votre consentement avant d’utiliser des cookies non essentiels.</p>
<h2>9. Enfants</h2>
<p>Beem View 360 est un service professionnel qui ne s’adresse pas aux enfants. Nous ne collectons pas sciemment de données personnelles d’enfants par l’intermédiaire du service.</p>
<h2>10. Modifications et contact</h2>
<p>Nous pouvons mettre à jour cette politique en fonction de l’évolution du service ou de nos obligations légales. La version révisée sera publiée ici avec une nouvelle date de mise à jour. Pour toute question relative à la confidentialité ou pour exercer un droit, utilisez le formulaire de contact de ce site.</p>
HTML;
    $terms_en=<<<'HTML'
<h2>1. Acceptance of these terms</h2>
<p>These Terms & Conditions govern access to the Beem View 360 website and services. By creating an account, accepting an order, or using the service, you agree to these terms on behalf of yourself and, where applicable, your organisation.</p>
<h2>2. Accounts and authorised users</h2>
<p>You must provide accurate account information, keep credentials confidential, and promptly notify us of suspected unauthorised access. Your organisation is responsible for its users and for configuring appropriate roles and permissions.</p>
<h2>3. Permitted use</h2>
<p>You may use the service for lawful business purposes. You must not interfere with the service, bypass security controls, upload malicious code, access another customer’s data, misuse automated interfaces, infringe rights, or use the service for unlawful, deceptive, or harmful activity.</p>
<h2>4. Your content and responsibilities</h2>
<p>You retain ownership of content submitted to the service. You grant us the limited rights needed to host, process, transmit, back up, and display that content to provide the service. You are responsible for having the rights and permissions needed to submit content and for the accuracy and legality of that content.</p>
<h2>5. Service operation</h2>
<p>We may update, improve, or modify features over time. We aim to keep the service available and secure, but maintenance, technical issues, or events outside our control may cause interruptions. Beta or preview features may change or be discontinued.</p>
<h2>6. Fees and subscriptions</h2>
<p>If you purchase a paid plan, fees, billing periods, renewal terms, usage limits, and taxes are governed by the applicable order, proposal, or checkout terms. Unless otherwise stated or required by law, paid fees are non-refundable.</p>
<h2>7. Third-party services</h2>
<p>The service may connect to third-party products. Their terms and privacy practices apply to their services, and we are not responsible for third-party systems outside our control.</p>
<h2>8. Intellectual property</h2>
<p>Beem View 360 and its licensors retain all rights in the service, software, designs, branding, and documentation. No rights are granted except the limited right to use the service under these terms.</p>
<h2>9. Suspension and termination</h2>
<p>We may suspend or restrict access when reasonably necessary to address security risks, unlawful use, non-payment, material breach, or harm to the service or others. You may stop using the service at any time, subject to any subscription or order commitments. After termination, access to content may end following the applicable retention period.</p>
<h2>10. Disclaimers</h2>
<p>To the extent permitted by law, the service is provided “as is” and “as available.” Insights, reports, and automated suggestions are decision-support tools and should be reviewed by qualified people; they are not legal, financial, medical, or other professional advice.</p>
<h2>11. Limitation of liability</h2>
<p>To the extent permitted by law, neither party will be liable for indirect, incidental, special, consequential, or punitive damages, or for loss of profits, revenue, goodwill, or data. Any additional limits or remedies in an order or written agreement will apply.</p>
<h2>12. Changes and contact</h2>
<p>We may update these terms to reflect changes to the service or applicable requirements. Material changes will be communicated as appropriate. If you have questions about these terms, use the contact form on this website.</p>
HTML;
    $terms_ar=<<<'HTML'
<h2>1. الموافقة على هذه الشروط</h2>
<p>تحكم هذه الشروط والأحكام الوصول إلى موقع وخدمات بيم ڤيو 360. بإنشاء حساب أو قبول طلب أو استخدام الخدمة، فإنك توافق على هذه الشروط نيابة عن نفسك، وعن مؤسستك عند الاقتضاء.</p>
<h2>2. الحسابات والمستخدمون المصرح لهم</h2>
<p>يجب تقديم معلومات حساب صحيحة، والحفاظ على سرية بيانات الدخول، وإبلاغنا فورًا بأي وصول غير مصرح به يُشتبه فيه. وتتحمل مؤسستك مسؤولية مستخدميها وضبط الأدوار والصلاحيات المناسبة.</p>
<h2>3. الاستخدام المسموح</h2>
<p>يمكنك استخدام الخدمة لأغراض أعمال مشروعة. ولا يجوز تعطيل الخدمة، أو تجاوز ضوابط الأمان، أو رفع برمجيات ضارة، أو الوصول إلى بيانات عميل آخر، أو إساءة استخدام الواجهات الآلية، أو انتهاك الحقوق، أو استخدام الخدمة في نشاط غير قانوني أو مضلل أو ضار.</p>
<h2>4. المحتوى ومسؤولياتك</h2>
<p>تحتفظ بملكية المحتوى الذي تقدمه إلى الخدمة. وتمنحنا الحقوق المحدودة اللازمة لاستضافة هذا المحتوى ومعالجته ونقله ونسخه احتياطيًا وعرضه بغرض تقديم الخدمة. وأنت مسؤول عن امتلاك الحقوق والأذونات اللازمة لتقديم المحتوى وعن دقته ومشروعيته.</p>
<h2>5. تشغيل الخدمة</h2>
<p>قد نحدّث المزايا أو نحسنها أو نعدلها بمرور الوقت. ونسعى للحفاظ على توفر الخدمة وأمانها، لكن الصيانة أو المشكلات التقنية أو الأحداث الخارجة عن سيطرتنا قد تسبب انقطاعًا. وقد تتغير المزايا التجريبية أو تتوقف.</p>
<h2>6. الرسوم والاشتراكات</h2>
<p>عند شراء خطة مدفوعة، تخضع الرسوم ودورات الفوترة وشروط التجديد وحدود الاستخدام والضرائب للطلب أو العرض أو شروط الدفع المعمول بها. وما لم يُذكر خلاف ذلك أو يقتضِ القانون، لا تُرد الرسوم المدفوعة.</p>
<h2>7. خدمات الأطراف الأخرى</h2>
<p>قد تتصل الخدمة بمنتجات تابعة لأطراف أخرى. وتسري شروطهم وممارسات الخصوصية لديهم على خدماتهم، ولسنا مسؤولين عن الأنظمة التابعة لأطراف أخرى والخارجة عن سيطرتنا.</p>
<h2>8. الملكية الفكرية</h2>
<p>تحتفظ بيم ڤيو 360 والجهات المرخصة لها بجميع الحقوق في الخدمة والبرمجيات والتصميمات والعلامات والوثائق. ولا تُمنح أي حقوق سوى الحق المحدود في استخدام الخدمة وفق هذه الشروط.</p>
<h2>9. التعليق والإنهاء</h2>
<p>يجوز لنا تعليق الوصول أو تقييده عندما يكون ذلك ضروريًا بصورة معقولة لمعالجة مخاطر أمنية أو استخدام غير قانوني أو عدم سداد أو مخالفة جوهرية أو ضرر بالخدمة أو بالآخرين. ويمكنك التوقف عن استخدام الخدمة في أي وقت، مع مراعاة التزامات الاشتراك أو الطلب. وبعد الإنهاء، قد ينتهي الوصول إلى المحتوى وفق مدة الاحتفاظ المعمول بها.</p>
<h2>10. إخلاء المسؤولية</h2>
<p>في الحدود التي يسمح بها القانون، تُقدم الخدمة «كما هي» و«حسب التوفر». وتعد الرؤى والتقارير والاقتراحات الآلية أدوات مساعدة لاتخاذ القرار ويجب مراجعتها من أشخاص مؤهلين، ولا تمثل استشارة قانونية أو مالية أو طبية أو مهنية أخرى.</p>
<h2>11. حدود المسؤولية</h2>
<p>في الحدود التي يسمح بها القانون، لا يتحمل أي طرف مسؤولية الأضرار غير المباشرة أو العرضية أو الخاصة أو التبعية أو العقابية، أو فقد الأرباح أو الإيرادات أو السمعة أو البيانات. وتسري أي حدود أو تعويضات إضافية واردة في طلب أو اتفاق مكتوب.</p>
<h2>12. التغييرات والتواصل</h2>
<p>قد نحدّث هذه الشروط لتعكس التغييرات في الخدمة أو المتطلبات المعمول بها، وسنبلغ عن التغييرات الجوهرية بالطريقة المناسبة. إذا كانت لديك أسئلة عن هذه الشروط، فاستخدم نموذج التواصل في هذا الموقع.</p>
HTML;
    $terms_fr=<<<'HTML'
<h2>1. Acceptation des conditions</h2>
<p>Les présentes Conditions générales régissent l’accès au site et aux services Beem View 360. En créant un compte, en acceptant une commande ou en utilisant le service, vous acceptez ces conditions pour votre propre compte et, le cas échéant, pour celui de votre organisation.</p>
<h2>2. Comptes et utilisateurs autorisés</h2>
<p>Vous devez fournir des informations exactes, préserver la confidentialité de vos identifiants et nous informer rapidement de tout accès non autorisé présumé. Votre organisation est responsable de ses utilisateurs ainsi que de la configuration des rôles et autorisations appropriés.</p>
<h2>3. Utilisation autorisée</h2>
<p>Vous pouvez utiliser le service à des fins professionnelles licites. Il est interdit de perturber le service, de contourner les contrôles de sécurité, de charger du code malveillant, d’accéder aux données d’un autre client, d’utiliser abusivement les interfaces automatisées, de porter atteinte à des droits ou d’utiliser le service à des fins illégales, trompeuses ou nuisibles.</p>
<h2>4. Votre contenu et vos responsabilités</h2>
<p>Vous restez propriétaire du contenu transmis au service. Vous nous accordez les droits limités nécessaires pour héberger, traiter, transmettre, sauvegarder et afficher ce contenu afin de fournir le service. Vous êtes responsable des droits et autorisations nécessaires, ainsi que de l’exactitude et de la légalité du contenu.</p>
<h2>5. Fonctionnement du service</h2>
<p>Nous pouvons mettre à jour, améliorer ou modifier les fonctionnalités. Nous cherchons à maintenir la disponibilité et la sécurité du service, mais des opérations de maintenance, des problèmes techniques ou des événements hors de notre contrôle peuvent provoquer des interruptions. Les fonctionnalités bêta ou en préversion peuvent évoluer ou être supprimées.</p>
<h2>6. Frais et abonnements</h2>
<p>Si vous souscrivez une offre payante, les frais, périodes de facturation, conditions de renouvellement, limites d’utilisation et taxes sont régis par la commande, la proposition ou les conditions de paiement applicables. Sauf indication contraire ou obligation légale, les frais payés ne sont pas remboursables.</p>
<h2>7. Services tiers</h2>
<p>Le service peut se connecter à des produits tiers. Leurs conditions et pratiques de confidentialité s’appliquent à leurs services, et nous ne sommes pas responsables des systèmes tiers hors de notre contrôle.</p>
<h2>8. Propriété intellectuelle</h2>
<p>Beem View 360 et ses concédants conservent tous les droits sur le service, les logiciels, les conceptions, les marques et la documentation. Aucun droit n’est accordé, à l’exception du droit limité d’utiliser le service conformément aux présentes conditions.</p>
<h2>9. Suspension et résiliation</h2>
<p>Nous pouvons suspendre ou limiter l’accès lorsque cela est raisonnablement nécessaire pour traiter un risque de sécurité, un usage illégal, un défaut de paiement, une violation substantielle ou un préjudice causé au service ou à autrui. Vous pouvez cesser d’utiliser le service à tout moment, sous réserve des engagements liés à votre abonnement ou commande. Après résiliation, l’accès au contenu peut prendre fin conformément à la période de conservation applicable.</p>
<h2>10. Exclusions de garantie</h2>
<p>Dans les limites autorisées par la loi, le service est fourni « en l’état » et « selon disponibilité ». Les analyses, rapports et suggestions automatisées sont des outils d’aide à la décision qui doivent être examinés par des personnes qualifiées ; ils ne constituent pas des conseils juridiques, financiers, médicaux ou professionnels.</p>
<h2>11. Limitation de responsabilité</h2>
<p>Dans les limites autorisées par la loi, aucune partie ne sera responsable des dommages indirects, accessoires, spéciaux, consécutifs ou punitifs, ni de la perte de bénéfices, de revenus, de clientèle ou de données. Toute limite ou tout recours supplémentaire prévu dans une commande ou un accord écrit s’applique.</p>
<h2>12. Modifications et contact</h2>
<p>Nous pouvons mettre à jour ces conditions pour refléter les évolutions du service ou des exigences applicables. Les modifications importantes seront communiquées de manière appropriée. Pour toute question, utilisez le formulaire de contact de ce site.</p>
HTML;
    return [
        'privacy'=>[
            'title'=>$t('Privacy Policy','سياسة الخصوصية','Politique de confidentialité'),
            'intro'=>$t('How Beem View 360 collects, uses, shares, and protects information.','كيف يجمع بيم ڤيو 360 المعلومات ويستخدمها ويشاركها ويحميها.','Comment Beem View 360 collecte, utilise, partage et protège les informations.'),
            'updated'=>$t('Last updated: August 2026','آخر تحديث: أغسطس 2026','Dernière mise à jour : août 2026'),
            'content'=>$t($privacy_en,$privacy_ar,$privacy_fr),
        ],
        'terms'=>[
            'title'=>$t('Terms & Conditions','الشروط والأحكام','Conditions générales'),
            'intro'=>$t('The rules that apply when accessing or using Beem View 360.','القواعد التي تسري عند الوصول إلى بيم ڤيو 360 أو استخدامه.','Les règles applicables à l’accès et à l’utilisation de Beem View 360.'),
            'updated'=>$t('Last updated: August 2026','آخر تحديث: أغسطس 2026','Dernière mise à jour : août 2026'),
            'content'=>$t($terms_en,$terms_ar,$terms_fr),
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
        'legal' => beem360_default_legal_content(),
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
            'problem_text' => ['en'=>"Tasks move in one place. Files live in another. Budgets sit in spreadsheets. Reports are rebuilt manually.\n\nWhen information is fragmented, teams spend more time piecing together status and less time moving priorities forward.",'ar'=>"المهام في مكان، والملفات في مكان آخر، والميزانيات داخل جداول منفصلة، والتقارير تحتاج إلى إعداد يدوي في كل مرة.\n\nومع تشتت المعلومات، يضيع وقت أكبر في جمع التحديثات وفهم الوضع الحالي بدلًا من دفع الأولويات إلى الأمام.",'fr'=>"Les tâches sont réparties entre différents outils, les fichiers stockés ailleurs, les budgets suivis dans des feuilles de calcul distinctes et les rapports préparés manuellement à chaque fois.\n\nLorsque l’information est fragmentée, les équipes consacrent davantage de temps à rassembler les mises à jour et à comprendre la situation qu’à faire avancer les priorités."],
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
    $defaults=beem360_defaults();$saved=(array)get_option('beem360_options',[]);$options=array_replace_recursive($defaults,$saved);
    if(isset($saved['section_order'])&&is_array($saved['section_order']))$options['section_order']=$saved['section_order'];
    if(isset($saved['items'])&&is_array($saved['items']))foreach($saved['items'] as $group=>$items)$options['items'][$group]=is_array($items)?array_values($items):[];
    if(isset($options['items']['footer_links'])&&is_array($options['items']['footer_links'])){
      foreach($options['items']['footer_links'] as &$footer_item){
        if(!is_array($footer_item))continue;
        $en=trim((string)($footer_item['label']['en']??''));$url=(string)($footer_item['url']??'#');
        if($en==='Terms'){$footer_item['label']=$defaults['items']['footer_links'][0]['label'];if($url==='#')$footer_item['url']='@terms';}
        if($en==='Privacy'){$footer_item['label']=$defaults['items']['footer_links'][1]['label'];if($url==='#')$footer_item['url']='@privacy';}
      }
      unset($footer_item);
      $options['items']['footer_links']=array_values(array_filter($options['items']['footer_links'],static function($item): bool {
        if(!is_array($item))return false;
        $labels=(array)($item['label']??[]);
        $security_labels=['security','الأمان','sécurité'];
        foreach($labels as $label)if(in_array(strtolower(trim((string)$label)),$security_labels,true))return false;
        return true;
      }));
    }
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

function beem360_format_content(string $value): string {
    $value=trim($value);
    if($value==='')return '';
    return wp_kses_post(wpautop(wp_kses_post($value)));
}

function beem360_content(string $key): string {
    return beem360_format_content(beem360_t($key));
}

function beem360_text_breaks(string $value): string {
    return nl2br(esc_html(trim($value)));
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

function beem360_localized_for_language(mixed $value, string $lang): mixed {
    if (!is_array($value)) { return $value; }
    if (isset($value['en']) || isset($value['ar']) || isset($value['fr'])) {
        return $value[$lang] ?? $value['en'] ?? reset($value);
    }
    return array_map(static fn(mixed $item): mixed => beem360_localized_for_language($item, $lang), $value);
}

function beem360_legal_document(string $type, string $lang = ''): array {
    if(!in_array($type,['privacy','terms'],true))$type='privacy';
    $document=beem360_options()['legal'][$type]??[];
    $lang=in_array($lang,['en','ar','fr'],true)?$lang:beem360_lang();
    return is_array($document)?beem360_localized_for_language($document,$lang):[];
}

function beem360_legal_url(string $type, string $lang = ''): string {
    $slug=$type==='terms'?'terms-and-conditions':'privacy-policy';
    $home=beem360_home_url();
    if($lang!==''&&function_exists('pll_home_url')){
        $localized_home=pll_home_url($lang);
        if(is_string($localized_home)&&$localized_home!=='')$home=trailingslashit($localized_home);
    }
    if((string)get_option('permalink_structure')==='')return add_query_arg('beem_legal',$type,$home);
    return trailingslashit($home).$slug.'/';
}

function beem360_legal_content_page_id(string $type, string $lang = ''): int {
    if(!in_array($type,['privacy','terms'],true))return 0;
    $lang=$lang!==''?$lang:(function_exists('pll_current_language')?(string)pll_current_language('slug'):beem360_lang());
    static $cache=[];
    $cache_key=$type.'|'.$lang;
    if(isset($cache[$cache_key]))return $cache[$cache_key];

    $direct_tags=$type==='privacy'?['beem_privacy_policy']:['beem_terms_conditions','beem_terms_and_conditions'];
    $pages=get_posts(['post_type'=>'page','post_status'=>'publish','posts_per_page'=>-1,'orderby'=>'menu_order ID','order'=>'ASC','suppress_filters'=>true]);
    $fallback_id=0;
    foreach($pages as $page){
        $matches=false;
        foreach($direct_tags as $tag)if(has_shortcode((string)$page->post_content,$tag)){$matches=true;break;}
        if(!$matches&&has_shortcode((string)$page->post_content,'beem_legal')){
            preg_match_all('/\[beem_legal\b([^\]]*)\]/i',(string)$page->post_content,$shortcodes);
            foreach($shortcodes[1]??[] as $attributes){
                $parsed=shortcode_parse_atts((string)$attributes);
                if(is_array($parsed)&&sanitize_key((string)($parsed['type']??'privacy'))===$type){$matches=true;break;}
            }
        }
        if(!$matches)continue;
        $page_id=(int)$page->ID;
        $page_lang=function_exists('pll_get_post_language')?(string)pll_get_post_language($page_id,'slug'):'';
        if($page_lang===$lang)return $cache[$cache_key]=$page_id;
        if(!$fallback_id)$fallback_id=$page_id;
    }

    if($fallback_id&&function_exists('pll_get_post')){
        $translated_id=absint(pll_get_post($fallback_id,$lang));
        if($translated_id)return $cache[$cache_key]=$translated_id;
    }
    return $cache[$cache_key]=0;
}

function beem360_footer_link_url(array $item): string {
    $page_id=absint($item['page']??0);
    $lang=function_exists('pll_current_language')?(string)pll_current_language('slug'):beem360_lang();
    if($page_id){
        if(function_exists('pll_get_post')){
            $translated_id=absint(pll_get_post($page_id,$lang));
            if($translated_id)$page_id=$translated_id;
            elseif(function_exists('pll_get_post_language')&&pll_get_post_language($page_id,'slug'))$page_id=0;
        }
        $page_url=$page_id?(string)get_permalink($page_id):'';
        if($page_url!=='')return $page_url;
    }
    $url=(string)($item['url']??'#');
    if(in_array($url,['@privacy','@terms'],true)){
        $type=$url==='@terms'?'terms':'privacy';
        $content_page_id=beem360_legal_content_page_id($type,$lang);
        if($content_page_id){$content_page_url=(string)get_permalink($content_page_id);if($content_page_url!=='')return $content_page_url;}
        return beem360_legal_url($type,$lang);
    }
    return beem360_link_url($url);
}

function beem360_legal_rewrite_rules(): void {
    add_rewrite_rule('^(en|ar|fr)/privacy-policy/?$','index.php?lang=$matches[1]&beem_legal=privacy','top');
    add_rewrite_rule('^(en|ar|fr)/terms-and-conditions/?$','index.php?lang=$matches[1]&beem_legal=terms','top');
    add_rewrite_rule('^privacy-policy/?$','index.php?beem_legal=privacy','top');
    add_rewrite_rule('^terms-and-conditions/?$','index.php?beem_legal=terms','top');
}
add_action('init','beem360_legal_rewrite_rules');

function beem360_legal_query_vars(array $vars): array {
    $vars[]='beem_legal';
    return $vars;
}
add_filter('query_vars','beem360_legal_query_vars');

function beem360_legal_template(string $template): string {
    $type=(string)get_query_var('beem_legal');
    if(!in_array($type,['privacy','terms'],true))return $template;
    global $wp_query;
    if($wp_query){$wp_query->is_404=false;$wp_query->is_page=true;}
    status_header(200);
    $legal_template=BEEM360_DIR.'/legal-page.php';
    return file_exists($legal_template)?$legal_template:$template;
}
add_filter('template_include','beem360_legal_template');

function beem360_legal_document_title(array $parts): array {
    $type=(string)get_query_var('beem_legal');
    if(!in_array($type,['privacy','terms'],true))return $parts;
    $document=beem360_legal_document($type);
    $parts['title']=(string)($document['title']??'Beem View 360');
    return $parts;
}
add_filter('document_title_parts','beem360_legal_document_title');

function beem360_flush_legal_rewrite_rules(): void {
    beem360_legal_rewrite_rules();
    flush_rewrite_rules(false);
}
add_action('after_switch_theme','beem360_flush_legal_rewrite_rules');

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
    $queried_id=(int)get_queried_object_id();
    $args=['raw'=>1,'hide_if_empty'=>0,'hide_if_no_translation'=>0];
    if(is_singular()&&$queried_id>0)$args['post_id']=$queried_id;
    $languages=pll_the_languages($args);
    if(!is_array($languages))$languages=[];

    $current=function_exists('pll_current_language')?(string)pll_current_language('slug'):beem360_lang();
    $legal_type=(string)get_query_var('beem_legal');

    if(function_exists('pll_languages_list')){
        $slugs=pll_languages_list(['hide_empty'=>0,'fields'=>'slug']);
        $names=pll_languages_list(['hide_empty'=>0,'fields'=>'name']);
        $names=is_array($names)?array_values($names):[];
        if(is_array($slugs))foreach(array_values($slugs) as $index=>$slug){
            $slug=(string)$slug;
            if($slug===''||array_filter($languages,static fn($language): bool=>(string)($language['slug']??'')===$slug))continue;
            $languages[]=['slug'=>$slug,'name'=>(string)($names[$index]??strtoupper($slug)),'url'=>'','current_lang'=>$slug===$current,'no_translation'=>true];
        }
    }

    foreach($languages as &$language){
        $slug=(string)($language['slug']??'');
        if($slug==='')continue;
        $language['current_lang']=$slug===$current;
        if(in_array($legal_type,['privacy','terms'],true)){
            $language['url']=beem360_legal_url($legal_type,$slug);
            $language['no_translation']=false;
            continue;
        }
        if(empty($language['url'])||!empty($language['no_translation'])){
            $home=function_exists('pll_home_url')?pll_home_url($slug):'';
            $language['url']=is_string($home)?$home:'';
            $language['no_translation']=$language['url']==='';
        }
    }
    unset($language);

    $languages=array_filter($languages,static fn($language): bool=>!empty($language['url'])&&empty($language['no_translation']));
    $alternatives = array_filter($languages, static fn($language) => empty($language['current_lang']));
    if (!$alternatives) { return ''; }
    $out = '<div class="dropdown beem-languages"><button class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-globe2"></i> ' . esc_html(strtoupper(beem360_lang())) . '</button><ul class="dropdown-menu dropdown-menu-end">';
    foreach ($languages as $language) {
        $out .= '<li><a class="dropdown-item' . (!empty($language['current_lang']) ? ' active' : '') . '" href="' . esc_url($language['url']) . '" hreflang="' . esc_attr($language['slug']) . '">' . esc_html($language['name']) . '</a></li>';
    }
    return $out . '</ul></div>';
}
