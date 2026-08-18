<?php get_header(); ?>
<section class="container py-5">
    <div class="text-center py-5">
        <h1 class="display-1">404</h1>
        <p><?php esc_html_e('The page you are looking for was not found.', 'beem360'); ?></p>
        <a class="btn btn-primary me-2" href="<?php echo esc_url(home_url('/')); ?>">Go home</a>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#beem-contact-modal" data-type="contact">
            <?php echo esc_html(beem360_localize_value(beem360_get_data()['copy']['header_contact'], beem360_language())); ?>
        </button>
    </div>
</section>
<?php get_footer(); ?>
