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
    $phone=sanitize_text_field(wp_unslash($_POST['phone']??''));
    $company=sanitize_text_field(wp_unslash($_POST['company']??''));
    $message=sanitize_textarea_field(wp_unslash($_POST['message']??''));
    $type=in_array($_POST['inquiry_type']??'', ['request','contact'], true) ? $_POST['inquiry_type'] : 'contact';
    if (!$name || !is_email($email) || !$message) { wp_send_json_error(['message'=>__('Please complete the required fields.','beem360')],422); }
    $id=wp_insert_post(['post_type'=>'beem_inquiry','post_status'=>'publish','post_title'=>$name.' — '.$email]);
    if (is_wp_error($id)) { wp_send_json_error(['message'=>__('Your request could not be saved. Please try again.','beem360')],500); }
    foreach(compact('name','email','phone','company','message','type') as $key=>$value){update_post_meta($id,'_beem_'.$key,$value);}
    update_post_meta($id,'_beem_status','new');
    update_post_meta($id,'_beem_locale',beem360_lang());
    $options=beem360_options();
    $subject=sprintf('[Beem 360] %s from %s', $type==='request'?'Demo request':'Contact message', $name);
    $body="Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nCompany: {$company}\nType: {$type}\n\n{$message}\n\nView: ".admin_url('post.php?post='.$id.'&action=edit');
    wp_mail($options['admin_email'],$subject,$body,['Reply-To: '.$name.' <'.$email.'>']);
    wp_send_json_success(['message'=>beem360_lang()==='ar'?'شكرًا لك. تم استلام طلبك وسنتواصل معك قريبًا.':(beem360_lang()==='fr'?'Merci. Votre demande a été reçue et nous vous contacterons bientôt.':'Thank you. Your request was received and we will contact you shortly.')]);
}
add_action('wp_ajax_beem360_submit_inquiry','beem360_submit_inquiry');
add_action('wp_ajax_nopriv_beem360_submit_inquiry','beem360_submit_inquiry');

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
    $fields=['name'=>'Name','email'=>'Email','phone'=>'Phone','company'=>'Company','type'=>'Type','locale'=>'Language'];
    echo '<table class="widefat striped"><tbody>';
    foreach($fields as $key=>$label){$value=get_post_meta($post->ID,'_beem_'.$key,true);echo '<tr><th style="width:150px">'.esc_html($label).'</th><td>'.esc_html((string)$value).'</td></tr>';}
    echo '<tr><th>Message</th><td>'.nl2br(esc_html((string)get_post_meta($post->ID,'_beem_message',true))).'</td></tr></tbody></table>';
    $email=get_post_meta($post->ID,'_beem_email',true);
    echo '<p><a class="button button-primary" href="'.esc_url(admin_url('admin.php?page=beem360-mail&recipient='.rawurlencode($email))).'">'.esc_html__('Reply by email','beem360').'</a></p>';
}

