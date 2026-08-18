</main>
<footer class="beem-footer">
  <a class="beem-brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo beem360_asset('01-beem-360.png'); ?>" alt=""><b>Beem <i>360</i></b></a>
  <span>© <?php echo esc_html(wp_date('Y')); ?> Beem 360. <?php echo esc_html(beem360_lang()==='ar'?'جميع الحقوق محفوظة.':(beem360_lang()==='fr'?'Tous droits réservés.':'All rights reserved.')); ?></span>
  <div class="beem-footer-links"><a href="<?php echo esc_url(beem360_options()['terms_url']); ?>">Terms</a><a href="<?php echo esc_url(beem360_options()['privacy_url']); ?>">Privacy</a><button data-beem-modal="contact">Contact</button></div>
</footer>
<?php get_template_part('template-parts/inquiry-modals'); ?>
<?php wp_footer(); ?></body></html>
