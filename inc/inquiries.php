<?php
if (!defined('ABSPATH')) { exit; }

function beem360_register_inquiries(): void {
    register_post_type('beem_inquiry', [
      'labels'=>['name'=>__('Inquiries','beem360'),'singular_name'=>__('Inquiry','beem360'),'menu_name'=>__('Inquiries','beem360'),'all_items'=>__('All inquiries','beem360'),'edit_item'=>__('View inquiry','beem360')],
      'public'=>false,'show_ui'=>true,'show_in_menu'=>false,'supports'=>['title'],'capability_type'=>'post','map_meta_cap'=>true,
    ]);
}
add_action('init','beem360_register_inquiries');

function beem360_submit_inquiry(): void {
    check_ajax_referer('beem360_inquiry','nonce');
    $name=sanitize_text_field(wp_unslash($_POST['name']??''));
    $email=sanitize_email(wp_unslash($_POST['email']??''));
    $phone=sanitize_text_field(wp_unslash($_POST['phone_full']??$_POST['phone']??''));
    $country=sanitize_key(wp_unslash($_POST['phone_country']??''));
    $company=sanitize_text_field(wp_unslash($_POST['company']??''));
    $message=sanitize_textarea_field(wp_unslash($_POST['message']??''));
    $type=in_array($_POST['inquiry_type']??'', ['request','contact'], true) ? $_POST['inquiry_type'] : 'contact';
    $allowed_countries=['sa','ae','kw','qa','bh','om','eg','jo','lb','iq','sy','ye','ps','ma','dz','tn','ly','sd','so','dj','mr','km'];
    if (!$name || !is_email($email) || !preg_match('/^\+[1-9][0-9]{6,14}$/',$phone) || !$company || !$message || !in_array($country,$allowed_countries,true)) { wp_send_json_error(['message'=>__('Please complete every field with valid information.','beem360')],422); }
    $id=wp_insert_post(['post_type'=>'beem_inquiry','post_status'=>'publish','post_title'=>$name.' — '.$email]);
    if (is_wp_error($id)) { wp_send_json_error(['message'=>__('Your request could not be saved. Please try again.','beem360')],500); }
    foreach(compact('name','email','phone','country','company','message','type') as $key=>$value){update_post_meta($id,'_beem_'.$key,$value);}
    update_post_meta($id,'_beem_status','new');
    update_post_meta($id,'_beem_locale',beem360_lang());
    $options=beem360_options();
    $subject=sprintf('[Beem 360] %s from %s', $type==='request'?'Demo request':'Contact message', $name);
    $body="Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nCountry: ".strtoupper($country)."\nCompany: {$company}\nType: {$type}\n\n{$message}\n\nView: ".admin_url('post.php?post='.$id.'&action=edit');
    $from_name=sanitize_text_field($options['from_name']);$from_email=sanitize_email($options['from_email']);
    $admin_headers=['Reply-To: '.$name.' <'.$email.'>'];if($from_email)$admin_headers[]='From: '.$from_name.' <'.$from_email.'>';
    wp_mail($options['admin_email'],$subject,$body,$admin_headers);
    $thanks_headers=['Content-Type: text/html; charset=UTF-8'];if($from_email)$thanks_headers[]='From: '.$from_name.' <'.$from_email.'>';if(is_email($options['admin_email']))$thanks_headers[]='Reply-To: '.$from_name.' <'.$options['admin_email'].'>';
    $thanks_sent=wp_mail($email,beem360_t('thankyou_subject'),beem360_thankyou_email($name),$thanks_headers);
    update_post_meta($id,'_beem_thankyou_sent',$thanks_sent?'yes':'no');
    wp_send_json_success(['message'=>beem360_t('form_success')]);
}
add_action('wp_ajax_beem360_submit_inquiry','beem360_submit_inquiry');
add_action('wp_ajax_nopriv_beem360_submit_inquiry','beem360_submit_inquiry');

function beem360_thankyou_email(string $name): string {
    $logo=beem360_options()['media']['logo']??'';$title=beem360_t('thankyou_title');$text=beem360_t('thankyou_text');$register=beem360_register_url();
    return '<!doctype html><html><body style="margin:0;background:#f3f7f9;font-family:Arial,sans-serif;color:#132433"><table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f3f7f9;padding:32px 14px"><tr><td align="center"><table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width:600px;background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 18px 55px rgba(16,41,59,.12)"><tr><td style="height:8px;background:linear-gradient(90deg,#1e96be,#5ab4a0,#faaa3c)"></td></tr><tr><td style="padding:34px 38px 15px"><table role="presentation"><tr><td><img src="'.esc_url($logo).'" width="48" height="48" alt="Beem 360" style="display:block"></td><td style="padding-left:12px;font-size:21px;font-weight:800;color:#1e96be">Beem <span style="color:#faaa3c">360</span></td></tr></table></td></tr><tr><td style="padding:14px 38px 38px"><p style="margin:0 0 12px;color:#5a6a78">'.esc_html(beem360_x('Hello','مرحبًا','Bonjour')).' '.esc_html($name).',</p><h1 style="font-size:30px;line-height:1.2;margin:0 0 16px;color:#132433">'.esc_html($title).'</h1><p style="font-size:16px;line-height:1.75;color:#5a6a78;margin:0 0 26px">'.esc_html($text).'</p><a href="'.esc_url($register).'" style="display:inline-block;background:#1e96be;color:#fff;text-decoration:none;font-weight:700;padding:14px 24px;border-radius:11px">'.esc_html(beem360_x('Explore Beem 360','استكشف Beem 360','Découvrir Beem 360')).'</a></td></tr><tr><td style="background:#10293b;color:rgba(255,255,255,.65);padding:18px 38px;font-size:12px">© '.esc_html(wp_date('Y')).' Beem 360</td></tr></table></td></tr></table></body></html>';
}

function beem360_inquiry_columns(array $columns): array {
    return ['cb'=>$columns['cb'],'title'=>__('Contact','beem360'),'beem_type'=>__('Type','beem360'),'beem_company'=>__('Company','beem360'),'beem_status'=>__('Status','beem360'),'date'=>$columns['date']];
}
add_filter('manage_beem_inquiry_posts_columns','beem360_inquiry_columns');
function beem360_inquiry_column(string $column,int $id): void {
    if($column==='beem_type') echo esc_html(ucfirst((string)get_post_meta($id,'_beem_type',true)));
    if($column==='beem_company') echo esc_html((string)get_post_meta($id,'_beem_company',true));
    if($column==='beem_status') echo '<span class="beem-admin-status">'.esc_html(ucfirst((string)get_post_meta($id,'_beem_status',true)?:'new')).'</span>';
}
add_action('manage_beem_inquiry_posts_custom_column','beem360_inquiry_column',10,2);

function beem360_inquiry_box(): void {
    add_meta_box('beem360-inquiry-detail',__('Inquiry details','beem360'),'beem360_render_inquiry_box','beem_inquiry','normal','high');
}
add_action('add_meta_boxes','beem360_inquiry_box');
function beem360_render_inquiry_box(WP_Post $post): void {
    $fields=['name'=>'Name','email'=>'Email','phone'=>'Phone','country'=>'Country','company'=>'Company','type'=>'Type','locale'=>'Language','thankyou_sent'=>'Thank-you email sent'];
    echo '<table class="widefat striped"><tbody>';
    foreach($fields as $key=>$label){$value=get_post_meta($post->ID,'_beem_'.$key,true);echo '<tr><th style="width:150px">'.esc_html($label).'</th><td>'.esc_html((string)$value).'</td></tr>';}
    echo '<tr><th>Message</th><td>'.nl2br(esc_html((string)get_post_meta($post->ID,'_beem_message',true))).'</td></tr></tbody></table>';
    $email=get_post_meta($post->ID,'_beem_email',true);
    echo '<p><a class="button button-primary" href="'.esc_url(admin_url('admin.php?page=beem360-mail&recipient='.rawurlencode($email))).'">'.esc_html__('Reply by email','beem360').'</a></p>';
}
