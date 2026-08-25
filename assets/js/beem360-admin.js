jQuery(function($){
  const sectionOrder=$('#beem-sortable');
  if(sectionOrder.length)sectionOrder.sortable({handle:'.dashicons-menu',update(){const keys=sectionOrder.children().map(function(){return $(this).data('key')}).get();$('#beem-section-order').val(keys.join(','))}});
  $('.beem-admin-tabs').on('click','button',function(){const tab=$(this).data('admin-tab');$(this).addClass('is-active').siblings().removeClass('is-active');$('[data-admin-panel]').prop('hidden',true);$(`[data-admin-panel="${tab}"]`).prop('hidden',false)});
  $('.beem-repeater-list').sortable({handle:'.beem-drag',items:'>.beem-repeater-item',placeholder:'beem-sort-placeholder'});
  $('.beem-admin').on('click','.beem-toggle-item',function(){$(this).closest('.beem-repeater-item').toggleClass('is-open')});
  $('.beem-admin').on('click','.beem-remove-item',function(){if(window.confirm('Remove this item?'))$(this).closest('.beem-repeater-item').remove()});
  $('.beem-admin').on('click','.beem-restore-defaults',function(){return window.confirm('Restore all English, Arabic, and French homepage, repeatable, and legal content to their defaults? Your images, account links, and email settings will be kept.')});
  $('.beem-admin').on('click','.beem-add-item',function(){const repeater=$(this).closest('.beem-repeater');const template=repeater.find('template').html();const index=`new_${Date.now()}_${Math.floor(Math.random()*1000)}`;repeater.find('.beem-repeater-list').append(template.replaceAll('__INDEX__',index))});
  $('.beem-admin').on('input','input[name*="[title][en]"],input[name*="[label][en]"]',function(){$(this).closest('.beem-repeater-item').find('.beem-item-title').first().text(this.value||'New item')});
  $('.beem-admin').on('click','.beem-choose-media',function(){const wrap=$(this).closest('.beem-media-field');const frame=wp.media({title:'Choose an image',button:{text:'Use this image'},multiple:false});frame.on('select',()=>{const item=frame.state().get('selection').first().toJSON();wrap.find('input').val(item.url);wrap.find('.beem-media-preview').html(`<img src="${item.url}" alt="">`)});frame.open()});
  $('#beem-recipient-mode').on('change',function(){$('#beem-single-recipient').toggle(this.value==='single')});
  $('#beem-preview-mail').on('click',function(){if(window.tinyMCE)window.tinyMCE.triggerSave();const subject=$('[name="subject"]').val()||'(No subject)';const body=$('[name="message"]').val()||'<p>(Empty email)</p>';const preview=$('#beem-mail-preview');preview.find('[data-preview-subject]').text(subject);preview.find('[data-preview-body]').html(body);preview.prop('hidden',false)[0].scrollIntoView({behavior:'smooth',block:'start'})});
});
