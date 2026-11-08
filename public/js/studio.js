(() => {
  const translations = {
    id: {navCatalog:'Katalog Web',navContact:'Konsultasi Kustom',navMain:'Portofolio Utama',hero1:'Dari konsep abstrak menjadi',hero2:'website nyata yang menghasilkan.',heroDesc:'Jelajahi inspirasi website untuk berbagai bidang, atau ceritakan ide Anda untuk solusi yang dibuat sesuai kebutuhan.',explore:'Jelajahi katalog',webTab:'Website Development',designTab:'Graphic Design',soon:'Segera hadir',collection:'THE COLLECTION / 01',catalogTitle:'Temukan inspirasi Anda.',catalogDesc:'22 contoh landing page, dirancang untuk berbagai ide dan industri. Pilih kategori untuk menjelajah.',all:'Semua',creative:'Agensi & Bisnis',spaces:'Arsitektur & Properti',tech:'Teknologi & AI',finance:'Keuangan',legal:'Hukum & Regulasi',energy:'Energi & Industri',adventure:'Olahraga & Petualangan',education:'Pendidikan',fullPreview:'Preview lengkap',askProject:'Diskusikan model ini',designTitle:'Layanan desain grafis segera hadir.',designDesc:'Identitas visual, branding, dan materi promosi akan hadir di sini.',contactWa:'Hubungi via WhatsApp',contactMe:'Hubungi saya',servicesLabel:'LAYANAN WEBSITE',servicesTitle:'Dibuat sesuai kebutuhan Anda.',servicesDesc:'Punya kebutuhan di luar contoh landing page? Pilih layanan untuk memulai percakapan.',service1:'Landing Page',service1Desc:'Untuk promosi produk, bisnis, atau acara.',service2:'Company Profile',service2Desc:'Perkenalkan bisnis dan layanan Anda secara profesional.',service3:'Undangan Digital',service3Desc:'Hadirkan informasi acara dalam undangan interaktif.',service4:'Portofolio Profesional',service4Desc:'Tampilkan karya dan perjalanan profesional Anda.',service5:'Aplikasi Web Kustom',service5Desc:'Diskusikan sistem atau dashboard sesuai alur kerja Anda.',customLabel:'PUNYA IDE LAIN?',ctaTitle:'Mari wujudkan proyek Anda.',ctaDesc:'Dari website bisnis hingga kebutuhan kustom, ceritakan visi Anda dan mari diskusikan langkah selanjutnya.',consult:'Konsultasi via WhatsApp',footerDesc:'Web & digital solutions untuk ide yang ingin tumbuh.',connect:'TERHUBUNG'},
    en: {navCatalog:'Web Catalog',navContact:'Custom Consultation',navMain:'Main Portfolio',hero1:'From an abstract idea to',hero2:'a website that works for you.',heroDesc:'Explore website inspiration across industries, or share your idea for a solution tailored to your needs.',explore:'Explore the catalog',webTab:'Website Development',designTab:'Graphic Design',soon:'Coming soon',collection:'THE COLLECTION / 01',catalogTitle:'Find your inspiration.',catalogDesc:'22 landing page examples, designed for different ideas and industries. Pick a category to explore.',all:'All',creative:'Agency & Business',spaces:'Architecture & Property',tech:'Technology & AI',finance:'Finance',legal:'Law & Regulation',energy:'Energy & Industry',adventure:'Sports & Adventure',education:'Education',fullPreview:'Full preview',askProject:'Discuss this model',designTitle:'Graphic design services coming soon.',designDesc:'Visual identity, branding, and promotional design services will be available here.',contactWa:'Contact via WhatsApp',contactMe:'Contact me',servicesLabel:'WEBSITE SERVICES',servicesTitle:'Built around your needs.',servicesDesc:'Looking beyond the landing page examples? Choose a service to start the conversation.',service1:'Landing Page',service1Desc:'Promote a product, business, or event.',service2:'Company Profile',service2Desc:'Introduce your business and services professionally.',service3:'Digital Invitation',service3Desc:'Share event details in an interactive invitation.',service4:'Professional Portfolio',service4Desc:'Showcase your work and professional journey.',service5:'Custom Web Application',service5Desc:'Discuss a system or dashboard built around your workflow.',customLabel:'HAVE ANOTHER IDEA?',ctaTitle:'Let’s bring your project to life.',ctaDesc:'From business websites to custom solutions, tell me about your vision and let’s discuss the next steps.',consult:'Consult via WhatsApp',footerDesc:'Web & digital solutions for ideas ready to grow.',connect:'CONNECT'}
  };
  function setLanguage(lang) {
    document.documentElement.lang=lang;
    document.querySelectorAll('[data-i18n]').forEach(el=>{const text=translations[lang][el.dataset.i18n]; if(text) el.textContent=text;});
    document.querySelectorAll('[data-id][data-en]').forEach(el=>{el.textContent=el.dataset[lang];});
    document.querySelectorAll('[data-lang]').forEach(el=>el.setAttribute('aria-pressed',String(el.dataset.lang===lang)));
    document.querySelectorAll('.project-wa').forEach(el=>{const service=el.dataset.kind==='service';const msg=lang==='id'?`Halo Ainun, saya tertarik dengan ${service?'layanan':'model'} ${el.dataset.project}. Bolehkah kita diskusi?`:`Hello Ainun, I'm interested in the ${el.dataset.projectEn || el.dataset.project} ${service?'service':'model'}. Could we discuss it?`;el.href='https://wa.me/6287716208495?text='+encodeURIComponent(msg);});
    document.querySelectorAll('.general-wa').forEach(el=>{const msg=lang==='id'?'Halo Ainun, saya ingin berkonsultasi tentang proyek website saya.':'Hello Ainun, I would like to discuss my website project.';el.href='https://wa.me/6287716208495?text='+encodeURIComponent(msg);});
    try{localStorage.setItem('studio-language',lang);}catch(e){}
  }
  document.querySelectorAll('[data-lang]').forEach(btn=>btn.addEventListener('click',()=>setLanguage(btn.dataset.lang)));
  let initial='id';try{if(localStorage.getItem('studio-language')==='en')initial='en';}catch(e){}setLanguage(initial);
  const tabs=[...document.querySelectorAll('[role=tab]')];
  function selectTab(tab){tabs.forEach(item=>{const active=item===tab;item.classList.toggle('active',active);item.setAttribute('aria-selected',String(active));item.tabIndex=active?0:-1;document.getElementById(item.getAttribute('aria-controls')).hidden=!active;});}
  tabs.forEach((tab,i)=>{tab.addEventListener('click',()=>selectTab(tab));tab.addEventListener('keydown',e=>{if(e.key==='ArrowRight'||e.key==='ArrowLeft'){e.preventDefault();const next=tabs[(i+(e.key==='ArrowRight'?1:-1)+tabs.length)%tabs.length];selectTab(next);next.focus();}});});selectTab(tabs[0]);
  document.querySelectorAll('[data-filter]').forEach(btn=>btn.addEventListener('click',()=>{document.querySelectorAll('[data-filter]').forEach(b=>{const active=b===btn;b.classList.toggle('active',active);b.setAttribute('aria-pressed',String(active));});document.querySelectorAll('.project-card').forEach(card=>{card.hidden=btn.dataset.filter!=='all'&&card.dataset.category!==btn.dataset.filter;});}));
  // Prepare the supplied MP4 previews in catalog order, then play only visible ones.
  const videos=[...document.querySelectorAll('.preview-video')];
  const visible=new Set();
  const motion=window.matchMedia('(prefers-reduced-motion: reduce)');
  const queue=[...videos];
  const loadingScreen=document.getElementById('loading-screen');
  const progress=loadingScreen.querySelector('.loading-progress');
  const progressBar=progress.querySelector('span');
  const status=document.getElementById('loading-status');
  const count=document.getElementById('loading-count');
  let completed=0, failed=0, active=0;
  let closed=false, started=false;
  progress.setAttribute('aria-valuemax',videos.length);
  count.textContent=`0 / ${videos.length}`;
  function closeLoader(){
    if(closed)return;
    closed=true;
    document.documentElement.classList.remove('has-loader');
    loadingScreen.hidden=true;
  }
  document.getElementById('loading-skip').addEventListener('click',closeLoader);
  // Never keep visitors waiting on slow or unavailable connections.
  setTimeout(closeLoader,12000);
  function playPreview(video){
    if(motion.matches || document.hidden || !visible.has(video) || !video.getAttribute('src'))return;
    video.play().catch(()=>{});
  }
  function assignPreview(video,src){
    video.src=src;
    video.load();
    playPreview(video);
  }
  function updateProgress(){
    progress.setAttribute('aria-valuenow',completed);
    progressBar.style.width=`${videos.length ? completed/videos.length*100 : 100}%`;
    count.textContent=`${completed} / ${videos.length}`;
    status.textContent=failed ? `${failed} preview belum tersedia` : 'Menyiapkan video preview';
  }
  function prepareNext(){
    while(active<4 && queue.length){
      const video=queue.shift();
      active++;
      fetch(video.dataset.mp4).then(response=>{
        if(!response.ok)throw new Error('Preview unavailable');
        return response.blob();
      }).then(blob=>{
        assignPreview(video,URL.createObjectURL(blob));
      }).catch(()=>{
        failed++;
        // The original URL remains available as a browser-managed fallback.
        assignPreview(video,video.dataset.mp4);
      }).finally(()=>{
        active--;completed++;updateProgress();
        if(completed===videos.length){
          status.textContent=failed ? `${failed} preview belum tersedia` : 'Preview siap';
          setTimeout(closeLoader,400);
        }else prepareNext();
      });
    }
  }
  if('IntersectionObserver' in window){
    const observer=new IntersectionObserver(entries=>entries.forEach(entry=>{
      const video=entry.target;
      if(entry.isIntersecting){
        visible.add(video);
        // Visible previews move ahead of previews below the fold.
        const index=queue.indexOf(video);
        if(index>0){queue.splice(index,1);queue.unshift(video);}
        playPreview(video);
      }else{visible.delete(video);video.pause();}
    }),{threshold:0.15});
    videos.forEach(video=>observer.observe(video));
  }else{
    videos.forEach(video=>visible.add(video));
  }
  function syncPreviews(){
    if(!motion.matches && !started && videos.length){started=true;prepareNext();}
    videos.forEach(video=>{
    if(motion.matches || document.hidden || !visible.has(video))video.pause();
    else playPreview(video);
  });}
  if(motion.addEventListener)motion.addEventListener('change',syncPreviews);
  else if(motion.addListener)motion.addListener(syncPreviews);
  document.addEventListener('visibilitychange',syncPreviews);
  if(!videos.length || motion.matches)closeLoader();
  else{started=true;prepareNext();}
})();
