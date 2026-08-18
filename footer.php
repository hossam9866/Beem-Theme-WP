</main>
<footer class="beem-footer">
  <a class="beem-brand" href="<?php echo esc_url(beem360_home_url()); ?>"><img src="<?php echo beem360_media('logo'); ?>" alt=""><b>Beem <i>360</i></b></a>
  <span>© <?php echo esc_html(wp_date('Y')); ?> Beem 360. <?php echo esc_html(beem360_lang()==='ar'?'جميع الحقوق محفوظة.':(beem360_lang()==='fr'?'Tous droits réservés.':'All rights reserved.')); ?></span>
  <div class="beem-footer-links"><?php foreach(beem360_items('footer_links') as $item){?><a href="<?php echo esc_url(beem360_link_url((string)($item['url']??'#'))); ?>"><?php echo esc_html($item['label']??''); ?></a><?php } ?><button data-beem-modal="contact"><?php echo esc_html(beem360_x('Contact','تواصل معنا','Contact')); ?></button></div>
</footer>
<?php get_template_part('template-parts/inquiry-modals'); ?>
<?php wp_footer(); ?></body></html>
