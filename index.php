<?php get_header(); ?>
<section class="beem-content container py-5 mt-5"><?php if (have_posts()) : while (have_posts()) : the_post(); ?><article <?php post_class('py-4'); ?>><h1><?php the_title(); ?></h1><?php the_content(); ?></article><?php endwhile; else : ?><p><?php esc_html_e('Nothing found.','beem360'); ?></p><?php endif; ?></section>
<?php get_footer();
