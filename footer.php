    </main>
    <footer class="beem-theme-footer">
        <div class="container">
            <div class="beem-footer-grid">
                <div>
                    <img src="<?php echo esc_url(beem360_get_data()['logo_url']); ?>" alt="<?php echo esc_attr(beem360_localize_value(beem360_get_data()['copy']['brand_name'], beem360_language())); ?>" class="mb-2" width="150">
                    <p class="mb-2"><?php echo esc_html(beem360_localize_value(beem360_get_data()['copy']['platform_text'], beem360_language())); ?></p>
                </div>
                <div>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="d-block"><?php esc_html_e('Home', 'beem360'); ?></a>
                    <a href="<?php echo esc_url(home_url('/')); ?>#<?php echo esc_attr(beem360_anchor_for('platform')); ?>" class="d-block"><?php esc_html_e('Platform', 'beem360'); ?></a>
                    <a href="<?php echo esc_url(home_url('/')); ?>#<?php echo esc_attr(beem360_anchor_for('features')); ?>" class="d-block"><?php esc_html_e('Features', 'beem360'); ?></a>
                </div>
                <div>
                    <a href="#beem-contact-modal" data-bs-toggle="modal" data-type="contact" class="btn btn-sm btn-light"><?php echo esc_html(beem360_localize_value(beem360_get_data()['copy']['header_contact'], beem360_language())); ?></a>
                </div>
            </div>
            <p class="mb-0 mt-3">&copy; <?php echo esc_html(date_i18n('Y')); ?> Beem 360. <?php echo esc_html(beem360_localize_value(beem360_get_data()['copy']['footer_rights'], beem360_language())); ?></p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
