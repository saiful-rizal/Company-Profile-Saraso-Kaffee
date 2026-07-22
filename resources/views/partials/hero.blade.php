<section id="home" class="relative min-h-[85vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/icon.jpg') }}" alt="Hero" class="w-full h-full object-cover opacity-30 dark:opacity-30 light:opacity-20" id="heroBg">
        <div class="hero-overlay absolute inset-0"></div>
    </div>
    <div class="orb-1 absolute top-1/4 left-1/5 w-[350px] h-[350px] rounded-full blur-[100px] hero-orb" style="opacity:0"></div>
    <div class="orb-2 absolute bottom-1/4 right-1/5 w-[280px] h-[280px] rounded-full blur-[80px] hero-orb" style="opacity:0"></div>
    <div id="particles" class="absolute inset-0 pointer-events-none overflow-hidden"></div>
    <div class="absolute top-24 right-24 w-44 h-44 border border-line rounded-full rotate-slow hidden lg:block hero-deco" style="opacity:0"></div>
    <div class="absolute bottom-40 left-20 w-28 h-28 border border-line rounded-full rotate-slow hidden lg:block hero-deco" style="opacity:0;animation-direction:reverse;animation-duration:22s"></div>
    <div class="absolute top-1/2 right-1/3 w-3 h-3 bg-s-300/20 rounded-full hero-dot" style="opacity:0"></div>
    <div class="absolute top-1/3 left-1/3 w-2 h-2 bg-s-300/15 rounded-full hero-dot" style="opacity:0"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center pt-24">
        <div class="hero-fade mb-8" style="opacity:0">
            <div class="inline-flex items-center gap-2.5 grad-warm-soft border border-line-light rounded-full px-5 py-2">
                <span class="w-1.5 h-1.5 bg-s-300 rounded-full animate-pulse"></span>
                <span class="text-[10px] font-medium text-accent tracking-[0.25em] uppercase">Open Daily until 00:00 WIB</span>
            </div>
        </div>
        <div class="hero-line mb-2">
            <h1 class="hero-line-inner font-serif text-5xl sm:text-6xl md:text-8xl font-bold leading-[1.15] tracking-[0.02em] text-main">Saraso</h1>
        </div>
        <div class="hero-line mb-8">
            <h1 class="hero-line-inner font-serif text-5xl sm:text-6xl md:text-8xl font-bold leading-[1.15] tracking-[0.02em] text-grad" style="transition-delay:.12s">Koffiehaus</h1>
        </div>
        <div class="hero-fade w-20 h-[2px] grad-warm rounded-full mb-8 mx-auto" style="opacity:0;transform:scaleX(0)"></div>
        <p class="hero-fade text-sub text-sm md:text-base font-light leading-[2] tracking-[0.01em] max-w-xl mb-8 mx-auto" style="opacity:0">
            Specialty coffee dari biji pilihan Sumatera, disajikan dalam ruang minimalis yang nyaman untuk bekerja, bersantai, dan menikmati momen berharga.
        </p>
        <div class="hero-fade flex items-center gap-3 justify-center mb-10" style="opacity:0">
            <div class="rating-stars text-sm flex gap-1">
                <span class="iconify" data-icon="mdi:star"></span>
                <span class="iconify" data-icon="mdi:star"></span>
                <span class="iconify" data-icon="mdi:star"></span>
                <span class="iconify" data-icon="mdi:star"></span>
                <span class="iconify" data-icon="mdi:star-half-full"></span>
            </div>
            <span class="text-xs tracking-[0.05em] text-sub">4.9/5 — 169 ulasan Google</span>
        </div>
        <div class="hero-fade flex flex-col sm:flex-row gap-5 justify-center mb-12" style="opacity:0">
            <a href="#menu" class="hero-btn group inline-flex items-center justify-center gap-2.5 grad-warm text-dk-950 font-semibold text-xs px-7 py-3 rounded-full hover:scale-[1.04] hover:shadow-2xl hover:shadow-s-300/25 active:scale-[.97] transition-all duration-300">
                Explore Menu
                <span class="iconify group-hover:translate-x-1.5 group-hover:-translate-y-0.5 transition-all duration-300" data-icon="mdi:arrow-right"></span>
            </a>
            <a href="https://maps.google.com" target="_blank" class="hero-btn group inline-flex items-center justify-center gap-2.5 border border-line-light text-main font-medium text-xs px-7 py-3 rounded-full hover:scale-[1.04] hover:bg-s-300/10 hover:border-s-300/30 hover:shadow-lg hover:shadow-s-300/10 active:scale-[.97] transition-all duration-300">
                <span class="iconify text-accent group-hover:rotate-12 transition-transform duration-300" data-icon="mdi:map-marker-outline"></span>Petunjuk Arah
            </a>
        </div>
        <div id="scrollIndicator" class="flex flex-col items-center gap-1 hero-fade cursor-pointer group mx-auto" style="opacity:0" onclick="document.getElementById('menu').scrollIntoView({behavior:'smooth'})">
            <span class="text-[7px] text-muted tracking-[0.35em] uppercase group-hover:text-accent transition-colors duration-300">Scroll</span>
            <div class="scroll-mouse w-4 h-7 border border-line rounded-full flex justify-center pt-1 transition-all duration-300">
                <div class="w-1 h-1.5 bg-s-300/40 rounded-full animate-bounce"></div>
            </div>
        </div>
    </div>
</section>
