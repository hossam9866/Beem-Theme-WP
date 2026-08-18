<?php
if (!defined('ABSPATH')) { exit; }

define('BEEM360_VERSION', '1.0.0');
define('BEEM360_DIR', get_template_directory());
define('BEEM360_URI', get_template_directory_uri());

require_once BEEM360_DIR . '/inc/theme-core.php';
require_once BEEM360_DIR . '/inc/shortcodes.php';
require_once BEEM360_DIR . '/inc/inquiries.php';
require_once BEEM360_DIR . '/inc/admin.php';

