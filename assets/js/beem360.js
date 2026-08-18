(()=>{'use strict';
const nav=document.getElementById('beemNav');const onScroll=()=>nav&&nav.classList.toggle('is-scrolled',scrollY>30);addEventListener('scroll',onScroll,{passive:true});onScroll();
const reduced=matchMedia('(prefers-reduced-motion: reduce)').matches;if(!reduced&&'IntersectionObserver'in window){const io=new IntersectionObserver(entries=>entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('is-in');io.unobserve(entry.target)}}),{threshold:.12});document.querySelectorAll('.beem-reveal,.beem-reveal-scale').forEach(el=>io.observe(el))}else document.querySelectorAll('.beem-reveal,.beem-reveal-scale').forEach(el=>el.classList.add('is-in'));
document.querySelectorAll('.beem-spot').forEach(el=>el.addEventListener('pointermove',event=>{const box=el.getBoundingClientRect();el.style.setProperty('--mx',`${(event.clientX-box.left)/box.width*100}%`);el.style.setProperty('--my',`${(event.clientY-box.top)/box.height*100}%`)}));
document.querySelectorAll('[data-count]').forEach(el=>{const target=Number(el.dataset.count);let start;const run=time=>{start??=time;const p=Math.min(1,(time-start)/1400);el.textContent=String(Math.round(target*(1-Math.pow(1-p,3))));if(p<1)requestAnimationFrame(run)};requestAnimationFrame(run)});
document.querySelectorAll('[data-beem-modal]').forEach(button=>button.addEventListener('click',()=>{const modal=document.getElementById(`beem-${button.dataset.beemModal}-modal`);if(modal&&window.bootstrap)bootstrap.Modal.getOrCreateInstance(modal).show()}));
document.querySelectorAll('.beem-nav-links a').forEach(link=>link.addEventListener('click',()=>{const collapse=document.getElementById('beemNavLinks');if(collapse?.classList.contains('show')&&window.bootstrap)bootstrap.Collapse.getOrCreateInstance(collapse).hide()}));
document.querySelectorAll('.beem-inquiry-form').forEach(form=>{
  const nonce=form.querySelector('[name="nonce"]');if(nonce)nonce.value=window.Beem360?.nonce||'';
  const phone=form.querySelector('.beem-phone-input');let phonePlugin=null;
  if(phone&&window.intlTelInput){phonePlugin=window.intlTelInput(phone,{initialCountry:'sa',onlyCountries:window.Beem360?.phoneCountries||['sa'],countrySearch:true,separateDialCode:true,strictMode:true,loadUtils:()=>import(window.Beem360.phoneUtils)});}
  form.addEventListener('submit',async event=>{
    event.preventDefault();const button=form.querySelector('[type="submit"]');const status=form.querySelector('.beem-form-status');const original=button.innerHTML;status.className='beem-form-status';status.textContent='';
    try{
      if(phonePlugin){await phonePlugin.promise;if(!phonePlugin.isValidNumber())throw new Error(window.Beem360?.invalidPhone||'Enter a valid phone number.');form.querySelector('[name="phone_full"]').value=phonePlugin.getNumber();form.querySelector('[name="phone_country"]').value=phonePlugin.getSelectedCountryData().iso2||'';}
      button.disabled=true;button.textContent=window.Beem360?.sending||'Sending…';const response=await fetch(window.Beem360.ajaxUrl,{method:'POST',body:new FormData(form),credentials:'same-origin'});const json=await response.json();if(!json.success)throw new Error(json.data?.message||'Unable to send your request.');status.classList.add('is-success');status.textContent=json.data.message;form.reset();phonePlugin?.setCountry('sa');if(nonce)nonce.value=window.Beem360.nonce;
    }catch(error){status.classList.add('is-error');status.textContent=error.message}finally{button.disabled=false;button.innerHTML=original;}
  });
});
})();
