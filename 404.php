<?php get_header(); ?>
<section class="beem-error-page">
  <div class="beem-error-blob beem-error-blob-a"></div><div class="beem-error-blob beem-error-blob-b"></div>
  <div class="container beem-error-grid">
    <div class="beem-error-copy beem-reveal is-in">
      <div class="beem-num"><b>404</b> <?php echo esc_html(beem360_x('PAGE NOT FOUND','الصفحة غير موجودة','PAGE INTROUVABLE')); ?></div>
      <h1><?php echo esc_html(beem360_x('This page slipped out of view.','هذه الصفحة خرجت عن نطاق الرؤية.','Cette page a disparu de notre champ de vision.')); ?></h1>
      <p><?php echo esc_html(beem360_x('The link may have changed or the page may no longer exist. Let’s bring you back to a clear starting point.','ربما تغيّر الرابط أو لم تعد الصفحة موجودة. لنعد بك إلى نقطة بداية واضحة.','Le lien a peut-être changé ou la page n’existe plus. Revenons à un point de départ clair.')); ?></p>
      <div class="d-flex flex-wrap gap-3"><a class="beem-btn" href="<?php echo esc_url(beem360_home_url()); ?>"><i class="bi bi-house-door"></i> <?php echo esc_html(beem360_x('Back home','العودة للرئيسية','Retour à l’accueil')); ?></a><button class="beem-btn beem-btn-ghost" data-beem-modal="contact"><i class="bi bi-chat-dots"></i> <?php echo esc_html(beem360_x('Contact us','تواصل معنا','Nous contacter')); ?></button></div>
    </div>
    <div class="beem-error-visual" aria-hidden="true">
      <div class="beem-error-ring ring-one"></div><div class="beem-error-ring ring-two"></div>
      <div class="beem-error-code"><img src="<?php echo beem360_asset('01-beem-360.png'); ?>" alt=""><strong>404</strong><small><?php echo esc_html(beem360_x('Nothing here','لا يوجد شيء هنا','Rien ici')); ?></small></div>
      <span class="beem-error-orbit orbit-one"><i class="bi bi-search"></i></span><span class="beem-error-orbit orbit-two"><i class="bi bi-compass"></i></span><span class="beem-error-orbit orbit-three"><i class="bi bi-arrow-return-left"></i></span>
    </div>
  </div>
</section>
<?php get_footer();
