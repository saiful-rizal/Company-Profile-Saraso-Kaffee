<script>
const M = @json($menuData);

let curCat='all',curPage=1;const PP=6;
const catLabels={basic:'Menu Basic',signature:'Signature',refreshment:'Refreshment','non-coffee':'Non Coffee',sumatra:'Authentic Sumatera',dessert:'Dessert & Pastry',food:'Food & Snack'};

function getFiltered(){const s=document.getElementById('menuSearch').value.toLowerCase();return M.filter(i=>{const mc=curCat==='all'||i.cat===curCat;const ms=i.name.toLowerCase().includes(s)||i.desc.toLowerCase().includes(s)||i.tags.some(t=>t.toLowerCase().includes(s));return mc&&ms})}
function render(){const f=getFiltered(),tp=Math.ceil(f.length/PP);if(curPage>tp)curPage=1;const st=(curPage-1)*PP,pg=f.slice(st,st+PP);const g=document.getElementById('menuGrid'),e=document.getElementById('emptyState'),p=document.getElementById('pagination');if(!f.length){g.innerHTML='';e.classList.remove('hidden');p.innerHTML='';return}e.classList.add('hidden');g.innerHTML=pg.map((it,i)=>`<div class="menu-card glass-card rounded-2xl overflow-hidden cursor-pointer hover-card" onclick="openDetail(${it.id})" style="animation:fadeInUp .5s ${i*.07}s both"><div class="relative h-36 overflow-hidden"><img src="${it.img}" alt="${it.name}" class="menu-img w-full h-full object-cover" loading="lazy"><div class="absolute top-2 right-2 price-bg backdrop-blur-sm rounded-full px-2.5 py-0.5 text-[10px] font-semibold text-accent">Rp${it.price.toLocaleString('id-ID')}</div>${it.badge==='rec'?'<div class="absolute top-2 left-2 badge-rec rounded-full px-2 py-0.5 text-[8px] font-medium text-accent flex items-center gap-1"><span class="iconify" data-icon="mdi:star"></span>Rekomendasi</div>':''}${it.badge==='best'?'<div class="absolute top-2 left-2 badge-best rounded-full px-2 py-0.5 text-[8px] font-medium text-yellow-500 flex items-center gap-1"><span class="iconify" data-icon="mdi:crown"></span>Best Seller</div>':''}<div class="absolute bottom-0 left-0 right-0 h-10 bg-gradient-to-t from-dk-800/80 to-transparent light:from-white/80"></div></div><div class="p-4"><div class="flex items-center justify-between mb-2"><h3 class="font-serif text-sm font-semibold text-main">${it.name}</h3><span class="iconify menu-arrow text-accent/20 text-base" data-icon="mdi:arrow-top-right"></span></div><p class="text-sub text-[10px] font-light leading-relaxed line-clamp-2 mb-2">${it.desc}</p><div class="flex items-center gap-1 flex-wrap">${it.tags.map(t=>`<span class="text-[8px] font-medium tag-bg px-1.5 py-0.5 rounded-full">${t}</span>`).join('')}</div></div></div>`).join('');if(tp>1){let h='';if(curPage>1)h+=`<button class="page-btn rounded-xl px-3 py-1.5 text-[10px] text-sub border border-line" onclick="goP(${curPage-1})">← Prev</button>`;for(let p=1;p<=tp;p++)h+=`<button class="page-btn rounded-xl px-3 py-1.5 text-[10px] text-sub border border-line ${p===curPage?'active':''}" onclick="goP(${p})">${p}</button>`;if(curPage<tp)h+=`<button class="page-btn rounded-xl px-3 py-1.5 text-[10px] text-sub border border-line" onclick="goP(${curPage+1})">Next →</button>`;p.innerHTML=h}else p.innerHTML=''}
function setCat(c,b){curCat=c;curPage=1;document.querySelectorAll('.cat-btn').forEach(x=>x.classList.remove('active'));b.classList.add('active');render()}
function filterMenu(){curPage=1;render()}
function goP(p){const tp=Math.ceil(getFiltered().length/PP);if(p<1||p>tp)return;curPage=p;render();document.getElementById('menu').scrollIntoView({behavior:'smooth',block:'start'})}

function openDetail(id){const it=M.find(m=>m.id===id);if(!it)return;const m=document.getElementById('detailModal'),c=document.getElementById('detailContent');c.innerHTML=`<button onclick="closeModal('detailModal')" class="absolute top-3 right-3 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-dk-950/60 backdrop-blur-sm text-sub hover:text-main transition-colors light:bg-white/60"><span class="iconify text-base" data-icon="mdi:close"></span></button><div class="relative h-48 md:h-56 overflow-hidden rounded-t-3xl"><img src="${it.img}" alt="${it.name}" class="w-full h-full object-cover"><div class="absolute inset-0 bg-gradient-to-t from-dk-800 via-dk-800/20 to-transparent light:from-white light:via-white/20"></div><div class="absolute bottom-4 left-5 right-5"><div class="flex items-center gap-1.5 mb-1.5"><span class="text-[8px] font-medium text-accent/70 bg-s-300/10 backdrop-blur-sm px-3 py-1 rounded-full">${catLabels[it.cat]||it.cat}</span>${it.badge==='rec'?'<span class="badge-rec rounded-full px-2 py-0.5 text-[8px] font-medium text-accent flex items-center gap-1"><span class="iconify" data-icon="mdi:star"></span>Rekomendasi</span>':''}${it.badge==='best'?'<span class="badge-best rounded-full px-2 py-0.5 text-[8px] font-medium text-yellow-500 flex items-center gap-1"><span class="iconify" data-icon="mdi:crown"></span>Best Seller</span>':''}</div><h2 class="font-serif text-xl md:text-2xl font-bold text-main">${it.name}</h2></div></div><div class="p-5 md:p-6"><div class="text-xl font-serif font-bold text-grad mb-4">Rp${it.price.toLocaleString('id-ID')}</div><p class="text-sub text-xs font-light leading-[1.8] mb-4">${it.desc}</p><div class="flex flex-wrap gap-1.5 mb-4">${it.tags.map(t=>`<span class="text-[9px] font-medium tag-bg border border-line px-2 py-0.5 rounded-full">${t}</span>`).join('')}</div><div class="grid grid-cols-2 gap-2 mb-5"><div class="stat-card rounded-xl p-3 border border-line"><div class="text-[8px] text-sub uppercase tracking-wider mb-1">Kategori</div><div class="text-xs font-semibold text-main">${catLabels[it.cat]||it.cat}</div></div><div class="stat-card rounded-xl p-3 border border-line"><div class="text-[8px] text-sub uppercase tracking-wider mb-1">Harga</div><div class="text-xs font-semibold text-accent">Rp${it.price.toLocaleString('id-ID')}</div></div></div><form method="POST" action="/orders" class="flex items-center gap-2"><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="menu_id" value="${it.id}"><div class="flex items-center border border-s-300/10 rounded-lg overflow-hidden"><button type="button" class="px-2.5 py-1.5 text-xs text-sub hover:text-accent transition-colors" onclick="this.nextElementSibling.textAsolute=parseInt(this.nextElementSibling.textContent)||1;if(this.nextElementSibling.textAsolute>1)this.nextElementSibling.textAsolute--;this.nextElementSibling.textContent=this.nextElementSibling.textAsolute">−</button><span class="px-3 py-1.5 text-xs text-main min-w-[24px] text-center modal-qty">1</span><button type="button" class="px-2.5 py-1.5 text-xs text-sub hover:text-accent transition-colors" onclick="const e=this.previousElementSibling;e.textAsolute=(parseInt(e.textContent)||1)+1;e.textContent=e.textAsolute">+</button></div><input type="hidden" name="quantity" class="qty-input" value="1"><button type="submit" class="flex-1 grad-warm text-dk-950 font-semibold text-[10px] py-2 rounded-lg hover:shadow-md transition-all">Tambah ke Pesanan</button></form></div>`;openModal('detailModal');setTimeout(()=>{const q=c.querySelector('.modal-qty');if(q){const inp=c.querySelector('.qty-input');if(inp){const update=()=>{inp.value=parseInt(q.textContent)||1};update();const obs=new MutationObserver(update);obs.observe(q,{childList:true,characterData:true,subtree:true})}}},100)}
function openModal(id){const m=document.getElementById(id);m.style.display='flex';gsap.fromTo(m.querySelector('.glass-card'),{opacity:0,y:40,scale:.93},{opacity:1,y:0,scale:1,duration:.4,ease:'power3.out'})}
function closeModal(id){const m=document.getElementById(id),c=m.querySelector('.glass-card')||m.querySelector('#detailContent');gsap.to(c,{opacity:0,y:25,scale:.93,duration:.22,ease:'power2.in',onComplete:()=>{m.style.display='none'}})}

function submitLogin(e){e.preventDefault();const f=e.target,em=f.querySelector('input[type="email"]').value,pw=f.querySelector('input[type="password"]').value;if(em==='admin@sarasokoffiehaus.id'&&pw==='password123'){closeModal('loginModal');showToast('Login berhasil! Mengalihkan ke dashboard...','success')}else showToast('Email atau password salah!','error')}
function togglePw(){const i=document.getElementById('loginPw'),ic=document.getElementById('eyeIco');if(i.type==='password'){i.type='text';ic.setAttribute('data-icon','mdi:eye-outline')}else{i.type='password';ic.setAttribute('data-icon','mdi:eye-off-outline')}}
function submitContact(e){e.preventDefault();showToast('Pesan berhasil dikirim!','success');e.target.reset()}
function showToast(msg,type='success'){const c=document.getElementById('toastBox'),t=document.createElement('div');const bg=type==='success'?'border-green-500/15 bg-green-500/5':'border-red-500/15 bg-red-500/5';const ic=type==='success'?'text-green-400':'text-red-400';const ico=type==='success'?'mdi:check-circle-outline':'mdi:alert-circle-outline';t.className=`toast glass-card ${bg} rounded-xl px-4 py-2.5 flex items-center gap-2 min-w-[240px] max-w-sm border`;t.innerHTML=`<span class="iconify ${ic} text-base flex-shrink-0" data-icon="${ico}"></span><span class="text-xs text-main">${msg}</span>`;c.appendChild(t);setTimeout(()=>{t.style.animation='slideOut .3s ease forwards';setTimeout(()=>t.remove(),300)},3500)}

function toggleMob(){document.getElementById('mobMenu').classList.toggle('hidden')}
function closeMob(){document.getElementById('mobMenu').classList.add('hidden')}

function toggleTheme(){
    const html=document.documentElement;
    const isDark=html.classList.contains('dark');
    html.classList.remove(isDark?'dark':'light');
    html.classList.add(isDark?'light':'dark');
    const icon=isDark?'mdi:white-balance-sunny':'mdi:moon-waning-crescent';
    document.getElementById('themeIcon').setAttribute('data-icon',icon);
    const mobIcon=isDark?'mdi:white-balance-sunny':'mdi:moon-waning-crescent';
    document.getElementById('themeIconMob').setAttribute('data-icon',mobIcon);
    localStorage.setItem('saraso-theme',isDark?'light':'dark');
}
(function(){const t=localStorage.getItem('saraso-theme');if(t){document.documentElement.classList.remove('dark','light');document.documentElement.classList.add(t);const icon=t==='light'?'mdi:white-balance-sunny':'mdi:moon-waning-crescent';document.getElementById('themeIcon').setAttribute('data-icon',icon);document.getElementById('themeIconMob').setAttribute('data-icon',icon)}})();

function createParticles(){
    const box=document.getElementById('particles');
    for(let i=0;i<20;i++){
        const p=document.createElement('div');
        p.className='particle';
        const size=Math.random()*3+1;
        const x=Math.random()*100;
        const y=Math.random()*100;
        const dx=(Math.random()-.5)*200;
        const dy=(Math.random()-.5)*200;
        const dur=Math.random()*8+6;
        const delay=Math.random()*6;
        p.style.cssText=`width:${size}px;height:${size}px;left:${x}%;top:${y}%;background:rgba(212,165,106,${Math.random()*.15+.05});--dx:${dx}px;--dy:${dy}px;animation:drift ${dur}s ${delay}s ease-in-out infinite`;
        box.appendChild(p);
    }
}

document.addEventListener('DOMContentLoaded',()=>{
    gsap.registerPlugin(ScrollTrigger);
    createParticles();

    const tl=gsap.timeline({defaults:{ease:'power3.out'}});
    tl.to('.hero-line-inner',{y:0,duration:1.2,stagger:.15},.3)
      .to('.hero-fade',{opacity:1,duration:.8,stagger:.12},.7)
      .to('.hero-orb',{opacity:1,duration:1.5},.2)
      .to('.hero-deco',{opacity:1,duration:1},.8)
      .to('.hero-dot',{opacity:1,duration:.6,stagger:.2},1);

    gsap.to('.hero-fade[style*="scaleX"]',{scaleX:1,duration:1.2,ease:'power3.inOut',delay:1.3,transformOrigin:'center center'});

    gsap.utils.toArray('.reveal').forEach((el,i)=>{gsap.fromTo(el,{opacity:0,y:35},{opacity:1,y:0,duration:.75,delay:i*.04,ease:'power3.out',scrollTrigger:{trigger:el,start:'top 88%',toggleActions:'play none none none'}})});
    gsap.utils.toArray('.reveal-left').forEach(el=>{gsap.fromTo(el,{opacity:0,x:-35},{opacity:1,x:0,duration:.75,ease:'power3.out',scrollTrigger:{trigger:el,start:'top 85%',toggleActions:'play none none none'}})});
    gsap.utils.toArray('.reveal-right').forEach(el=>{gsap.fromTo(el,{opacity:0,x:35},{opacity:1,x:0,duration:.75,ease:'power3.out',scrollTrigger:{trigger:el,start:'top 85%',toggleActions:'play none none none'}})});
    gsap.utils.toArray('.reveal-scale').forEach((el,i)=>{gsap.fromTo(el,{opacity:0,scale:.88},{opacity:1,scale:1,duration:.65,delay:i*.07,ease:'power3.out',scrollTrigger:{trigger:el,start:'top 88%',toggleActions:'play none none none'}})});
    gsap.utils.toArray('.counter').forEach(c=>{const t=+c.dataset.target;ScrollTrigger.create({trigger:c,start:'top 85%',onEnter:()=>{gsap.to({v:0},{v:t,duration:2,ease:'power2.out',onUpdate:function(){c.textContent=Math.round(this.targets()[0].v)+'+'}})},once:true})});

    gsap.to('#heroBg',{yPercent:15,ease:'none',scrollTrigger:{trigger:'#home',start:'top top',end:'bottom top',scrub:true}});

    ScrollTrigger.create({trigger:'#home',start:'top -20%',end:'bottom -40%',onUpdate:self=>{const o=1-self.progress;gsap.set('#scrollIndicator',{opacity:o,y:20*(1-o)})}});

    const hero=document.getElementById('home');
    hero.addEventListener('mousemove',(e)=>{
        const{left,top,width,height}=hero.getBoundingClientRect();
        const x=(e.clientX-left)/width-.5,y=(e.clientY-top)/height-.5;
        gsap.to('.orb-1',{x:x*30,y:y*20,duration:1.2,ease:'power2.out',overwrite:'auto'});
        gsap.to('.orb-2',{x:x*-20,y:y*-15,duration:1.2,ease:'power2.out',overwrite:'auto'});
        gsap.to('.hero-deco',{x:x*10,y:y*8,duration:1.2,ease:'power2.out',overwrite:'auto'});
    });

    document.querySelectorAll('.glass-card.hover-card').forEach(card=>{
        card.addEventListener('mouseenter',()=>card.style.transition='transform .3s ease');
        card.addEventListener('mousemove',(e)=>{
            const{left,top,width,height}=card.getBoundingClientRect();
            const x=(e.clientX-left)/width-.5,y=(e.clientY-top)/height-.5;
            card.style.transform=`perspective(600px) rotateY(${x*6}deg) rotateX(${y*-6}deg) translateY(-6px)`;
        });
        card.addEventListener('mouseleave',()=>{
            card.style.transform='perspective(600px) rotateY(0deg) rotateX(0deg) translateY(0px)';
        });
    });

    document.querySelectorAll('.gallery-item').forEach(item=>{
        item.addEventListener('mousemove',(e)=>{
            const{left,top,width,height}=item.getBoundingClientRect();
            const x=(e.clientX-left)/width-.5,y=(e.clientY-top)/height-.5;
            item.style.transform=`perspective(600px) rotateY(${x*4}deg) rotateX(${y*-4}deg) scale(1.04)`;
        });
        item.addEventListener('mouseleave',()=>{
            item.style.transform='perspective(600px) rotateY(0deg) rotateX(0deg) scale(1)';
        });
    });

    document.querySelectorAll('.hero-btn').forEach(btn=>{
        btn.addEventListener('mousemove',(e)=>{
            const{left,top,width,height}=btn.getBoundingClientRect();
            btn.style.setProperty('--mx',((e.clientX-left)/width*100)+'%');
            btn.style.setProperty('--my',((e.clientY-top)/height*100)+'%');
        });
    });
    document.querySelectorAll('.glass-card:not(.card-spotlight)').forEach(card=>{
        card.addEventListener('mousemove',(e)=>{
            const{left,top,width,height}=card.getBoundingClientRect();
            card.style.setProperty('--mx',((e.clientX-left)/width*100)+'%');
            card.style.setProperty('--my',((e.clientY-top)/height*100)+'%');
        });
        card.classList.add('card-spotlight');
    });

    window.addEventListener('scroll',()=>{
        const n=document.getElementById('navbar'),s=window.scrollY;
        if(s>80){n.style.background=document.documentElement.classList.contains('dark')?'rgba(12,10,9,.95)':'rgba(255,251,245,.92)'}
        else{n.style.background=document.documentElement.classList.contains('dark')?'rgba(12,10,9,.75)':'rgba(255,251,245,.8)'}
    });

    render();
});
document.addEventListener('keydown',e=>{if(e.key==='Escape')['detailModal','loginModal'].forEach(id=>{if(document.getElementById(id).style.display==='flex')closeModal(id)})});
</script>
