<?php
if (!defined('ABSPATH')) { exit; }

function beem360_admin_menu(): void {
    add_menu_page('Beem 360','Beem 360','manage_options','beem360','beem360_settings_page','dashicons-admin-customizer',3);
    add_submenu_page('beem360','Theme control','Theme control','manage_options','beem360','beem360_settings_page');
    add_submenu_page('beem360','Inquiries','Inquiries','edit_posts','edit.php?post_type=beem_inquiry');
    add_submenu_page('beem360','Email center','Email center','manage_options','beem360-mail','beem360_mail_page');
}
add_action('admin_menu','beem360_admin_menu');

function beem360_admin_assets(string $hook): void {
    if(strpos($hook,'beem360')===false && get_post_type()!=='beem_inquiry') return;
    wp_enqueue_style('beem360-admin',BEEM360_URI.'/assets/css/beem360-admin.css',[],BEEM360_VERSION);
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('beem360-admin',BEEM360_URI.'/assets/js/beem360-admin.js',['jquery','jquery-ui-sortable'],BEEM360_VERSION,true);
}
add_action('admin_enqueue_scripts','beem360_admin_assets');

function beem360_sanitize_options(array $input): array {
    $defaults=beem360_defaults(); $output=beem360_options();
    $order=array_filter(array_map('sanitize_key',explode(',',(string)($input['section_order']??''))),fn($v)=>isset(beem360_sections()[$v]));
    $output['section_order']=array_values(array_unique(array_merge($order,array_diff(array_keys(beem360_sections()),$order))));
    $output['enabled']=[]; foreach(beem360_sections() as $key=>$label){$output['enabled'][$key]=empty($input['enabled'][$key])?0:1;}
    foreach(['admin_email','from_email'] as $key){$output[$key]=sanitize_email($input[$key]??'');}
    foreach(['from_name'] as $key){$output[$key]=sanitize_text_field($input[$key]??'');}
    foreach(['login_url','privacy_url','terms_url'] as $key){$output[$key]=esc_url_raw($input[$key]??'');}
    foreach($defaults['copy'] as $key=>$langs){foreach(['en','ar','fr'] as $lang){$output['copy'][$key][$lang]=sanitize_textarea_field(wp_unslash($input['copy'][$key][$lang]??$langs[$lang]));}}
    return $output;
}
function beem360_register_settings(): void { register_setting('beem360_settings','beem360_options',['sanitize_callback'=>'beem360_sanitize_options']); }
add_action('admin_init','beem360_register_settings');

function beem360_settings_page(): void {
    if(!current_user_can('manage_options')) return; $o=beem360_options(); ?>
    <div class="wrap beem-admin"><h1>Beem 360 Theme Control</h1><p>Drag sections into the order you want. Every module is also available as an independent shortcode.</p><form method="post" action="options.php"><?php settings_fields('beem360_settings'); ?>
      <div class="beem-admin-card"><h2>Section order & visibility</h2><input type="hidden" id="beem-section-order" name="beem360_options[section_order]" value="<?php echo esc_attr(implode(',',$o['section_order'])); ?>"><ul id="beem-sortable"><?php foreach($o['section_order'] as $key){if(!isset(beem360_sections()[$key]))continue;?><li data-key="<?php echo esc_attr($key); ?>"><span class="dashicons dashicons-menu"></span><label><input type="checkbox" name="beem360_options[enabled][<?php echo esc_attr($key); ?>]" value="1" <?php checked(!empty($o['enabled'][$key])); ?>> <?php echo esc_html(beem360_sections()[$key]); ?></label><code>[beem_<?php echo esc_html($key); ?>]</code></li><?php } ?></ul></div>
      <div class="beem-admin-card"><h2>Links & email delivery</h2><div class="beem-admin-grid"><?php foreach(['admin_email'=>'Notification email','from_email'=>'Reply-from email','from_name'=>'Reply-from name','login_url'=>'Login URL','privacy_url'=>'Privacy URL','terms_url'=>'Terms URL'] as $key=>$label){?><label><span><?php echo esc_html($label); ?></span><input class="regular-text" name="beem360_options[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($o[$key]); ?>"></label><?php } ?></div></div>
      <div class="beem-admin-card"><h2>Section copy</h2><p>English, Arabic, and French are built in. Polylang selects the active language automatically.</p><?php foreach(beem360_defaults()['copy'] as $key=>$langs){?><details><summary><?php echo esc_html(ucwords(str_replace('_',' ',$key))); ?></summary><div class="beem-admin-grid"><?php foreach(['en'=>'English','ar'=>'العربية','fr'=>'Français'] as $lang=>$label){?><label><span><?php echo esc_html($label); ?></span><textarea rows="3" name="beem360_options[copy][<?php echo esc_attr($key); ?>][<?php echo esc_attr($lang); ?>]" dir="<?php echo $lang==='ar'?'rtl':'ltr'; ?>"><?php echo esc_textarea($o['copy'][$key][$lang]??''); ?></textarea></label><?php } ?></div></details><?php } ?></div>
      <?php submit_button('Save theme settings'); ?></form></div><?php
}

function beem360_mail_page(): void {
    if(!current_user_can('manage_options')) return;
    $notice=''; $recipient=sanitize_text_field(wp_unslash($_GET['recipient']??''));
    if(isset($_POST['beem_send_mail'])){
      check_admin_referer('beem360_send_mail'); $mode=sanitize_key($_POST['recipient_mode']??'single'); $single=sanitize_email(wp_unslash($_POST['recipient']??'')); $subject=sanitize_text_field(wp_unslash($_POST['subject']??'')); $message=wp_kses_post(wp_unslash($_POST['message']??''));
      $recipients=[]; if($mode==='all'){$posts=get_posts(['post_type'=>'beem_inquiry','posts_per_page'=>-1,'fields'=>'ids']);foreach($posts as $id){$mail=sanitize_email(get_post_meta($id,'_beem_email',true));if($mail)$recipients[]=$mail;}}elseif($single){$recipients[]=$single;}
      $recipients=array_values(array_unique(array_filter($recipients,'is_email'))); $sent=0; foreach(array_chunk($recipients,40) as $batch){foreach($batch as $mail){if(wp_mail($mail,$subject,$message,['Content-Type: text/html; charset=UTF-8']))$sent++;}}
      $notice=sprintf('Email sent to %d of %d recipient(s).',$sent,count($recipients));
    } ?>
    <div class="wrap beem-admin"><h1>Email Center</h1><?php if($notice){?><div class="notice notice-success"><p><?php echo esc_html($notice); ?></p></div><?php } ?><div class="beem-admin-card"><form method="post" id="beem-mail-form"><?php wp_nonce_field('beem360_send_mail'); ?><label><span>Recipients</span><select name="recipient_mode" id="beem-recipient-mode"><option value="single">One recipient</option><option value="all">All collected contacts</option></select></label><label id="beem-single-recipient"><span>Email address</span><input type="email" class="regular-text" name="recipient" value="<?php echo esc_attr($recipient); ?>"></label><label><span>Subject</span><input class="large-text" name="subject" required></label><label><span>Email body</span><?php wp_editor('','beem-mail-message',['textarea_name'=>'message','textarea_rows'=>12,'media_buttons'=>false]); ?></label><p><button type="button" class="button" id="beem-preview-mail">Preview email</button> <button type="submit" class="button button-primary" name="beem_send_mail" value="1">Send email</button></p></form><div id="beem-mail-preview" hidden><div class="beem-email-preview"><h2 data-preview-subject></h2><div data-preview-body></div></div></div></div></div><?php
}
