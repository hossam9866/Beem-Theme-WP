<?php
if(!defined('ABSPATH')){exit;}
$type=(string)get_query_var('beem_legal');
if(!in_array($type,['privacy','terms'],true))$type='privacy';
$document=beem360_legal_document($type);
$title=(string)($document['title']??'');
$intro=(string)($document['intro']??'');
$updated=(string)($document['updated']??'');
$content=(string)($document['content']??'');
get_header();
?>
<section class="beem-legal-page">
  <div class="beem-legal-glow beem-legal-glow-a"></div><div class="beem-legal-glow beem-legal-glow-b"></div>
  <div class="container beem-legal-shell">
    <header class="beem-legal-hero">
      <a class="beem-legal-back" href="<?php echo esc_url(beem360_home_url()); ?>"><i class="bi <?php echo beem360_lang()==='ar'?'bi-arrow-right':'bi-arrow-left'; ?>"></i> <?php echo esc_html(beem360_x('Back to home','العودة للرئيسية','Retour à l’accueil')); ?></a>
      <span class="beem-legal-kicker"><?php echo esc_html($type==='privacy'?beem360_x('PRIVACY','الخصوصية','CONFIDENTIALITÉ'):beem360_x('TERMS','الشروط','CONDITIONS')); ?></span>
      <h1><?php echo beem360_text_breaks($title); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h1>
      <div class="beem-legal-intro"><?php echo beem360_format_content($intro); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
      <?php if($updated!==''){?><p class="beem-legal-updated"><i class="bi bi-clock-history"></i> <?php echo esc_html($updated); ?></p><?php } ?>
    </header>
    <article class="beem-legal-content beem-spot">
      <?php echo beem360_format_content($content); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </article>
    <aside class="beem-legal-note"><i class="bi bi-info-circle"></i><p><?php echo esc_html(beem360_x('Questions about this document? Contact our team and we will help.','هل لديك سؤال عن هذه الوثيقة؟ تواصل مع فريقنا وسنساعدك.','Une question sur ce document ? Contactez notre équipe, nous vous aiderons.')); ?></p><button class="beem-btn beem-btn-sm" data-beem-modal="contact"><?php echo esc_html(beem360_x('Contact us','تواصل معنا','Nous contacter')); ?></button></aside>
  </div>
</section>
<?php get_footer(); ?>
