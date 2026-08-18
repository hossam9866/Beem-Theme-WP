<?php
get_header();
$options = beem360_options();
$order = array_values(array_intersect((array) $options['section_order'], array_keys(beem360_sections())));
foreach ($order as $section) {
    if (!empty($options['enabled'][$section])) { echo do_shortcode('[beem_' . $section . ']'); }
}
get_footer();
