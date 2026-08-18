<?php if (!defined('ABSPATH')) { exit; }
$lang = beem360_lang();
$labels = [
 'request'=>['en'=>'Request a demo','ar'=>'طلب عرض توضيحي','fr'=>'Demander une démo'],
 'contact'=>['en'=>'Contact us','ar'=>'تواصل معنا','fr'=>'Nous contacter'],
 'intro'=>['en'=>'Tell us a little about you and our team will get back to you shortly.','ar'=>'أخبرنا قليلًا عنك وسيتواصل معك فريقنا قريبًا.','fr'=>'Parlez-nous de vous et notre équipe vous répondra rapidement.'],
 'name'=>['en'=>'Full name','ar'=>'الاسم الكامل','fr'=>'Nom complet'],
 'email'=>['en'=>'Work email','ar'=>'البريد الإلكتروني للعمل','fr'=>'E-mail professionnel'],
 'phone'=>['en'=>'Phone number','ar'=>'رقم الهاتف','fr'=>'Téléphone'],
 'company'=>['en'=>'Company','ar'=>'الشركة','fr'=>'Entreprise'],
 'message'=>['en'=>'How can we help?','ar'=>'كيف يمكننا مساعدتك؟','fr'=>'Comment pouvons-nous vous aider ?'],
 'send'=>['en'=>'Send request','ar'=>'إرسال الطلب','fr'=>'Envoyer'],
];
$l = static fn($key) => $labels[$key][$lang] ?? $labels[$key]['en'];
foreach (['request','contact'] as $type) : ?>
<div class="modal fade beem-inquiry-modal" id="beem-<?php echo esc_attr($type); ?>-modal" tabindex="-1" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered"><div class="modal-content"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  <div class="beem-modal-brand"><img src="<?php echo beem360_asset('01-beem-360.png'); ?>" alt=""><span>Beem <i>360</i></span></div>
  <h2><?php echo esc_html($l($type)); ?></h2><p><?php echo esc_html($l('intro')); ?></p>
  <form class="beem-inquiry-form"><input type="hidden" name="action" value="beem360_submit_inquiry"><input type="hidden" name="nonce" value=""><input type="hidden" name="inquiry_type" value="<?php echo esc_attr($type); ?>">
   <div class="row g-3"><div class="col-sm-6"><label><?php echo esc_html($l('name')); ?> *</label><input class="form-control" name="name" required autocomplete="name"></div><div class="col-sm-6"><label><?php echo esc_html($l('email')); ?> *</label><input class="form-control" type="email" name="email" required autocomplete="email"></div><div class="col-sm-6"><label><?php echo esc_html($l('phone')); ?></label><input class="form-control" type="tel" name="phone" autocomplete="tel"></div><div class="col-sm-6"><label><?php echo esc_html($l('company')); ?></label><input class="form-control" name="company" autocomplete="organization"></div><div class="col-12"><label><?php echo esc_html($l('message')); ?> *</label><textarea class="form-control" name="message" rows="4" required></textarea></div></div>
   <div class="beem-form-status" role="status" aria-live="polite"></div><button class="beem-btn w-100 justify-content-center" type="submit"><?php echo esc_html($l('send')); ?> <i class="bi bi-send"></i></button>
  </form>
 </div></div>
</div>
<?php endforeach; ?>

