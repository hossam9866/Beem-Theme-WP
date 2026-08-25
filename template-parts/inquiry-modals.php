<?php if (!defined('ABSPATH')) { exit; }
$lang = beem360_lang();
foreach (['request','contact'] as $type) : ?>
<div class="modal fade beem-inquiry-modal" id="beem-<?php echo esc_attr($type); ?>-modal" tabindex="-1" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered"><div class="modal-content"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  <div class="beem-modal-brand"><img src="<?php echo beem360_asset('01-beem-360.png'); ?>" alt=""><span>Beem View <i>360</i></span></div>
  <h2><?php echo beem360_text_breaks(beem360_t($type.'_title')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2><div class="beem-modal-intro beem-rich-copy"><?php echo beem360_content($type.'_intro'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
  <form class="beem-inquiry-form"><input type="hidden" name="action" value="beem360_submit_inquiry"><input type="hidden" name="nonce" value=""><input type="hidden" name="inquiry_type" value="<?php echo esc_attr($type); ?>"><input type="hidden" name="phone_full" value=""><input type="hidden" name="phone_country" value="">
   <div class="row g-3"><div class="col-sm-6"><label><?php echo esc_html(beem360_t('field_name')); ?> *</label><input class="form-control" name="name" required autocomplete="name"></div><div class="col-sm-6"><label><?php echo esc_html(beem360_t('field_email')); ?> *</label><input class="form-control" type="email" name="email" required autocomplete="email"></div><div class="col-sm-6"><label><?php echo esc_html(beem360_t('field_phone')); ?> *</label><input class="form-control beem-phone-input" type="tel" name="phone" required autocomplete="tel" inputmode="tel"></div><div class="col-sm-6"><label><?php echo esc_html(beem360_t('field_company')); ?> *</label><input class="form-control" name="company" required autocomplete="organization"></div><div class="col-12"><label><?php echo esc_html(beem360_t('field_message')); ?> *</label><textarea class="form-control" name="message" rows="4" required></textarea></div></div>
   <div class="beem-form-status" role="status" aria-live="polite"></div><button class="beem-btn w-100 justify-content-center" type="submit"><?php echo esc_html(beem360_t('form_submit')); ?> <i class="bi bi-send"></i></button>
  </form>
 </div></div>
</div>
<?php endforeach; ?>
