<?php

if (! defined('ABSPATH')) {
    exit;
}

define('BEEM360_THEME_VERSION', '1.0.0');

/**
 * Arabic + GCC + regional country list used by the contact popup.
 */
function beem360_arabic_countries() {
    return [
        'ae', 'bh', 'dz', 'eg', 'iq', 'jo', 'kw', 'lb', 'ly', 'ma', 'om',
        'ps', 'qa', 'sa', 'sd', 'sy', 'tn', 'ye', 'fr', 'mr', 'so', 'dz',
        'jo', 'ae',
    ];
}

/**
 * Shared section meta: labels/anchors.
 */
function beem360_section_list() {
    return [
        'hero'     => ['label' => 'hero', 'anchor' => 'beem-hero'],
        'platform' => ['label' => 'platform', 'anchor' => 'beem-platform'],
        'features' => ['label' => 'features', 'anchor' => 'beem-features'],
        'ai'       => ['label' => 'ai', 'anchor' => 'beem-ai'],
        'workflow' => ['label' => 'workflow', 'anchor' => 'beem-workflow'],
        'roles'    => ['label' => 'roles', 'anchor' => 'beem-roles'],
        'cta'      => ['label' => 'cta', 'anchor' => 'beem-cta'],
        'footer'   => ['label' => 'footer', 'anchor' => 'beem-footer'],
    ];
}

function beem360_language() {
    if (function_exists('pll_current_language')) {
        $pll = pll_current_language('slug');
        if (! empty($pll)) {
            return substr(sanitize_key($pll), 0, 2);
        }
    }
    $locale = get_locale();
    return substr(sanitize_key($locale), 0, 2);
}

function beem360_is_rtl() {
    return is_rtl() || beem360_language() === 'ar';
}

function beem360_is_lang_map(array $value): bool {
    return array_key_exists('en', $value) || array_key_exists('ar', $value) || array_key_exists('fr', $value);
}

function beem360_localize_value(mixed $value, string $lang) {
    if (is_array($value)) {
        if (beem360_is_lang_map($value)) {
            return $value[$lang] ?? $value['en'] ?? reset($value);
        }
        $out = [];
        foreach ($value as $k => $v) {
            $out[$k] = beem360_localize_value($v, $lang);
        }
        return $out;
    }
    return $value;
}

function beem360_default_data() {
    return [
        'enabled_sections' => [
            'hero'     => 1,
            'platform' => 1,
            'features' => 1,
            'ai'       => 1,
            'workflow' => 1,
            'roles'    => 1,
            'cta'      => 1,
            'footer'   => 1,
        ],
        'section_order' => ['hero', 'platform', 'features', 'ai', 'workflow', 'roles', 'cta'],
        'notification_emails' => get_option('admin_email', ''),
        'reply_from_email' => get_option('admin_email', ''),
        'reply_from_name' => 'Beem 360 Team',
        'thank_you_subject' => [
            'en' => 'Thank you for reaching Beem 360',
            'ar' => 'شكرًا لتواصلك مع Beem 360',
            'fr' => 'Merci d’avoir contacté Beem 360',
        ],
        'contact_default_country' => 'sa',
        'logo_url' => 'https://beemview.com/wp-content/uploads/2026/06/Final-logo-V-1-1-scaled.png',
        'media' => [
            'hero_image' => 'https://picsum.photos/1200/850?random=11',
            'ai_image' => 'https://picsum.photos/1100/760?random=12',
        ],
        'copy' => [
            'brand_name' => [
                'en' => 'Beem View',
                'ar' => 'Beem View',
                'fr' => 'Beem View',
            ],
            'menu_label' => [
                'en' => 'Menu',
                'ar' => 'القائمة',
                'fr' => 'Menu',
            ],
            'header_login' => [
                'en' => 'Log in',
                'ar' => 'تسجيل الدخول',
                'fr' => 'Connexion',
            ],
            'header_start' => [
                'en' => 'Start free',
                'ar' => 'ابدأ مجانًا',
                'fr' => 'Essai gratuit',
            ],
            'header_contact' => [
                'en' => 'Contact us',
                'ar' => 'تواصل معنا',
                'fr' => 'Contactez-nous',
            ],
            'hero_request_btn' => [
                'en' => 'Request a demo',
                'ar' => 'طلب عرض توضيحي',
                'fr' => 'Demander une démo',
            ],
            'hero_kicker' => [
                'en' => 'AI Enterprise Command Center',
                'ar' => 'مركز قيادة مؤسسي مدعوم بالذكاء الاصطناعي',
                'fr' => 'Centre de commandement IA d’entreprise',
            ],
            'hero_title_a' => [
                'en' => 'One beam of light across',
                'ar' => 'شعاع واحد من الرؤية',
                'fr' => 'Un seul faisceau de lumière',
            ],
            'hero_title_b' => [
                'en' => 'your entire enterprise.',
                'ar' => 'عبر مؤسستك بالكامل.',
                'fr' => 'sur toute votre entreprise.',
            ],
            'hero_text' => [
                'en' => 'Beem View unifies teams, tasks, subsidiaries, and decisions in one intelligent workspace for communication, project execution, governance, finance visibility, smart KPIs, and strategic planning.',
                'ar' => 'يوحّد Beem View الفرق والمهام والشركات التابعة والقرارات في مساحة عمل ذكية واحدة تشمل التواصل، تنفيذ المشاريع، الحوكمة، الرؤية المالية، مؤشرات الأداء الذكية، والتخطيط الاستراتيجي.',
                'fr' => 'Beem View unifie les équipes, les tâches, les filiales et les décisions dans un espace de travail intelligent pour la communication, l’exécution de projets, la gouvernance, la visibilité financière, les KPI intelligents et la planification stratégique.',
            ],
            'hero_primary' => [
                'en' => 'Get Beem free',
                'ar' => 'ابدأ مجانًا',
                'fr' => 'Essayer Beem gratuitement',
            ],
            'hero_secondary' => [
                'en' => 'Log in',
                'ar' => 'تسجيل الدخول',
                'fr' => 'Connexion',
            ],
            'hero_trusted_line' => [
                'en' => 'Built for holding groups, subsidiaries, departments, and fast-growing teams.',
                'ar' => 'مصممة للشركات القابضة والشركات التابعة والإدارات والفرق سريعة النمو.',
                'fr' => 'Conçu pour les holdings, filiales, départements et équipes à forte croissance.',
            ],
            'hero_login_url' => [
                'en' => 'https://beemview.com/login',
                'ar' => 'https://beemview.com/login',
                'fr' => 'https://beemview.com/login',
            ],
            'hero_register_url' => [
                'en' => 'https://beemview.com/register',
                'ar' => 'https://beemview.com/register',
                'fr' => 'https://beemview.com/register',
            ],
            'platform_kicker' => [
                'en' => 'One connected operating system',
                'ar' => 'نظام تشغيل مؤسسي واحد',
                'fr' => 'Un système d’exploitation connecté',
            ],
            'platform_title' => [
                'en' => 'Everything leaders need to see, teams need to execute, and companies need to scale.',
                'ar' => 'كل ما يحتاجه القادة للرؤية، الفرق للتنفيذ، والشركات للنمو.',
                'fr' => 'Tout ce dont les dirigeants ont besoin de voir, les équipes d’exécuter et les entreprises de croître.',
            ],
            'platform_text' => [
                'en' => 'Replace scattered tools with one enterprise workspace designed for daily work, executive oversight, reporting, and strategic alignment.',
                'ar' => 'استبدل الأدوات المتفرقة بمساحة عمل مؤسسية واحدة مصممة للعمل اليومي والمتابعة التنفيذية والتقارير ومحاذاة الاستراتيجية.',
                'fr' => 'Remplacez les outils dispersés par un espace de travail unique conçu pour le travail quotidien, le suivi exécutif, le reporting et l’alignement stratégique.',
            ],
            'features_title' => [
                'en' => 'Key features of Beem View',
                'ar' => 'أهم مميزات Beem View',
                'fr' => 'Fonctionnalités clés de Beem View',
            ],
            'features_text' => [
                'en' => 'A modern interface for managing governance, finance, projects, tasks, workflows, departments, and performance in real time.',
                'ar' => 'واجهة حديثة لإدارة الحوكمة، المالية، المشاريع، المهام، سير العمل، الإدارات، والأداء لحظيًا.',
                'fr' => 'Une interface moderne pour gérer la gouvernance, les finances, les projets, les tâches, les flux de travail, les départements et la performance en temps réel.',
            ],
            'ai_title' => [
                'en' => 'From work data to decisions — faster.',
                'ar' => 'من بيانات العمل إلى القرارات — بسرعة أكبر.',
                'fr' => 'Des données de travail aux décisions, plus vite.',
            ],
            'ai_text' => [
                'en' => 'Beem View turns team activity into clear dashboards, smart reports, alerts, summaries, and management insights so leaders know what changed and what needs attention.',
                'ar' => 'يحوّل Beem View نشاط الفرق إلى لوحات واضحة وتقارير ذكية وتنبيهات وملخصات ورؤى إدارية ليفهم القادة ما الذي تغيّر وما يحتاج للمتابعة.',
                'fr' => 'Beem View transforme l’activité des équipes en tableaux de bord, rapports intelligents, alertes, résumés et insights de gestion pour un pilotage plus clair.',
            ],
            'workflow_title' => [
                'en' => 'Designed around the way enterprise teams actually work.',
                'ar' => 'مصممة حول طريقة عمل الفرق المؤسسية فعليًا.',
                'fr' => 'Conçue autour de la manière dont les équipes d’entreprise travaillent réellement.',
            ],
            'workflow_text' => [
                'en' => 'Plan work, assign ownership, automate follow-up, track performance, and transform execution into management visibility.',
                'ar' => 'خطط العمل، عيّن المسؤوليات، أتمت المتابعة، راقب الأداء، وحوّل التنفيذ إلى رؤية إدارية موثوقة.',
                'fr' => 'Planifiez le travail, attribuez les responsabilités, automatisez le suivi, surveillez la performance et transformez l’exécution en visibilité managériale.',
            ],
            'roles_title' => [
                'en' => 'Built for every layer of the organization.',
                'ar' => 'مصمم لكل مستوى داخل المؤسسة.',
                'fr' => 'Conçu pour chaque niveau de l’organisation.',
            ],
            'roles_text' => [
                'en' => 'From holding executives to subsidiary teams, each role gets the right view and the right tools.',
                'ar' => 'من الإدارة العليا إلى فرق الشركات التابعة، كل دور يحصل على الأدوات والرؤية المناسبة.',
                'fr' => 'Des dirigeants de holding aux équipes des filiales, chaque rôle dispose de la vue et des outils qui lui conviennent.',
            ],
            'cta_title' => [
                'en' => 'Ready to connect teams, align strategies, and scale smarter?',
                'ar' => 'جاهز لربط الفرق ومحاذاة الاستراتيجية والنمو بذكاء؟',
                'fr' => 'Prêt à connecter vos équipes, aligner vos stratégies et grandir plus intelligemment ?',
            ],
            'cta_text' => [
                'en' => 'Discover how Beem View can transform enterprise operations with one modern workspace.',
                'ar' => 'اكتشف كيف يمكن لـ Beem View تحويل العمليات المؤسسية عبر مساحة عمل واحدة.',
                'fr' => 'Découvrez comment Beem View peut transformer les opérations d’entreprise avec un espace de travail moderne.',
            ],
            'cta_primary' => [
                'en' => 'Start now',
                'ar' => 'ابدأ الآن',
                'fr' => 'Commencer',
            ],
            'cta_secondary' => [
                'en' => 'Talk to sales',
                'ar' => 'تواصل مع المبيعات',
                'fr' => 'Contacter les ventes',
            ],
            'cta_primary_url' => [
                'en' => 'https://beemview.com/register',
                'ar' => 'https://beemview.com/register',
                'fr' => 'https://beemview.com/register',
            ],
            'cta_secondary_url' => [
                'en' => '#beem-footer',
                'ar' => '#beem-footer',
                'fr' => '#beem-footer',
            ],
            'nav_platform' => [
                'en' => 'Platform',
                'ar' => 'المنصة',
                'fr' => 'Plateforme',
            ],
            'nav_features' => [
                'en' => 'Features',
                'ar' => 'المميزات',
                'fr' => 'Fonctionnalités',
            ],
            'nav_ai' => [
                'en' => 'AI Insights',
                'ar' => 'الرؤى الذكية',
                'fr' => 'Insights IA',
            ],
            'nav_workflow' => [
                'en' => 'Workflow',
                'ar' => 'سير العمل',
                'fr' => 'Flux de travail',
            ],
            'nav_roles' => [
                'en' => 'Roles',
                'ar' => 'الأدوار',
                'fr' => 'Rôles',
            ],
            'nav_cta' => [
                'en' => 'Get started',
                'ar' => 'ابدأ الآن',
                'fr' => 'Commencer',
            ],
            'footer_tagline' => [
                'en' => 'A modern enterprise workspace for visibility, execution, governance, and smarter decisions.',
                'ar' => 'مساحة عمل مؤسسية حديثة للرؤية، التنفيذ، الحوكمة، واتخاذ قرارات أدق.',
                'fr' => 'Un espace de travail moderne pour la visibilité, l’exécution, la gouvernance et des décisions plus intelligentes.',
            ],
            'footer_login' => [
                'en' => 'Log in',
                'ar' => 'تسجيل الدخول',
                'fr' => 'Connexion',
            ],
            'footer_rights' => [
                'en' => 'All rights reserved.',
                'ar' => 'جميع الحقوق محفوظة.',
                'fr' => 'Tous droits réservés.',
            ],
            'request_title' => [
                'en' => 'Request a demo',
                'ar' => 'طلب عرض توضيحي',
                'fr' => 'Demander une démo',
            ],
            'contact_title' => [
                'en' => 'Contact us',
                'ar' => 'تواصل معنا',
                'fr' => 'Contactez-nous',
            ],
            'request_submit' => [
                'en' => 'Submit request',
                'ar' => 'إرسال الطلب',
                'fr' => 'Envoyer la demande',
            ],
            'contact_submit' => [
                'en' => 'Send message',
                'ar' => 'إرسال الرسالة',
                'fr' => 'Envoyer',
            ],
            'contact_success_title' => [
                'en' => 'Thanks for reaching out',
                'ar' => 'شكرًا لتواصلكم',
                'fr' => 'Merci pour votre message',
            ],
            'contact_success_text' => [
                'en' => 'Your request has been received. We will reply shortly.',
                'ar' => 'تم استلام طلبك وسنقوم بالرد عليك قريبًا.',
                'fr' => 'Votre demande a été reçue, nous reviendrons vers vous rapidement.',
            ],
        ],
        'items' => [
            'section_metrics' => [
                [
                    'value' => '360°',
                    'label' => [
                        'en' => 'Enterprise visibility',
                        'ar' => 'رؤية مؤسسية كاملة',
                        'fr' => 'Visibilité d’entreprise',
                    ],
                ],
                [
                    'value' => 'AI',
                    'label' => [
                        'en' => 'Smart insights',
                        'ar' => 'رؤى ذكية',
                        'fr' => 'Insights intelligents',
                    ],
                ],
                [
                    'value' => 'Multi',
                    'label' => [
                        'en' => 'Tenant ready',
                        'ar' => 'جاهزة لتعدد الشركات',
                        'fr' => 'Multi-entreprises',
                    ],
                ],
            ],
            'platform_cards' => [
                [
                    'number' => '01',
                    'title' => [
                        'en' => 'Unified visibility',
                        'ar' => 'رؤية موحدة',
                        'fr' => 'Visibilité unifiée',
                    ],
                    'text' => [
                        'en' => 'Centralized dashboards connect subsidiaries, departments, projects, and tasks in one place.',
                        'ar' => 'لوحات موحدة تربط الشركات التابعة والإدارات والمشاريع والمهام في مكان واحد.',
                        'fr' => 'Des tableaux de bord centralisés relient filiales, départements, projets et tâches en un seul endroit.',
                    ],
                ],
                [
                    'number' => '02',
                    'title' => [
                        'en' => 'Faster execution',
                        'ar' => 'تنفيذ أسرع',
                        'fr' => 'Exécution plus rapide',
                    ],
                    'text' => [
                        'en' => 'Clear ownership, priorities, deadlines, and updates reduce execution delays.',
                        'ar' => 'توزيع واضح للمسؤوليات والأولويات والمواعيد والتحديثات يقلّل تأخير التنفيذ.',
                        'fr' => 'Des responsabilités, priorités, échéances et mises à jour claires réduisent les retards d’exécution.',
                    ],
                ],
                [
                    'number' => '03',
                    'title' => [
                        'en' => 'Governance & decisions',
                        'ar' => 'حوكمة وقرارات',
                        'fr' => 'Gouvernance & décisions',
                    ],
                    'text' => [
                        'en' => 'Track compliance, KPIs, reports, and alerts that support management decisions.',
                        'ar' => 'تتبع الالتزام ومؤشرات الأداء والتقارير والتنبيهات لدعم قرارات الإدارة.',
                        'fr' => 'Suivez la conformité, les KPI, les rapports et les alertes pour appuyer les décisions de la direction.',
                    ],
                ],
            ],
            'feature_groups' => [
                [
                    'icon' => '◈',
                    'title' => [
                        'en' => 'Governance & Oversight',
                        'ar' => 'الحوكمة والرقابة',
                        'fr' => 'Gouvernance & supervision',
                    ],
                    'text' => [
                        'en' => 'Better control over subsidiary and team performance with KPI and compliance tracking.',
                        'ar' => 'تحكم أفضل بأداء الشركات والفرق مع متابعة مؤشرات الأداء والامتثال.',
                        'fr' => 'Un meilleur contrôle de la performance des filiales et des équipes grâce au suivi des KPI et de la conformité.',
                    ],
                    'cards' => [
                        [
                            'title' => [
                                'en' => 'Centralized Dashboards',
                                'ar' => 'لوحات مركزية',
                                'fr' => 'Tableaux de bord centralisés',
                            ],
                            'text' => [
                                'en' => 'Gain a unified view of all subsidiaries in one place.',
                                'ar' => 'رؤية موحّدة لكل الشركات في مكان واحد.',
                                'fr' => 'Obtenez une vue unifiée de toutes les filiales en un seul endroit.',
                            ],
                        ],
                        [
                            'title' => [
                                'en' => 'Subsidiary Management',
                                'ar' => 'إدارة الشركات التابعة',
                                'fr' => 'Gestion des filiales',
                            ],
                            'text' => [
                                'en' => 'Monitor financial and operational performance for each entity.',
                                'ar' => 'متابعة الأداء المالي والتشغيلي لكل كيان بشكل منفصل.',
                                'fr' => 'Surveillez la performance financière et opérationnelle de chaque entité.',
                            ],
                        ],
                    ],
                ],
                [
                    'icon' => '$',
                    'title' => [
                        'en' => 'Financial Management',
                        'ar' => 'الإدارة المالية',
                        'fr' => 'Gestion financière',
                    ],
                    'text' => [
                        'en' => 'Turn financial data into clear budget, expense, and reporting visibility.',
                        'ar' => 'حوّل البيانات المالية إلى متابعة واضحة للميزانية والمصروفات والتقارير.',
                        'fr' => 'Transformez les données financières en visibilité claire sur budget, dépenses et reporting.',
                    ],
                    'cards' => [
                        [
                            'title' => [
                                'en' => 'Cash Flow Monitoring',
                                'ar' => 'متابعة التدفق النقدي',
                                'fr' => 'Suivi de trésorerie',
                            ],
                            'text' => [
                                'en' => 'Track revenues and expenses instantly.',
                                'ar' => 'تتبع الإيرادات والمصروفات مباشرة.',
                                'fr' => 'Suivez les revenus et les dépenses instantanément.',
                            ],
                        ],
                        [
                            'title' => [
                                'en' => 'Budget Management',
                                'ar' => 'إدارة الميزانيات',
                                'fr' => 'Gestion des budgets',
                            ],
                            'text' => [
                                'en' => 'Plan, allocate, and monitor budgets with confidence.',
                                'ar' => 'خطط وخصص وراقب الميزانيات بثقة.',
                                'fr' => 'Planifiez, allouez et suivez les budgets en toute confiance.',
                            ],
                        ],
                    ],
                ],
            ],
            'ai_lines' => [
                [
                    'name' => [
                        'en' => 'Project execution',
                        'ar' => 'تنفيذ المشاريع',
                        'fr' => 'Exécution de projets',
                    ],
                    'status' => 'ok',
                    'value' => [
                        'en' => 'On track',
                        'ar' => 'ضمن الجدول',
                        'fr' => 'À jour',
                    ],
                ],
                [
                    'name' => [
                        'en' => 'Budget variance',
                        'ar' => 'فروقات الميزانية',
                        'fr' => 'Écart budgétaire',
                    ],
                    'status' => 'ok',
                    'value' => [
                        'en' => '-2.8%',
                        'ar' => '-2.8%',
                        'fr' => '-2,8%',
                    ],
                ],
                [
                    'name' => [
                        'en' => 'Risk index',
                        'ar' => 'مؤشر المخاطر',
                        'fr' => 'Indice de risque',
                    ],
                    'status' => 'warn',
                    'value' => [
                        'en' => 'Medium',
                        'ar' => 'متوسط',
                        'fr' => 'Moyen',
                    ],
                ],
                [
                    'name' => [
                        'en' => 'AI Signal',
                        'ar' => 'إشارة الذكاء',
                        'fr' => 'Signal IA',
                    ],
                    'status' => 'ok',
                    'value' => [
                        'en' => 'Positive trend',
                        'ar' => 'اتجاه إيجابي',
                        'fr' => 'Tendance positive',
                    ],
                ],
            ],
            'workflow_steps' => [
                [
                    'title' => [
                        'en' => 'Plan',
                        'ar' => 'التخطيط',
                        'fr' => 'Planifier',
                    ],
                    'text' => [
                        'en' => 'Define goals, ownership, deadlines, and priorities.',
                        'ar' => 'تحديد الأهداف والمسؤوليات والمواعيد والأولويات.',
                        'fr' => 'Définissez objectifs, responsabilités, délais et priorités.',
                    ],
                ],
                [
                    'title' => [
                        'en' => 'Execute',
                        'ar' => 'التنفيذ',
                        'fr' => 'Exécuter',
                    ],
                    'text' => [
                        'en' => 'Run projects with contextual workflows and shared progress.',
                        'ar' => 'تنفيذ المشاريع عبر سيرات عمل سياقية وتقدم تعاوني.',
                        'fr' => 'Exécutez les projets avec des workflows contextuels et une progression partagée.',
                    ],
                ],
                [
                    'title' => [
                        'en' => 'Track',
                        'ar' => 'المتابعة',
                        'fr' => 'Suivre',
                    ],
                    'text' => [
                        'en' => 'Monitor milestones and alerts in real time.',
                        'ar' => 'مراقبة المعالم والتنبيهات لحظيًا.',
                        'fr' => 'Surveillez les étapes-clés et les alertes en temps réel.',
                    ],
                ],
                [
                    'title' => [
                        'en' => 'Review',
                        'ar' => 'المراجعة',
                        'fr' => 'Réviser',
                    ],
                    'text' => [
                        'en' => 'Generate smart summaries for each decision cycle.',
                        'ar' => 'إنشاء ملخصات ذكية لكل دورة قرار.',
                        'fr' => 'Générez des résumés intelligents à chaque cycle de décision.',
                    ],
                ],
                [
                    'title' => [
                        'en' => 'Scale',
                        'ar' => 'التوسع',
                        'fr' => 'Mettre à l’échelle',
                    ],
                    'text' => [
                        'en' => 'Replicate and extend successful patterns quickly.',
                        'ar' => 'تكرار وتوسيع الأنماط الناجحة بسرعة.',
                        'fr' => 'Répliquer et élargir rapidement les modèles réussis.',
                    ],
                ],
            ],
            'role_cards' => [
                [
                    'icon' => 'bi-people-fill',
                    'name' => [
                        'en' => 'Holding leadership',
                        'ar' => 'إدارة الشركة القابضة',
                        'fr' => 'Direction du groupe',
                    ],
                    'text' => [
                        'en' => 'Command visibility across all subsidiaries with aligned governance and decisions.',
                        'ar' => 'رؤية موحدة عبر جميع الشركات التابعة مع حوكمة موحدة وقرارات متناسقة.',
                        'fr' => 'Vision centralisée des filiales avec gouvernance alignée et décisions cohérentes.',
                    ],
                ],
                [
                    'icon' => 'bi-diagram-3-fill',
                    'name' => [
                        'en' => 'Subsidiary teams',
                        'ar' => 'فرق الشركات التابعة',
                        'fr' => 'Équipes de filiale',
                    ],
                    'text' => [
                        'en' => 'Clear execution tools for each business unit to move faster with confidence.',
                        'ar' => 'أدوات تنفيذ واضحة لكل وحدة لزيادة سرعة الأداء.',
                        'fr' => 'Des outils d’exécution clairs pour chaque unité afin d’avancer plus vite.',
                    ],
                ],
                [
                    'icon' => 'bi-currency-exchange',
                    'name' => [
                        'en' => 'Finance & controllers',
                        'ar' => 'المالية والرقابة المالية',
                        'fr' => 'Finance & contrôle',
                    ],
                    'text' => [
                        'en' => 'Budget and report clarity with real-time validation and governance checkpoints.',
                        'ar' => 'وضوح مالي في التقارير مع رقابة فورية ونقاط تحقق للحوكمة.',
                        'fr' => 'Clarté budgétaire et reporting avec validation en temps réel et points de contrôle.',
                    ],
                ],
                [
                    'icon' => 'bi-speedometer2',
                    'name' => [
                        'en' => 'Operations managers',
                        'ar' => 'مديرو التشغيل',
                        'fr' => 'Responsables opérationnels',
                    ],
                    'text' => [
                        'en' => 'One source of truth for deadlines, blockers, and delivery quality.',
                        'ar' => 'مصدر موثوق للمواعيد والعراقيل وجودة التسليم.',
                        'fr' => 'Une seule source de vérité pour les délais, blocages et qualité de livraison.',
                    ],
                ],
            ],
            'footer_links' => [
                ['label' => ['en' => 'Privacy', 'ar' => 'الخصوصية', 'fr' => 'Confidentialité'], 'url' => '#'],
                ['label' => ['en' => 'Terms', 'ar' => 'الشروط', 'fr' => 'Conditions'], 'url' => '#'],
                ['label' => ['en' => 'Security', 'ar' => 'الأمان', 'fr' => 'Sécurité'], 'url' => '#'],
            ],
        ],
    ];
}

function beem360_merge_array(array $defaults, array $incoming): array {
    foreach ($incoming as $key => $value) {
        if (is_array($value) && isset($defaults[$key]) && is_array($defaults[$key])) {
            $defaults[$key] = beem360_merge_array($defaults[$key], $value);
        } else {
            $defaults[$key] = $value;
        }
    }
    return $defaults;
}

function beem360_get_data(): array {
    static $cache = null;
    if ($cache !== null) {
        return $cache;
    }
    $cache = beem360_merge_array(beem360_default_data(), (array) get_option('beem360_theme_data', []));
    return $cache;
}

function beem360_section_value(string $section, string $field, string $lang = '') {
    $lang = $lang ?: beem360_language();
    $data = beem360_get_data();
    if (! isset($data[$field])) {
        return '';
    }
    return beem360_localize_value($data[$field], $lang);
}

function beem360_is_section_enabled(string $section_id): bool {
    $data = beem360_get_data();
    return !empty($data['enabled_sections'][$section_id]);
}

function beem360_get_section_label(string $section_id, string $lang = ''): string {
    $lang = $lang ?: beem360_language();
    $data = beem360_get_data()['copy'];
    $map = [
        'hero' => 'nav_platform',
        'platform' => 'platform_kicker',
        'features' => 'features_title',
        'ai' => 'ai_title',
        'workflow' => 'workflow_title',
        'roles' => 'roles_title',
        'cta' => 'cta_title',
        'footer' => 'footer_tagline',
    ];
    $default = ucfirst($section_id);
    if (isset($map[$section_id])) {
        return beem360_localize_value($data[$map[$section_id]], $lang) ?? $default;
    }
    return $default;
}

function beem360_anchor_for(string $section_id): string {
    $list = beem360_section_list();
    return $list[$section_id]['anchor'] ?? 'beem-' . sanitize_key($section_id);
}

function beem360_register_theme() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style']);
}
add_action('after_setup_theme', 'beem360_register_theme');

function beem360_register_cpt() {
    register_post_type(
        'beem_contact',
        [
            'labels' => [
                'name' => 'Beem Contacts',
                'singular_name' => 'Beem Contact',
                'menu_name' => 'Beem Contacts',
                'all_items' => 'Contact submissions',
                'add_new' => 'Add',
                'add_new_item' => 'Add Contact',
                'edit_item' => 'Edit Contact',
            ],
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'supports' => ['title', 'editor'],
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 80,
            'menu_icon' => 'dashicons-email',
        ]
    );
}
add_action('init', 'beem360_register_cpt');

function beem360_enqueue_front() {
    wp_enqueue_style(
        'beem360-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );
    wp_enqueue_style(
        'beem360-bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        [],
        '1.11.3'
    );
    wp_enqueue_style(
        'beem360-google-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=Tajawal:wght@400;500;700;800&display=swap',
        [],
        null
    );
    wp_enqueue_style('beem360-style', get_template_directory_uri() . '/assets/css/beem-theme.css', ['beem360-bootstrap'], BEEM360_THEME_VERSION);
    wp_enqueue_script(
        'beem360-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        ['jquery'],
        '5.3.3',
        true
    );
    wp_enqueue_style(
        'intl-tel-input-css',
        'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.5.8/css/intlTelInput.min.css',
        [],
        '19.5.8'
    );
    wp_enqueue_script(
        'intl-tel-input',
        'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.5.8/js/intlTelInput.min.js',
        [],
        '19.5.8',
        true
    );
    wp_enqueue_script(
        'beem360-front',
        get_template_directory_uri() . '/assets/js/beem-theme.js',
        ['jquery', 'beem360-bootstrap', 'intl-tel-input'],
        BEEM360_THEME_VERSION,
        true
    );
    wp_localize_script(
        'beem360-front',
        'BeemTheme',
        [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('beem360-contact-send'),
            'defaultCountry' => beem360_get_data()['contact_default_country'] ?? 'sa',
            'allowedCountries' => beem360_arabic_countries(),
            'requestMessage' => esc_html__('Submitting...', 'beem360'),
        ]
    );
}
add_action('wp_enqueue_scripts', 'beem360_enqueue_front');

function beem360_admin_assets(string $hook) {
    if (strpos($hook, 'beem-theme') === false && strpos($hook, 'beem-contact-leads') === false) {
        return;
    }
    wp_enqueue_style(
        'beem360-admin',
        get_template_directory_uri() . '/assets/css/beem-admin.css',
        [],
        BEEM360_THEME_VERSION
    );
    wp_enqueue_script(
        'jquery-ui-sortable'
    );
    wp_enqueue_script(
        'beem360-admin',
        get_template_directory_uri() . '/assets/js/beem-admin.js',
        ['jquery', 'jquery-ui-sortable'],
        BEEM360_THEME_VERSION,
        true
    );
}
add_action('admin_enqueue_scripts', 'beem360_admin_assets');

function beem360_copy_field_groups(): array {
    return [
        'hero' => [
            'hero_kicker' => 'Hero Kicker',
            'hero_title_a' => 'Hero Title Line 1',
            'hero_title_b' => 'Hero Title Line 2',
            'hero_text' => 'Hero Text',
            'hero_primary' => 'Hero Primary Button',
            'hero_secondary' => 'Hero Secondary Button',
            'hero_trusted_line' => 'Hero trusted line',
            'hero_login_url' => 'Hero Login URL',
            'hero_register_url' => 'Hero Register URL',
            'header_login' => 'Header Login',
            'header_start' => 'Header Start Button',
            'hero_request_btn' => 'Hero/Request Button',
            'header_contact' => 'Header Contact Button',
        ],
        'features' => [
            'platform_kicker' => 'Platform Kicker',
            'platform_title' => 'Platform Title',
            'platform_text' => 'Platform Text',
            'features_title' => 'Features Title',
            'features_text' => 'Features Intro',
            'ai_title' => 'AI Section Title',
            'ai_text' => 'AI Intro',
            'workflow_title' => 'Workflow Title',
            'workflow_text' => 'Workflow Intro',
            'roles_title' => 'Roles Title',
            'roles_text' => 'Roles Intro',
            'cta_title' => 'CTA Title',
            'cta_text' => 'CTA Intro',
            'cta_primary' => 'CTA Primary Button',
            'cta_secondary' => 'CTA Secondary Button',
            'cta_primary_url' => 'CTA Primary URL',
            'cta_secondary_url' => 'CTA Secondary URL',
            'nav_platform' => 'Nav Platform',
            'nav_features' => 'Nav Features',
            'nav_ai' => 'Nav AI',
            'nav_workflow' => 'Nav Workflow',
            'nav_roles' => 'Nav Roles',
            'nav_cta' => 'Nav CTA',
            'footer_tagline' => 'Footer Tagline',
            'footer_login' => 'Footer Login',
            'footer_rights' => 'Footer Rights Text',
            'request_title' => 'Popup request title',
            'contact_title' => 'Popup contact title',
            'request_submit' => 'Popup request button',
            'contact_submit' => 'Popup contact button',
            'contact_success_title' => 'Popup success title',
            'contact_success_text' => 'Popup success text',
        ],
        'global' => [
            'brand_name' => 'Brand name',
            'menu_label' => 'Menu button text',
            'logo_url' => 'Logo URL',
            'notification_emails' => 'Admin recipient emails (comma-separated)',
            'thank_you_subject' => 'Thank-you email subject',
            'contact_default_country' => 'Default country for phone input',
        ],
    ];
}

function beem360_sanitize_json_payload($input, $fallback) {
    if (! is_string($input)) {
        return $fallback;
    }
    $value = trim(wp_unslash($input));
    if ($value === '') {
        return $fallback;
    }
    $decoded = json_decode($value, true);
    if (! is_array($decoded)) {
        return $fallback;
    }
    return $decoded;
}

function beem360_save_settings_page() {
    if (! current_user_can('manage_options')) {
        return;
    }

    if (! isset($_POST['beem360_save_theme'])) {
        return;
    }

    check_admin_referer('beem360-save-theme');

    $posted = isset($_POST['beem360']) && is_array($_POST['beem360']) ? wp_unslash($_POST['beem360']) : [];
    $data = beem360_default_data();

    $langs = ['en', 'ar', 'fr'];
    $groups = beem360_copy_field_groups();
    $copy = [];
    foreach ($groups as $group_fields) {
        foreach ($group_fields as $field => $label) {
            foreach ($langs as $lang) {
                if (in_array($field, ['notification_emails', 'contact_default_country'], true)) {
                    if ($field === 'notification_emails') {
                        $copy[$field] = sanitize_text_field($posted[$field] ?? $data['notification_emails']);
                    } else {
                        $copy[$field] = sanitize_text_field($posted[$field] ?? $data['contact_default_country']);
                    }
                    break 2;
                }
                $value = $posted['copy'][$field][$lang] ?? '';
                if ($field === 'brand_name' || $field === 'logo_url' || str_contains($field, 'url') || str_contains($field, 'login') || str_contains($field, 'register') || str_contains($field, 'success')) {
                    $copy[$field][$lang] = sanitize_text_field((string) $value);
                } else {
                    $copy[$field][$lang] = sanitize_textarea_field((string) $value);
                }
            }
        }
    }

    if (! empty($copy['notification_emails'])) {
        $data['notification_emails'] = $copy['notification_emails'];
        $data['reply_from_email'] = $copy['notification_emails'];
        unset($copy['notification_emails']);
    } else {
        $data['notification_emails'] = $data['notification_emails'];
        $data['reply_from_email'] = $data['reply_from_email'];
    }

    if (! empty($copy['contact_default_country'])) {
        $data['contact_default_country'] = sanitize_key($copy['contact_default_country']);
    }

    if (! empty($copy['thank_you_subject'])) {
        $data['thank_you_subject'] = $copy['thank_you_subject'];
    }

    unset($copy['notification_emails'], $copy['contact_default_country']);
    $data['copy'] = beem360_merge_array($data['copy'], $copy);

    $order = isset($posted['section_order']) ? sanitize_text_field((string) $posted['section_order']) : implode(',', array_keys($data['enabled_sections']));
    $order = array_values(array_filter(array_map('sanitize_key', preg_split('/\s*,\s*/', $order))));
    $valid_sections = array_keys($data['enabled_sections']);
    $order = array_values(array_intersect($order, $valid_sections));
    if (! empty($order)) {
        $data['section_order'] = $order;
    }

    foreach ($valid_sections as $section_id) {
        $data['enabled_sections'][$section_id] = ! empty($posted['enabled'][$section_id]) ? 1 : 0;
    }

    $data['media']['hero_image'] = esc_url_raw($posted['media_hero_image'] ?? $data['media']['hero_image']);
    $data['media']['ai_image'] = esc_url_raw($posted['media_ai_image'] ?? $data['media']['ai_image']);
    $data['logo_url'] = esc_url_raw($posted['logo_url'] ?? $data['logo_url']);

    $data['items']['platform_cards'] = beem360_sanitize_json_payload($posted['items_platform_cards'] ?? '', $data['items']['platform_cards']);
    $data['items']['feature_groups'] = beem360_sanitize_json_payload($posted['items_feature_groups'] ?? '', $data['items']['feature_groups']);
    $data['items']['ai_lines'] = beem360_sanitize_json_payload($posted['items_ai_lines'] ?? '', $data['items']['ai_lines']);
    $data['items']['workflow_steps'] = beem360_sanitize_json_payload($posted['items_workflow_steps'] ?? '', $data['items']['workflow_steps']);
    $data['items']['role_cards'] = beem360_sanitize_json_payload($posted['items_role_cards'] ?? '', $data['items']['role_cards']);
    $data['items']['section_metrics'] = beem360_sanitize_json_payload($posted['items_section_metrics'] ?? '', $data['items']['section_metrics']);
    $data['items']['footer_links'] = beem360_sanitize_json_payload($posted['items_footer_links'] ?? '', $data['items']['footer_links']);

    update_option('beem360_theme_data', $data);
    wp_safe_redirect(admin_url('admin.php?page=beem-theme&settings-updated=1'));
    exit;
}
add_action('admin_init', 'beem360_save_settings_page');

function beem360_settings_page() {
    if (! current_user_can('manage_options')) {
        return;
    }
    $data = beem360_get_data();
    $langs = ['en' => 'English', 'ar' => 'العربية', 'fr' => 'Français'];
    $section_keys = beem360_section_list();
    ?>
    <div class="wrap beem-admin-wrap">
        <h1><?php esc_html_e('Beem Theme Control', 'beem360'); ?></h1>
        <?php if (isset($_GET['settings-updated'])) : ?>
            <div class="notice notice-success is-dismissible">
                <p><?php esc_html_e('Settings saved.', 'beem360'); ?></p>
            </div>
        <?php endif; ?>
        <form method="post">
            <?php wp_nonce_field('beem360-save-theme'); ?>
            <div class="beem-admin-grid">
                <section class="beem-admin-card">
                    <h2><?php esc_html_e('Section order', 'beem360'); ?></h2>
                    <p><?php esc_html_e('Drag and drop in the preferred order, then save. Turn sections off to hide them from homepage rendering.', 'beem360'); ?></p>
                    <ul id="beem-section-order" class="beem-sortable-list list-group mb-3">
                        <?php foreach ($data['section_order'] as $slug) : if (! isset($section_keys[$slug])) { continue; } ?>
                            <li class="list-group-item d-flex align-items-center justify-content-between" data-section="<?php echo esc_attr($slug); ?>">
                                <span class="dashicons dashicons-move me-2"></span>
                                <span><?php echo esc_html($section_keys[$slug]['label']); ?></span>
                                <label class="form-check-label">
                                    <input class="form-check-input me-2" type="checkbox" name="beem360[enabled][<?php echo esc_attr($slug); ?>]" value="1" <?php checked(! empty($data['enabled_sections'][$slug])); ?>>
                                    <?php esc_html_e('Enable', 'beem360'); ?>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <input type="hidden" name="beem360[section_order]" id="beem-section-order-field" value="<?php echo esc_attr(implode(',', $data['section_order'])); ?>">
                </section>

                <section class="beem-admin-card">
                    <h2><?php esc_html_e('Brand & General', 'beem360'); ?></h2>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label">Logo URL</label>
                            <input type="text" name="beem360[logo_url]" class="form-control" value="<?php echo esc_attr($data['logo_url']); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Hero image</label>
                            <input type="text" name="beem360[media_hero_image]" class="form-control" value="<?php echo esc_attr($data['media']['hero_image']); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">AI image</label>
                            <input type="text" name="beem360[media_ai_image]" class="form-control" value="<?php echo esc_attr($data['media']['ai_image']); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Admin notification emails</label>
                            <input type="text" name="beem360[notification_emails]" class="form-control" value="<?php echo esc_attr($data['notification_emails']); ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Default phone country (ISO)</label>
                            <input type="text" name="beem360[contact_default_country]" class="form-control" value="<?php echo esc_attr($data['contact_default_country']); ?>">
                            <small class="text-muted">Ex: sa, ae, qa, eg</small>
                        </div>
                    </div>
                </section>

                <?php foreach (beem360_copy_field_groups() as $group_key => $fields) : ?>
                    <section class="beem-admin-card">
                        <h2><?php echo esc_html(ucfirst($group_key)); ?></h2>
                        <div class="row g-3">
                            <?php foreach ($fields as $field => $label) : if (in_array($field, ['notification_emails', 'contact_default_country'], true)) { continue; } ?>
                                <div class="col-12">
                                    <label class="form-label d-block fw-bold mb-2"><?php echo esc_html($label); ?></label>
                                    <div class="row g-2">
                                        <?php foreach ($langs as $lang => $lang_label) : ?>
                                            <div class="col-md-4">
                                                <label class="small text-muted"><?php echo esc_html($lang_label); ?></label>
                                                <?php
                                                $is_textarea = str_contains($field, 'text') || str_contains($field, 'title') || str_contains($field, 'trusted') || str_contains($field, 'line') || str_contains($field, 'intro');
                                                if ($is_textarea) :
                                                ?>
                                                    <textarea name="beem360[copy][<?php echo esc_attr($field); ?>][<?php echo esc_attr($lang); ?>]" rows="3" class="form-control"><?php echo esc_textarea($data['copy'][$field][$lang] ?? ''); ?></textarea>
                                                <?php else : ?>
                                                    <input type="text" name="beem360[copy][<?php echo esc_attr($field); ?>][<?php echo esc_attr($lang); ?>]" class="form-control" value="<?php echo esc_attr($data['copy'][$field][$field] ?? '') ? '' : ''; ?>" />
                                                    <input type="text" name="beem360[copy][<?php echo esc_attr($field); ?>][<?php echo esc_attr($lang); ?>]" class="form-control" value="<?php echo esc_attr($data['copy'][$field][$lang] ?? ''); ?>">
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <section class="beem-admin-card">
                    <h2><?php esc_html_e('JSON driven items', 'beem360'); ?></h2>
                    <p><?php esc_html_e('Use these JSON fields to add/remove/reorder cards, lines and nav links.', 'beem360'); ?></p>
                    <div class="mb-3">
                        <label class="form-label">Platform cards</label>
                        <textarea class="form-control" name="beem360[items_platform_cards]" rows="8"><?php echo esc_textarea(wp_json_encode($data['items']['platform_cards'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feature groups</label>
                        <textarea class="form-control" name="beem360[items_feature_groups]" rows="10"><?php echo esc_textarea(wp_json_encode($data['items']['feature_groups'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">AI console rows</label>
                        <textarea class="form-control" name="beem360[items_ai_lines]" rows="7"><?php echo esc_textarea(wp_json_encode($data['items']['ai_lines'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Workflow steps</label>
                        <textarea class="form-control" name="beem360[items_workflow_steps]" rows="8"><?php echo esc_textarea(wp_json_encode($data['items']['workflow_steps'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role cards</label>
                        <textarea class="form-control" name="beem360[items_role_cards]" rows="10"><?php echo esc_textarea(wp_json_encode($data['items']['role_cards'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Section metrics</label>
                        <textarea class="form-control" name="beem360[items_section_metrics]" rows="6"><?php echo esc_textarea(wp_json_encode($data['items']['section_metrics'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Footer links</label>
                        <textarea class="form-control" name="beem360[items_footer_links]" rows="6"><?php echo esc_textarea(wp_json_encode($data['items']['footer_links'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></textarea>
                    </div>
                </section>
            </div>
            <p class="submit">
                <button type="submit" class="button button-primary" name="beem360_save_theme" value="1">Save settings</button>
            </p>
        </form>
    </div>
    <?php
}

function beem360_lead_page() {
    if (! current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['beem_send_reply'])) {
        check_admin_referer('beem360-send-reply');
        $ids = array_map('absint', (array) ($_POST['lead_ids'] ?? []));
        $subject = sanitize_text_field($_POST['reply_subject'] ?? '');
        $message = wp_kses_post(wp_unslash($_POST['reply_message'] ?? ''));
        $sent = 0;
        $errors = 0;
        foreach ($ids as $id) {
            $post = get_post($id);
            if (! $post || $post->post_type !== 'beem_contact') {
                continue;
            }
            $to = get_post_meta($id, 'beem_contact_email', true);
            if (empty($to) || ! is_email($to)) {
                $errors++;
                continue;
            }
            $body = beem360_email_template($subject, $message);
            $headers = [
                'Content-Type: text/html; charset=UTF-8',
                'From: ' . sanitize_text_field(beem360_get_data()['reply_from_name']) . ' <' . sanitize_email(beem360_get_data()['reply_from_email']) . '>',
            ];
            if (wp_mail($to, $subject, $body, $headers)) {
                $sent++;
                update_post_meta($id, 'beem_contact_status', 'replied');
            } else {
                $errors++;
            }
        }
        ?>
        <div class="notice notice-<?php echo $sent > 0 ? 'success' : 'error'; ?> is-dismissible">
            <p><?php echo esc_html(sprintf('%d sent, %d failed.', $sent, $errors)); ?></p>
        </div>
        <?php
    }

    $selected = array_map('absint', (array) ($_GET['lead'] ? [$_GET['lead']] : []));
    if (isset($_POST['lead_ids']) && is_array($_POST['lead_ids'])) {
        $selected = array_map('absint', $_POST['lead_ids']);
    }
    $leads = get_posts(
        [
            'post_type'      => 'beem_contact',
            'posts_per_page' => 80,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]
    );
    ?>
    <div class="wrap beem-admin-wrap">
        <h1><?php esc_html_e('Beem Contact Leads', 'beem360'); ?></h1>
        <form method="post" class="mb-3">
            <?php wp_nonce_field('beem360-send-reply'); ?>
            <div class="beem-admin-card">
                <h2><?php esc_html_e('Compose reply', 'beem360'); ?></h2>
                <div class="row g-2">
                    <div class="col-md-12">
                        <label class="form-label">Subject</label>
                        <input type="text" name="reply_subject" class="form-control" placeholder="Subject" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Message</label>
                        <textarea name="reply_message" rows="8" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Live email preview</label>
                        <div id="beem-email-preview" class="border p-3 bg-white"></div>
                    </div>
                </div>
                <p class="mt-3">
                    <button class="button button-primary" name="beem_send_reply" value="1">Send reply to selected</button>
                    <span class="text-muted ms-2">You can select one row from the list or keep all selected.</span>
                </p>
            </div>
            <section class="beem-admin-card mt-3">
                <h2><?php esc_html_e('Leads', 'beem360'); ?></h2>
                <table class="widefat fixed striped">
                    <thead>
                        <tr>
                            <th scope="col" style="width:36px;">#</th>
                            <th><?php esc_html_e('Name', 'beem360'); ?></th>
                            <th><?php esc_html_e('Email', 'beem360'); ?></th>
                            <th><?php esc_html_e('Company', 'beem360'); ?></th>
                            <th><?php esc_html_e('Phone', 'beem360'); ?></th>
                            <th><?php esc_html_e('Type', 'beem360'); ?></th>
                            <th><?php esc_html_e('Date', 'beem360'); ?></th>
                            <th><?php esc_html_e('Action', 'beem360'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($leads as $lead) : ?>
                            <tr>
                                <td><input type="checkbox" name="lead_ids[]" value="<?php echo (int) $lead->ID; ?>" <?php checked(in_array((int) $lead->ID, $selected, true)); ?>></td>
                                <td><?php echo esc_html(get_post_meta($lead->ID, 'beem_contact_name', true)); ?></td>
                                <td><?php echo esc_html(get_post_meta($lead->ID, 'beem_contact_email', true)); ?></td>
                                <td><?php echo esc_html(get_post_meta($lead->ID, 'beem_contact_company', true)); ?></td>
                                <td><?php echo esc_html(get_post_meta($lead->ID, 'beem_contact_phone', true)); ?></td>
                                <td><?php echo esc_html(get_post_meta($lead->ID, 'beem_contact_type', true)); ?></td>
                                <td><?php echo esc_html(get_the_date('Y-m-d H:i', $lead->ID)); ?></td>
                                <td><a href="<?php echo esc_url(admin_url('admin.php?page=beem-contact-leads&lead=' . (int) $lead->ID)); ?>">Reply</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </form>
    </div>
    <?php
}

function beem360_register_admin_pages() {
    add_menu_page(
        __('Beem Theme', 'beem360'),
        __('Beem Theme', 'beem360'),
        'manage_options',
        'beem-theme',
        'beem360_settings_page',
        'dashicons-admin-customizer',
        58
    );
    add_submenu_page(
        'beem-theme',
        __('Contact leads', 'beem360'),
        __('Contact leads', 'beem360'),
        'manage_options',
        'beem-contact-leads',
        'beem360_lead_page'
    );
}
add_action('admin_menu', 'beem360_register_admin_pages');

function beem360_email_template(string $subject, string $message, string $lang = ''): string {
    $lang = $lang ?: beem360_language();
    $data = beem360_get_data();
    $copy = beem360_localize_value($data['copy'], $lang);
    $theme = [
        'blue' => '#1E96BE',
        'ink' => '#132433',
        'paper' => '#FCFDFE',
        'orange' => '#FAAA3C',
        'teal' => '#5AB4A0',
    ];
    ob_start();
    ?>
    <div style="margin:0;padding:20px;background:<?php echo esc_attr($theme['paper']); ?>;font-family:'Plus Jakarta Sans', Arial, sans-serif;color:<?php echo esc_attr($theme['ink']); ?>;line-height:1.7;">
        <table style="max-width:640px;margin:0 auto;background:#fff;border-radius:14px;border:1px solid #E6EBEF;padding:20px;">
            <tr>
                <td style="padding:0 0 22px;border-bottom:1px solid #E6EBEF">
                    <h2 style="margin:0;color:<?php echo esc_attr($theme['blue']); ?>;"><?php echo esc_html($copy['brand_name']); ?></h2>
                    <p style="margin:10px 0 0;"><?php echo esc_html($subject); ?></p>
                </td>
            </tr>
            <tr>
                <td style="padding:24px 0;">
                    <p style="margin:0 0 12px;"><?php echo wp_kses_post(nl2br($message)); ?></p>
                </td>
            </tr>
            <tr>
                <td style="border-top:1px solid #E6EBEF;padding-top:16px;color:#5A6A78;font-size:13px;">
                    <?php echo esc_html($copy['footer_rights']); ?>
                </td>
            </tr>
        </table>
    </div>
    <?php
    return ob_get_clean();
}

function beem360_admin_columns($columns) {
    $columns['beem_contact_email'] = __('Email', 'beem360');
    $columns['beem_contact_type'] = __('Type', 'beem360');
    $columns['beem_contact_status'] = __('Status', 'beem360');
    return $columns;
}
add_filter('manage_beem_contact_posts_columns', 'beem360_admin_columns');

function beem360_admin_columns_content($column_name, $post_id) {
    if ($column_name === 'beem_contact_email') {
        echo esc_html(get_post_meta($post_id, 'beem_contact_email', true));
    }
    if ($column_name === 'beem_contact_type') {
        echo esc_html(get_post_meta($post_id, 'beem_contact_type', true));
    }
    if ($column_name === 'beem_contact_status') {
        echo esc_html(get_post_meta($post_id, 'beem_contact_status', true) ?: 'new');
    }
}
add_action('manage_beem_contact_posts_custom_column', 'beem360_admin_columns_content', 10, 2);

function beem360_create_contact_post(array $payload): int {
    $name = sanitize_text_field($payload['name'] ?? '');
    $company = sanitize_text_field($payload['company'] ?? '');
    $email = sanitize_email($payload['email'] ?? '');
    $phone = sanitize_text_field($payload['phone'] ?? '');
    $message = sanitize_textarea_field($payload['message'] ?? '');
    $country = sanitize_text_field($payload['country'] ?? '');
    $type = sanitize_key($payload['type'] ?? 'contact');

    $post_id = wp_insert_post(
        [
            'post_type' => 'beem_contact',
            'post_status' => 'publish',
            'post_title' => sprintf('%s %s (%s)', $name, $email, $type),
            'post_content' => $message,
            'meta_input' => [
                'beem_contact_name' => $name,
                'beem_contact_company' => $company,
                'beem_contact_email' => $email,
                'beem_contact_phone' => $phone,
                'beem_contact_country' => $country,
                'beem_contact_type' => $type,
                'beem_contact_status' => 'new',
            ],
        ],
        true
    );

    if (is_wp_error($post_id)) {
        return 0;
    }
    return (int) $post_id;
}

function beem360_handle_contact_submit() {
    if (! check_ajax_referer('beem360-contact-send', 'nonce', false)) {
        wp_send_json_error(['message' => __('Security check failed.', 'beem360')]);
    }

    $lang = beem360_language();
    $payload = [
        'name' => sanitize_text_field($_POST['name'] ?? ''),
        'company' => sanitize_text_field($_POST['company'] ?? ''),
        'email' => sanitize_email($_POST['email'] ?? ''),
        'phone' => sanitize_text_field($_POST['phone'] ?? ''),
        'country' => sanitize_text_field($_POST['country'] ?? ''),
        'message' => sanitize_textarea_field($_POST['message'] ?? ''),
        'type' => sanitize_key($_POST['type'] ?? ''),
    ];

    foreach (['name', 'company', 'email', 'phone', 'country', 'message', 'type'] as $required) {
        if (empty($payload[$required])) {
            wp_send_json_error(['message' => __('Please fill all required fields.', 'beem360')]);
        }
    }

    if (! is_email($payload['email'])) {
        wp_send_json_error(['message' => __('Invalid email.', 'beem360')]);
    }

    if (! in_array($payload['type'], ['request', 'contact'], true)) {
        wp_send_json_error(['message' => __('Invalid request type.', 'beem360')]);
    }

    $post_id = beem360_create_contact_post($payload);
    if (! $post_id) {
        wp_send_json_error(['message' => __('Could not save your submission.', 'beem360')]);
    }

    $data = beem360_get_data();
    $copy = beem360_localize_value($data['copy'], $lang);
    $recipients = array_map('trim', explode(',', $data['notification_emails']));
    $recipients = array_filter($recipients, 'is_email');

    $admin_subject = sprintf('[%s] %s', $copy['brand_name'], $payload['type'] === 'request' ? __('New request submission', 'beem360') : __('New contact form submission', 'beem360'));
    $admin_message = sprintf(
        "Type: %s\nName: %s\nCompany: %s\nEmail: %s\nPhone: %s\nCountry: %s\nMessage:\n%s",
        $payload['type'],
        $payload['name'],
        $payload['company'],
        $payload['email'],
        $payload['phone'],
        $payload['country'],
        $payload['message']
    );
    wp_mail(
        $recipients,
        $admin_subject,
        esc_html($admin_message),
        ['Content-Type: text/plain; charset=UTF-8']
    );

    $thank_body = wp_kses_post(
        beem360_email_template(
            beem360_localize_value($data['thank_you_subject'], $lang),
            $copy['hero_text'] . "\n\n" . $copy['contact_success_text']
        )
    );
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . sanitize_text_field($data['reply_from_name']) . ' <' . sanitize_email($data['reply_from_email']) . '>',
    ];
    wp_mail($payload['email'], beem360_localize_value($data['thank_you_subject'], $lang), $thank_body, $headers);

    wp_send_json_success(['message' => $copy['contact_success_text']]);
}
add_action('wp_ajax_beem360_contact_submit', 'beem360_handle_contact_submit');
add_action('wp_ajax_nopriv_beem360_contact_submit', 'beem360_handle_contact_submit');

function beem360_render_popup() {
    $data = beem360_get_data();
    $lang = beem360_language();
    $copy = beem360_localize_value($data['copy'], $lang);
    ?>
    <div class="modal fade" id="beem-contact-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="beem-modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e('Close', 'beem360'); ?>"></button>
                </div>
                <div class="modal-body">
                    <form id="beem-contact-form">
                        <input type="hidden" name="action" value="beem360_contact_submit">
                        <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('beem360-contact-send')); ?>">
                        <input type="hidden" name="type" id="beem-contact-type" value="request">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><?php esc_html_e('Name', 'beem360'); ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?php esc_html_e('Email', 'beem360'); ?></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?php esc_html_e('Company', 'beem360'); ?></label>
                                <input type="text" name="company" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?php esc_html_e('Phone', 'beem360'); ?></label>
                                <input type="tel" id="beem-contact-phone" name="phone" class="form-control" required>
                                <input type="hidden" id="beem-contact-country" name="country">
                            </div>
                            <div class="col-12">
                                <label class="form-label"><?php esc_html_e('Message', 'beem360'); ?></label>
                                <textarea name="message" rows="4" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <button type="submit" class="btn btn-primary">
                                <span id="beem-contact-submit-label"><?php echo esc_html($copy['request_submit']); ?></span>
                            </button>
                            <small id="beem-contact-status" class="text-muted"></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function beem360_language_switcher() {
    if (! function_exists('pll_get_post_translations')) {
        return '';
    }

    $post_id = get_queried_object_id();
    $translations = [];
    if ($post_id) {
        $translations = pll_get_post_translations($post_id);
    }
    if (empty($translations)) {
        $langs = function_exists('pll_the_languages') ? pll_the_languages(['raw' => 1, 'hide_if_empty' => 0]) : [];
        if (! empty($langs) && is_array($langs)) {
            foreach ($langs as $lang => $lang_data) {
                $translations[$lang] = $lang_data['id'] ?? 0;
            }
        }
    }
    if (empty($translations) || count($translations) < 2) {
        return '';
    }
    $current = beem360_language();
    $output = '<ul class="beem-lang-switch" aria-label="' . esc_attr__('Language', 'beem360') . '">';
    foreach ($translations as $lang => $id) {
        if ($lang === $current) {
            continue;
        }
        $url = function_exists('pll_get_post') ? get_permalink($id) : get_home_url();
        if (function_exists('pll_home_url') && empty($id)) {
            $url = pll_home_url($lang);
        }
        $output .= '<li><a class="btn btn-sm btn-light" href="' . esc_url($url) . '">' . strtoupper(esc_html($lang)) . '</a></li>';
    }
    $output .= '</ul>';
    return $output;
}

function beem360_section_menu_links() {
    $lang = beem360_language();
    $data = beem360_get_data();
    $copy = beem360_localize_value($data['copy'], $lang);
    $order = $data['section_order'];
    $sections = beem360_section_list();
    $labels = [
        'hero' => $copy['nav_platform'],
        'platform' => $copy['platform_kicker'],
        'features' => $copy['nav_features'],
        'ai' => $copy['nav_ai'],
        'workflow' => $copy['nav_workflow'],
        'roles' => $copy['nav_roles'],
        'cta' => $copy['nav_cta'],
        'footer' => $copy['footer_rights'],
    ];
    $out = '';
    foreach ($order as $section_id) {
        if (! beem360_is_section_enabled($section_id)) {
            continue;
        }
        if (! isset($sections[$section_id])) {
            continue;
        }
        $anchor = beem360_anchor_for($section_id);
        $label = $labels[$section_id] ?? ucfirst($section_id);
        if ($section_id === 'hero') {
            $label = $copy['nav_platform'];
        }
        $out .= '<li class="nav-item"><a class="nav-link" href="#' . esc_attr($anchor) . '">' . esc_html($label) . '</a></li>';
    }
    return $out;
}

function beem360_render_section_hero() {
    if (! beem360_is_section_enabled('hero')) {
        return '';
    }
    $data = beem360_get_data();
    $lang = beem360_language();
    $copy = beem360_localize_value($data['copy'], $lang);
    $items = beem360_localize_value($data['items']['section_metrics'], $lang);
    ob_start();
    ?>
    <section id="<?php echo esc_attr(beem360_anchor_for('hero')); ?>" class="beem-section beem-hero">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <span class="beem-kicker"><?php echo esc_html($copy['hero_kicker']); ?></span>
                    <h1 class="beem-title">
                        <span><?php echo esc_html($copy['hero_title_a']); ?></span>
                        <span><?php echo esc_html($copy['hero_title_b']); ?></span>
                    </h1>
                    <p><?php echo esc_html($copy['hero_text']); ?></p>
                    <div class="beem-actions mb-3">
                        <a href="<?php echo esc_url($copy['hero_primary']); ?>" class="btn btn-primary"><?php echo esc_html($copy['hero_primary']); ?></a>
                        <a href="<?php echo esc_url($copy['hero_secondary']); ?>" class="btn btn-outline-primary"><?php echo esc_html($copy['hero_secondary']); ?></a>
                    </div>
                    <p class="beem-trust"><i class="bi bi-shield-check"></i> <?php echo esc_html($copy['hero_trusted_line']); ?></p>
                </div>
                <div class="col-lg-6">
                    <div class="beem-hero-card shadow-sm">
                        <img src="<?php echo esc_url($data['media']['hero_image']); ?>" alt="<?php echo esc_attr($copy['hero_title_a']); ?>">
                    </div>
                    <div class="row g-3 mt-3">
                        <?php foreach ($items as $metric) : ?>
                            <div class="col-sm-4">
                                <div class="beem-stat">
                                    <div class="h3"><?php echo esc_html($metric['value']); ?></div>
                                    <small><?php echo esc_html($metric['label']); ?></small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function beem360_render_section_platform() {
    if (! beem360_is_section_enabled('platform')) {
        return '';
    }
    $data = beem360_get_data();
    $lang = beem360_language();
    $copy = beem360_localize_value($data['copy'], $lang);
    $cards = beem360_localize_value($data['items']['platform_cards'], $lang);
    ob_start();
    ?>
    <section id="<?php echo esc_attr(beem360_anchor_for('platform')); ?>" class="beem-section beem-platform">
        <div class="container">
            <div class="beem-section-head">
                <span class="beem-kicker"><?php echo esc_html($copy['platform_kicker']); ?></span>
                <h2><?php echo esc_html($copy['platform_title']); ?></h2>
                <p><?php echo esc_html($copy['platform_text']); ?></p>
            </div>
            <div class="row g-3">
                <?php foreach ($cards as $card) : ?>
                    <div class="col-md-4">
                        <article class="beem-card">
                            <span class="beem-card-number"><?php echo esc_html($card['number']); ?></span>
                            <h3><?php echo esc_html($card['title']); ?></h3>
                            <p><?php echo esc_html($card['text']); ?></p>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function beem360_render_section_features() {
    if (! beem360_is_section_enabled('features')) {
        return '';
    }
    $data = beem360_get_data();
    $lang = beem360_language();
    $copy = beem360_localize_value($data['copy'], $lang);
    $groups = beem360_localize_value($data['items']['feature_groups'], $lang);
    ob_start();
    ?>
    <section id="<?php echo esc_attr(beem360_anchor_for('features')); ?>" class="beem-section beem-features">
        <div class="container">
            <div class="beem-section-head">
                <h2><?php echo esc_html($copy['features_title']); ?></h2>
                <p><?php echo esc_html($copy['features_text']); ?></p>
            </div>
            <div class="row g-3">
                <?php foreach ($groups as $group) : ?>
                    <article class="col-md-6">
                        <div class="beem-card beem-feature-group">
                            <div class="beem-feature-head">
                                <span class="beem-feature-icon"><?php echo esc_html($group['icon']); ?></span>
                                <h3><?php echo esc_html($group['title']); ?></h3>
                            </div>
                            <p><?php echo esc_html($group['text']); ?></p>
                            <ul class="list-unstyled">
                                <?php foreach ($group['cards'] as $card) : ?>
                                    <li><strong><?php echo esc_html($card['title']); ?></strong> — <?php echo esc_html($card['text']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function beem360_render_section_ai() {
    if (! beem360_is_section_enabled('ai')) {
        return '';
    }
    $data = beem360_get_data();
    $lang = beem360_language();
    $copy = beem360_localize_value($data['copy'], $lang);
    $items = beem360_localize_value($data['items']['ai_lines'], $lang);
    ob_start();
    ?>
    <section id="<?php echo esc_attr(beem360_anchor_for('ai')); ?>" class="beem-section beem-ai">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5">
                    <h2><?php echo esc_html($copy['ai_title']); ?></h2>
                    <p><?php echo esc_html($copy['ai_text']); ?></p>
                </div>
                <div class="col-lg-7">
                    <div class="beem-console">
                        <?php foreach ($items as $line) : ?>
                            <div class="beem-console-line">
                                <span><?php echo esc_html($line['name']); ?></span>
                                <strong class="beem-badge beem-badge-<?php echo esc_attr($line['status']); ?>"><?php echo esc_html($line['value']); ?></strong>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function beem360_render_section_workflow() {
    if (! beem360_is_section_enabled('workflow')) {
        return '';
    }
    $data = beem360_get_data();
    $lang = beem360_language();
    $copy = beem360_localize_value($data['copy'], $lang);
    $steps = beem360_localize_value($data['items']['workflow_steps'], $lang);
    ob_start();
    ?>
    <section id="<?php echo esc_attr(beem360_anchor_for('workflow')); ?>" class="beem-section beem-workflow">
        <div class="container">
            <div class="beem-section-head">
                <h2><?php echo esc_html($copy['workflow_title']); ?></h2>
                <p><?php echo esc_html($copy['workflow_text']); ?></p>
            </div>
            <div class="beem-workflow-steps">
                <?php foreach ($steps as $step) : ?>
                    <article class="beem-step">
                        <div class="beem-step-title"><?php echo esc_html($step['title']); ?></div>
                        <p><?php echo esc_html($step['text']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function beem360_render_section_roles() {
    if (! beem360_is_section_enabled('roles')) {
        return '';
    }
    $data = beem360_get_data();
    $lang = beem360_language();
    $copy = beem360_localize_value($data['copy'], $lang);
    $cards = beem360_localize_value($data['items']['role_cards'], $lang);
    ob_start();
    ?>
    <section id="<?php echo esc_attr(beem360_anchor_for('roles')); ?>" class="beem-section beem-roles">
        <div class="container">
            <div class="beem-section-head">
                <h2><?php echo esc_html($copy['roles_title']); ?></h2>
                <p><?php echo esc_html($copy['roles_text']); ?></p>
            </div>
            <div class="row g-3">
                <?php foreach ($cards as $card) : ?>
                    <div class="col-md-6">
                        <div class="beem-card">
                            <div class="d-flex align-items-start gap-3">
                                <i class="<?php echo esc_attr($card['icon']); ?>"></i>
                                <div>
                                    <h3><?php echo esc_html($card['name']); ?></h3>
                                    <p><?php echo esc_html($card['text']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function beem360_render_section_cta() {
    if (! beem360_is_section_enabled('cta')) {
        return '';
    }
    $data = beem360_get_data();
    $lang = beem360_language();
    $copy = beem360_localize_value($data['copy'], $lang);
    ob_start();
    ?>
    <section id="<?php echo esc_attr(beem360_anchor_for('cta')); ?>" class="beem-section beem-cta">
        <div class="container">
            <div class="beem-cta-card text-center">
                <h2><?php echo esc_html($copy['cta_title']); ?></h2>
                <p><?php echo esc_html($copy['cta_text']); ?></p>
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a class="btn btn-primary" href="<?php echo esc_url($copy['cta_primary_url']); ?>"><?php echo esc_html($copy['cta_primary']); ?></a>
                    <a class="btn btn-outline-primary" href="<?php echo esc_url($copy['cta_secondary_url']); ?>"><?php echo esc_html($copy['cta_secondary']); ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function beem360_render_section_footer_content() {
    if (! beem360_is_section_enabled('footer')) {
        return '';
    }
    $data = beem360_get_data();
    $lang = beem360_language();
    $copy = beem360_localize_value($data['copy'], $lang);
    $links = beem360_localize_value($data['items']['footer_links'], $lang);
    ob_start();
    ?>
    <section id="<?php echo esc_attr(beem360_anchor_for('footer')); ?>" class="beem-section beem-footer-copy">
        <div class="container">
            <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center">
                <p class="mb-0"><?php echo esc_html($copy['footer_tagline']); ?></p>
                <div class="beem-footer-links">
                    <?php foreach ($links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['label']); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <hr>
            <p class="mb-0">&copy; <?php echo esc_html(date_i18n('Y')); ?> Beem 360. <?php echo esc_html($copy['footer_rights']); ?></p>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function beem360_render_section(string $section_id): string {
    $map = [
        'hero' => 'beem360_render_section_hero',
        'platform' => 'beem360_render_section_platform',
        'features' => 'beem360_render_section_features',
        'ai' => 'beem360_render_section_ai',
        'workflow' => 'beem360_render_section_workflow',
        'roles' => 'beem360_render_section_roles',
        'cta' => 'beem360_render_section_cta',
        'footer' => 'beem360_render_section_footer_content',
    ];
    if (! isset($map[$section_id]) || ! function_exists($map[$section_id])) {
        return '';
    }
    return call_user_func($map[$section_id]);
}

function beem360_shortcode_section($atts = []) {
    $atts = shortcode_atts(['id' => 'hero'], $atts, 'beem_section');
    return beem360_render_section(sanitize_key($atts['id']));
}
add_shortcode('beem_section', 'beem360_shortcode_section');

add_shortcode('beem_hero', function() { return beem360_render_section('hero'); });
add_shortcode('beem_platform', function() { return beem360_render_section('platform'); });
add_shortcode('beem_features', function() { return beem360_render_section('features'); });
add_shortcode('beem_ai', function() { return beem360_render_section('ai'); });
add_shortcode('beem_workflow', function() { return beem360_render_section('workflow'); });
add_shortcode('beem_roles', function() { return beem360_render_section('roles'); });
add_shortcode('beem_cta', function() { return beem360_render_section('cta'); });

function beem360_shortcode_home_sections() {
    $data = beem360_get_data();
    $out = '';
    foreach ($data['section_order'] as $section) {
        $out .= beem360_render_section((string) $section);
    }
    return $out;
}
add_shortcode('beem_home_sections', 'beem360_shortcode_home_sections');

add_shortcode('beem_header_popup_buttons', function() {
    $data = beem360_get_data();
    $copy = beem360_localize_value($data['copy'], beem360_language());
    return '<div class="d-flex gap-2">
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#beem-contact-modal" data-type="request">' . esc_html($copy['hero_request_btn']) . '</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#beem-contact-modal" data-type="contact">' . esc_html($copy['header_contact']) . '</button>
    </div>';
});

function beem360_enqueue_popup_in_footer() {
    if (! is_admin()) {
        add_action('wp_footer', 'beem360_render_popup');
    }
}
add_action('wp', 'beem360_enqueue_popup_in_footer');

