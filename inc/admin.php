<?php
if (!defined('ABSPATH')) { exit; }

function beem360_admin_menu(): void {
    add_menu_page('Beem View 360','Beem View 360','manage_options','beem360','beem360_settings_page','dashicons-admin-customizer',3);
    add_submenu_page('beem360','Theme control','Theme control','manage_options','beem360','beem360_settings_page');
    add_submenu_page('beem360','Inquiries','Inquiries','edit_posts','edit.php?post_type=beem_inquiry');
    add_submenu_page('beem360','Email center','Email center','manage_options','beem360-mail','beem360_mail_page');
}
add_action('admin_menu','beem360_admin_menu');

function beem360_admin_assets(string $hook): void {
    if(strpos($hook,'beem360')===false && get_post_type()!=='beem_inquiry') return;
    wp_enqueue_media();
    wp_enqueue_style('beem360-admin',BEEM360_URI.'/assets/css/beem360-admin.css',[],beem360_asset_version('assets/css/beem360-admin.css'));
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('beem360-admin',BEEM360_URI.'/assets/js/beem360-admin.js',['jquery','jquery-ui-sortable'],beem360_asset_version('assets/js/beem360-admin.js'),true);
}
add_action('admin_enqueue_scripts','beem360_admin_assets');

function beem360_repeater_schemas(): array {
    $langs=['en'=>'English','ar'=>'العربية','fr'=>'Français'];
    return [
      'navigation'=>['title'=>'Header navigation','description'=>'Menu labels and destinations. Hash links return to the homepage from inner pages.','fields'=>['label'=>['label'=>'Label','type'=>'i18n_text','langs'=>$langs],'url'=>['label'=>'URL or section hash','type'=>'url_text'],'icon'=>['label'=>'Bootstrap icon class','type'=>'text']]],
      'pillars'=>['title'=>'Four pillar cards','description'=>'Add, remove, reorder, link, or replace every platform card.','fields'=>['title'=>['label'=>'Title','type'=>'i18n_text','langs'=>$langs],'text'=>['label'=>'Description','type'=>'i18n_textarea','langs'=>$langs],'chips'=>['label'=>'Chips — one per line','type'=>'i18n_textarea','langs'=>$langs],'icon'=>['label'=>'Bootstrap icon class','type'=>'text'],'color'=>['label'=>'Color','type'=>'select','options'=>['blue'=>'Blue','orange'=>'Orange','teal'=>'Teal']],'image'=>['label'=>'Card image','type'=>'image'],'url'=>['label'=>'Optional card link','type'=>'url_text']]],
      'problem_bad'=>['title'=>'Problem rows','description'=>'Items in the “without Beem View 360” card.','fields'=>['label'=>['label'=>'Item','type'=>'i18n_text','langs'=>$langs],'meta'=>['label'=>'Location / state','type'=>'i18n_text','langs'=>$langs]]],
      'problem_good'=>['title'=>'Solution comparison rows','description'=>'Items in the connected Beem View 360 card.','fields'=>['label'=>['label'=>'Item','type'=>'i18n_text','langs'=>$langs],'meta'=>['label'=>'Location / state','type'=>'i18n_text','langs'=>$langs]]],
      'hub_left'=>['title'=>'Connected hub — left','description'=>'Items on the left side of the system graphic.','fields'=>['label'=>['label'=>'Label','type'=>'i18n_text','langs'=>$langs],'icon'=>['label'=>'Bootstrap icon class','type'=>'text']]],
      'hub_right'=>['title'=>'Connected hub — right','description'=>'Items on the right side of the system graphic.','fields'=>['label'=>['label'=>'Label','type'=>'i18n_text','langs'=>$langs],'icon'=>['label'=>'Bootstrap icon class','type'=>'text']]],
      'features'=>['title'=>'Feature breakdowns','description'=>'Every feature row is editable and sortable. Use “workspace” as the primary image value to keep the interactive mockup.','fields'=>['id'=>['label'=>'Section ID','type'=>'text'],'tag'=>['label'=>'Tag','type'=>'i18n_text','langs'=>$langs],'title'=>['label'=>'Title','type'=>'i18n_text','langs'=>$langs],'text'=>['label'=>'Description','type'=>'i18n_textarea','langs'=>$langs],'bullets'=>['label'=>'Bullet points — one per line','type'=>'i18n_textarea','langs'=>$langs],'icon'=>['label'=>'Bootstrap icon class','type'=>'text'],'color'=>['label'=>'Color','type'=>'select','options'=>['blue'=>'Blue','orange'=>'Orange','teal'=>'Teal']],'image'=>['label'=>'Primary image','type'=>'image'],'image_secondary'=>['label'=>'Secondary image','type'=>'image'],'url'=>['label'=>'Optional learn-more URL','type'=>'url_text']]],
      'footer_links'=>['title'=>'Footer links','description'=>'Choose a different WordPress page for each language. The URL is retained as a fallback when no page is selected.','fields'=>['label'=>['label'=>'Label','type'=>'i18n_text','langs'=>$langs],'page'=>['label'=>'Page for each language','type'=>'i18n_page','langs'=>$langs],'url'=>['label'=>'Fallback URL','type'=>'url_text']]],
    ];
}

function beem360_sanitize_repeater(array $items,array $fields): array {
    $clean=[];
    foreach(array_values($items) as $item){if(!is_array($item))continue;$row=[];foreach($fields as $key=>$field){$type=$field['type'];$value=$item[$key]??'';if(str_starts_with($type,'i18n_')){foreach(['en','ar','fr'] as $lang){$raw=wp_unslash((string)($value[$lang]??''));$row[$key][$lang]=$type==='i18n_page'?absint($raw):($type==='i18n_textarea'?sanitize_textarea_field($raw):sanitize_text_field($raw));}}elseif($type==='image'){$raw=trim(wp_unslash((string)$value));$row[$key]=$raw==='workspace'?'workspace':esc_url_raw($raw);}elseif($type==='url_text'){$raw=trim(wp_unslash((string)$value));$row[$key]=str_starts_with($raw,'#')?sanitize_text_field($raw):esc_url_raw($raw);}else{$row[$key]=sanitize_text_field(wp_unslash((string)$value));}}$clean[]=$row;}
    return $clean;
}

function beem360_sanitize_options(array $input): array {
    $defaults=beem360_defaults(); $output=beem360_options();
    $order=array_filter(array_map('sanitize_key',explode(',',(string)($input['section_order']??''))),fn($v)=>isset(beem360_sections()[$v]));
    $output['section_order']=array_values(array_unique(array_merge($order,array_diff(array_keys(beem360_sections()),$order))));
    $output['enabled']=[]; foreach(beem360_sections() as $key=>$label){$output['enabled'][$key]=empty($input['enabled'][$key])?0:1;}
    foreach(['admin_email','from_email'] as $key){$output[$key]=sanitize_email($input[$key]??'');}
    foreach(['from_name'] as $key){$output[$key]=sanitize_text_field($input[$key]??'');}
    foreach(['login_url','register_url','privacy_url','terms_url'] as $key){if(array_key_exists($key,$input))$output[$key]=esc_url_raw($input[$key]);}
    foreach(['logo','hero_primary','hero_secondary','cta_logo'] as $key){$output['media'][$key]=esc_url_raw($input['media'][$key]??($output['media'][$key]??''));}
    foreach(beem360_repeater_schemas() as $group=>$schema){if(!empty($input['items_present'][$group])){$output['items'][$group]=beem360_sanitize_repeater((array)($input['items'][$group]??[]),$schema['fields']);}}
    foreach($defaults['copy'] as $key=>$langs){foreach(['en','ar','fr'] as $lang){$output['copy'][$key][$lang]=sanitize_textarea_field(wp_unslash($input['copy'][$key][$lang]??$langs[$lang]));}}
    return $output;
}
function beem360_register_settings(): void { register_setting('beem360_settings','beem360_options',['sanitize_callback'=>'beem360_sanitize_options']); }
add_action('admin_init','beem360_register_settings');

function beem360_admin_field(string $group,string $index,string $key,array $field,mixed $value): void {
    $base='beem360_options[items]['.$group.']['.$index.']['.$key.']';$type=$field['type'];
    if(str_starts_with($type,'i18n_')){echo '<div class="beem-lang-grid">';foreach($field['langs'] as $lang=>$label){$v=is_array($value)?($value[$lang]??''):'';echo '<label><span>'.esc_html($label).'</span>';if($type==='i18n_textarea')echo '<textarea rows="3" name="'.esc_attr($base.'['.$lang.']').'" dir="'.($lang==='ar'?'rtl':'ltr').'">'.esc_textarea($v).'</textarea>';elseif($type==='i18n_page'){echo '<select name="'.esc_attr($base.'['.$lang.']').'">';echo '<option value="">— Select page —</option>';foreach(beem360_admin_language_pages($lang,absint($v)) as $page)echo '<option value="'.esc_attr((string)$page->ID).'" '.selected(absint($v),$page->ID,false).'>'.esc_html($page->post_title ?: ('Page #'.$page->ID)).'</option>';echo '</select>';}else echo '<input type="text" name="'.esc_attr($base.'['.$lang.']').'" value="'.esc_attr($v).'" dir="'.($lang==='ar'?'rtl':'ltr').'">';echo '</label>';}echo '</div>';return;}
    echo '<label class="beem-field"><span class="screen-reader-text">'.esc_html($field['label']).'</span>';
    if($type==='select'){echo '<select name="'.esc_attr($base).'">';foreach($field['options'] as $option=>$label)echo '<option value="'.esc_attr($option).'" '.selected($value,$option,false).'>'.esc_html($label).'</option>';echo '</select>';}
    elseif($type==='image'){echo '<div class="beem-media-field"><input type="text" name="'.esc_attr($base).'" value="'.esc_attr((string)$value).'" placeholder="Image URL"><button type="button" class="button beem-choose-media">Choose image</button><div class="beem-media-preview">'.(($value&&$value!=='workspace')?'<img src="'.esc_url((string)$value).'" alt="">':'').'</div></div>';}
    else echo '<input type="text" name="'.esc_attr($base).'" value="'.esc_attr((string)$value).'">';echo '</label>';
}

function beem360_admin_language_pages(string $lang,int $selected=0): array {
    $args=['post_type'=>'page','post_status'=>'publish','posts_per_page'=>-1,'orderby'=>'title','order'=>'ASC','suppress_filters'=>false];
    if(function_exists('pll_get_post_language'))$args['lang']=$lang;
    $pages=get_posts($args);
    if($selected&&!array_filter($pages,static fn($page)=>$page->ID===$selected)){$page=get_post($selected);if($page&&$page->post_type==='page')$pages[]=$page;}
    return $pages;
}

function beem360_admin_repeater(string $group,array $schema,array $items): void { ?>
 <section class="beem-repeater" data-group="<?php echo esc_attr($group); ?>"><input type="hidden" name="beem360_options[items_present][<?php echo esc_attr($group); ?>]" value="1"><div class="beem-repeater-heading"><div><h3><?php echo esc_html($schema['title']); ?></h3><p><?php echo esc_html($schema['description']); ?></p></div><button type="button" class="button button-primary beem-add-item"><span class="dashicons dashicons-plus-alt2"></span> Add item</button></div><div class="beem-repeater-list">
 <?php foreach($items as $index=>$item){$title=$item['title']??$item['label']??'';?><article class="beem-repeater-item"><header><span class="dashicons dashicons-menu beem-drag"></span><strong class="beem-item-title"><?php echo esc_html(is_array($title)?($title['en']??'Item'):$title); ?></strong><button type="button" class="button-link-delete beem-remove-item">Remove</button><button type="button" class="button-link beem-toggle-item"><span class="dashicons dashicons-arrow-down-alt2"></span></button></header><div class="beem-repeater-fields"><?php foreach($schema['fields'] as $key=>$field){?><div class="beem-control-field"><b><?php echo esc_html($field['label']); ?></b><?php beem360_admin_field($group,(string)$index,$key,$field,$item[$key]??''); ?></div><?php } ?></div></article><?php } ?>
 </div><template class="beem-item-template"><article class="beem-repeater-item is-open"><header><span class="dashicons dashicons-menu beem-drag"></span><strong class="beem-item-title">New item</strong><button type="button" class="button-link-delete beem-remove-item">Remove</button><button type="button" class="button-link beem-toggle-item"><span class="dashicons dashicons-arrow-down-alt2"></span></button></header><div class="beem-repeater-fields"><?php foreach($schema['fields'] as $key=>$field){?><div class="beem-control-field"><b><?php echo esc_html($field['label']); ?></b><?php beem360_admin_field($group,'__INDEX__',$key,$field,''); ?></div><?php } ?></div></article></template></section>
<?php }

function beem360_settings_page(): void {
    if(!current_user_can('manage_options')) return; $o=beem360_options(); ?>
    <div class="wrap beem-admin"><div class="beem-admin-hero"><div><span>BEEM VIEW 360</span><h1>Theme Control Center</h1><p>Manage every section, image, link, language, and repeatable item from one place.</p></div><div class="beem-save-hint"><span class="dashicons dashicons-saved"></span> Save after editing</div></div><form method="post" action="options.php"><?php settings_fields('beem360_settings'); ?><nav class="beem-admin-tabs"><button type="button" class="is-active" data-admin-tab="layout">Layout & copy</button><button type="button" data-admin-tab="items">Repeatable items</button><button type="button" data-admin-tab="contact">Images, links & email</button></nav><div data-admin-panel="layout">
      <div class="beem-admin-card"><h2>Section order & visibility</h2><input type="hidden" id="beem-section-order" name="beem360_options[section_order]" value="<?php echo esc_attr(implode(',',$o['section_order'])); ?>"><ul id="beem-sortable"><?php foreach($o['section_order'] as $key){if(!isset(beem360_sections()[$key]))continue;?><li data-key="<?php echo esc_attr($key); ?>"><span class="dashicons dashicons-menu"></span><label><input type="checkbox" name="beem360_options[enabled][<?php echo esc_attr($key); ?>]" value="1" <?php checked(!empty($o['enabled'][$key])); ?>> <?php echo esc_html(beem360_sections()[$key]); ?></label><code>[beem_<?php echo esc_html($key); ?>]</code></li><?php } ?></ul></div>
      <div class="beem-admin-card"><h2>Section copy</h2><p>English, Arabic, and French are built in. Polylang selects the active language automatically.</p><?php foreach(beem360_defaults()['copy'] as $key=>$langs){?><details><summary><?php echo esc_html(ucwords(str_replace('_',' ',$key))); ?></summary><div class="beem-admin-grid"><?php foreach(['en'=>'English','ar'=>'العربية','fr'=>'Français'] as $lang=>$label){?><label><span><?php echo esc_html($label); ?></span><textarea rows="3" name="beem360_options[copy][<?php echo esc_attr($key); ?>][<?php echo esc_attr($lang); ?>]" dir="<?php echo $lang==='ar'?'rtl':'ltr'; ?>"><?php echo esc_textarea($o['copy'][$key][$lang]??''); ?></textarea></label><?php } ?></div></details><?php } ?></div>
      </div><div data-admin-panel="items" hidden><div class="beem-admin-card beem-repeaters-card"><h2>Repeatable content</h2><p>Drag items to reorder. Open a row to edit languages, images, icons, and links.</p><?php foreach(beem360_repeater_schemas() as $group=>$schema)beem360_admin_repeater($group,$schema,(array)($o['items'][$group]??[])); ?></div></div><div data-admin-panel="contact" hidden>
      <div class="beem-admin-card"><h2>Global images</h2><p>The initial images come from the supplied design.</p><div class="beem-admin-grid"><?php foreach(['logo'=>'Header & footer logo','hero_primary'=>'Hero primary screenshot','hero_secondary'=>'Hero secondary screenshot','cta_logo'=>'CTA logo'] as $key=>$label){?><label><span><?php echo esc_html($label); ?></span><div class="beem-media-field"><input name="beem360_options[media][<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($o['media'][$key]??''); ?>"><button type="button" class="button beem-choose-media">Choose image</button><div class="beem-media-preview"><img src="<?php echo esc_url($o['media'][$key]??''); ?>" alt=""></div></div></label><?php } ?></div></div>
      <div class="beem-admin-card"><h2>Account links & email delivery</h2><p>Footer links are managed as repeatable items in the previous tab.</p><div class="beem-admin-grid"><?php foreach(['admin_email'=>'Notification email','from_email'=>'Reply-from email','from_name'=>'Reply-from name','login_url'=>'Login URL','register_url'=>'Register URL'] as $key=>$label){?><label><span><?php echo esc_html($label); ?></span><input class="regular-text" name="beem360_options[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($o[$key]); ?>"></label><?php } ?></div></div></div>
      <div class="beem-sticky-save"><?php submit_button('Save all theme settings','primary','submit',false); ?></div></form></div><?php
}

function beem360_mail_page(): void {
    if(!current_user_can('manage_options')) return;
    $notice=''; $recipient=sanitize_text_field(wp_unslash($_GET['recipient']??''));
    if(isset($_POST['beem_send_mail'])){
      check_admin_referer('beem360_send_mail'); $mode=sanitize_key($_POST['recipient_mode']??'single'); $single=sanitize_email(wp_unslash($_POST['recipient']??'')); $subject=sanitize_text_field(wp_unslash($_POST['subject']??'')); $message=wp_kses_post(wp_unslash($_POST['message']??''));
      $recipients=[]; if($mode==='all'){$posts=get_posts(['post_type'=>'beem_inquiry','posts_per_page'=>-1,'fields'=>'ids']);foreach($posts as $id){$mail=sanitize_email(get_post_meta($id,'_beem_email',true));if($mail)$recipients[]=$mail;}}elseif($single){$recipients[]=$single;}
      $recipients=array_values(array_unique(array_filter($recipients,'is_email')));$mail_options=beem360_options();$headers=['Content-Type: text/html; charset=UTF-8'];if(is_email($mail_options['from_email']))$headers[]='From: '.sanitize_text_field($mail_options['from_name']).' <'.sanitize_email($mail_options['from_email']).'>';$sent=0; foreach(array_chunk($recipients,40) as $batch){foreach($batch as $mail){if(wp_mail($mail,$subject,$message,$headers))$sent++;}}
      $notice=sprintf('Email sent to %d of %d recipient(s).',$sent,count($recipients));
    } ?>
    <div class="wrap beem-admin"><h1>Email Center</h1><?php if($notice){?><div class="notice notice-success"><p><?php echo esc_html($notice); ?></p></div><?php } ?><div class="beem-admin-card"><form method="post" id="beem-mail-form"><?php wp_nonce_field('beem360_send_mail'); ?><label><span>Recipients</span><select name="recipient_mode" id="beem-recipient-mode"><option value="single">One recipient</option><option value="all">All collected contacts</option></select></label><label id="beem-single-recipient"><span>Email address</span><input type="email" class="regular-text" name="recipient" value="<?php echo esc_attr($recipient); ?>"></label><label><span>Subject</span><input class="large-text" name="subject" required></label><label><span>Email body</span><?php wp_editor('','beem-mail-message',['textarea_name'=>'message','textarea_rows'=>12,'media_buttons'=>false]); ?></label><p><button type="button" class="button" id="beem-preview-mail">Preview email</button> <button type="submit" class="button button-primary" name="beem_send_mail" value="1">Send email</button></p></form><div id="beem-mail-preview" hidden><div class="beem-email-preview"><h2 data-preview-subject></h2><div data-preview-body></div></div></div></div></div><?php
}
