<?php get_header(); ?>

<div class="container py-5">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <div class="beem-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
