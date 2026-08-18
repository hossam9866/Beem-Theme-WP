<?php get_header(); ?>

<?php if (is_front_page()) : ?>
    <?php echo do_shortcode('[beem_home_sections]'); ?>
<?php else : ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('container py-5'); ?>>
                <h1><?php the_title(); ?></h1>
                <div class="beem-content"><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <section class="container py-5">
            <h1><?php esc_html_e('No content found', 'beem360'); ?></h1>
        </section>
    <?php endif; ?>
<?php endif; ?>

<?php get_footer(); ?>
