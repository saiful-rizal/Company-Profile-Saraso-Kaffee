    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saraso Koffiehaus — Specialty Coffee & Comfort Space</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        s: { 50:'#FFFBF5',100:'#F5E6D0',200:'#E8CBA4',300:'#D4A56A',400:'#C4914F',500:'#A87635',600:'#8B5E28',700:'#6B4720',800:'#4A3118',900:'#2C1D0E',950:'#1A120A' },
                        dk: { 700:'#1C1917',800:'#141211',900:'#0C0A09',950:'#050403' }
                    },
                    fontFamily: { sans:['Inter','sans-serif'], serif:['Playfair Display','serif'] }
                }
            }
        }
    </script>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',sans-serif;overflow-x:hidden}
        ::-webkit-scrollbar{width:5px}
        ::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:linear-gradient(180deg,#D4A56A,#A87635);border-radius:3px}

        .dark body,.dark{background:#050403;color:#F5E6D0}
        .dark .grid-bg{background-size:50px 50px;background-image:linear-gradient(to right,rgba(212,165,106,.025) 1px,transparent 1px),linear-gradient(to bottom,rgba(212,165,106,.025) 1px,transparent 1px)}
        .dark .glass-nav{background:rgba(12,10,9,.75);backdrop-filter:blur(20px);border-bottom:1px solid rgba(212,165,106,.06)}
        .dark .glass-card{background:rgba(28,25,23,.45);backdrop-filter:blur(10px);border:1px solid rgba(212,165,106,.06)}
        .dark .hero-overlay{background:linear-gradient(180deg,rgba(5,4,3,.15) 0%,rgba(5,4,3,.03) 25%,rgba(5,4,3,.45) 65%,rgba(5,4,3,1) 100%)}
        .dark .text-main{color:#F5E6D0}
        .dark .text-sub{color:rgba(245,230,208,.45)}
        .dark .text-muted{color:rgba(245,230,208,.3)}
        .dark .text-accent{color:#D4A56A}
        .dark .bg-section{background:#050403}
        .dark .bg-input{background:rgba(20,18,17,.7)}
        .dark .border-line{border-color:rgba(212,165,106,.06)}
        .dark .border-line-light{border-color:rgba(212,165,106,.1)}
        .dark .hover-card:hover{border-color:rgba(212,165,106,.2);box-shadow:0 24px 70px rgba(212,165,106,.08)}
        .dark .nav-link{color:rgba(245,230,208,.55)}
        .dark .nav-link:hover{color:#D4A56A}
        .dark .tag-bg{background:rgba(212,165,106,.05);color:rgba(212,165,106,.4)}
        .dark .orb-1{background:rgba(212,165,106,.04)}
        .dark .orb-2{background:rgba(168,118,53,.04)}
        .dark .price-bg{background:rgba(5,4,3,.7)}
        .dark .modal-bg{background:rgba(5,4,3,.88);backdrop-filter:blur(12px)}
        .dark .stat-card{background:rgba(5,4,3,.5)}
        .dark .cat-border{border-color:rgba(212,165,106,.1)}
        .dark .noise::before{opacity:1}

        .light body,.light{background:linear-gradient(180deg,#FFFBF5 0%,#F5E6D0 35%,#E8CBA4 70%,#D4A56A 100%);color:#2C1D0E}
        .light .grid-bg{background-size:50px 50px;background-image:linear-gradient(to right,rgba(44,29,14,.04) 1px,transparent 1px),linear-gradient(to bottom,rgba(44,29,14,.04) 1px,transparent 1px)}
        .light .glass-nav{background:rgba(255,251,245,.8);backdrop-filter:blur(20px);border-bottom:1px solid rgba(44,29,14,.06)}
        .light .glass-card{background:rgba(255,255,255,.6);backdrop-filter:blur(10px);border:1px solid rgba(44,29,14,.06)}
        .light .hero-overlay{background:linear-gradient(180deg,rgba(255,251,245,.15) 0%,rgba(255,251,245,.03) 25%,rgba(255,251,245,.5) 65%,rgba(255,251,245,1) 100%)}
        .light .text-main{color:#2C1D0E}
        .light .text-sub{color:rgba(44,29,14,.55)}
        .light .text-muted{color:rgba(44,29,14,.3)}
        .light .text-accent{color:#A87635}
        .light .bg-section{background:transparent}
        .light .bg-input{background:rgba(255,255,255,.8)}
        .light .border-line{border-color:rgba(44,29,14,.06)}
        .light .border-line-light{border-color:rgba(44,29,14,.1)}
        .light .hover-card:hover{border-color:rgba(168,118,53,.2);box-shadow:0 24px 70px rgba(168,118,53,.08)}
        .light .nav-link{color:rgba(44,29,14,.5)}
        .light .nav-link:hover{color:#A87635}
        .light .tag-bg{background:rgba(168,118,53,.06);color:rgba(168,118,53,.6)}
        .light .orb-1{background:rgba(212,165,106,.08)}
        .light .orb-2{background:rgba(168,118,53,.06)}
        .light .price-bg{background:rgba(255,251,245,.75)}
        .light .modal-bg{background:rgba(255,251,245,.88);backdrop-filter:blur(12px)}
        .light .stat-card{background:rgba(255,255,255,.5)}
        .light .cat-border{border-color:rgba(44,29,14,.1)}
        .light .noise::before{opacity:0}

        .grad-warm{background:linear-gradient(135deg,#D4A56A 0%,#E8CBA4 40%,#C4914F 100%)}
        .grad-warm-soft{background:linear-gradient(135deg,rgba(212,165,106,.12),rgba(168,118,53,.06))}
        .text-grad{background:linear-gradient(135deg,#E8CBA4,#D4A56A,#C4914F);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
        .light .text-grad{background:linear-gradient(135deg,#8B5E28,#A87635,#6B4720);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
        .grad-warm-radial{background:radial-gradient(ellipse at 50% 0%,rgba(212,165,106,.1) 0%,transparent 60%)}
        .light .grad-warm-radial{background:radial-gradient(ellipse at 50% 0%,rgba(168,118,53,.08) 0%,transparent 60%)}

        .particle{position:absolute;border-radius:50%;pointer-events:none}
        @keyframes drift{0%{transform:translate(0,0) scale(1);opacity:0}10%{opacity:1}90%{opacity:1}100%{transform:translate(var(--dx),var(--dy)) scale(0);opacity:0}}
        @keyframes rotateSlow{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}
        @keyframes shimmer{0%{background-position:-200% 0}100%{background-position:200% 0}}
        @keyframes fadeInUp{from{opacity:0;transform:translateY(28px)}to{opacity:1;transform:translateY(0)}}
        @keyframes grain{0%,100%{transform:translate(0,0)}10%{transform:translate(-5%,-10%)}50%{transform:translate(-15%,5%)}90%{transform:translate(-10%,1%)}}
        @keyframes textReveal{from{clip-path:inset(0 100% 0 0)}to{clip-path:inset(0 0% 0 0)}}
        @keyframes scaleIn{from{opacity:0;transform:scale(.85)}to{opacity:1;transform:scale(1)}}
        @keyframes lineGrow{from{transform:scaleX(0)}to{transform:scaleX(1)}}

        .rotate-slow{animation:rotateSlow 35s linear infinite}
        .noise::before{content:'';position:fixed;top:-50%;left:-50%;width:200%;height:200%;background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.03'/%3E%3C/svg%3E");animation:grain 8s steps(10) infinite;pointer-events:none;z-index:9999}

        .menu-card{transition:all .45s cubic-bezier(.16,1,.3,1)}
        .hover-card{transition:transform .3s ease,box-shadow .4s ease,border-color .3s ease}
        .menu-card:hover .menu-img{transform:scale(1.1)}
        .menu-card:hover .menu-arrow{transform:translate(4px,4px);color:#D4A56A}
        .light .menu-card:hover .menu-arrow{color:#A87635}
        .menu-img{transition:transform .7s cubic-bezier(.16,1,.3,1)}
        .menu-arrow{transition:all .3s ease}

        .gallery-item{transition:all .5s cubic-bezier(.16,1,.3,1)}
        .gallery-item:hover{transform:scale(1.04);z-index:10}
        .gallery-item:hover .gallery-ov{opacity:1}
        .gallery-ov{opacity:0;transition:opacity .4s ease}

        .card-spotlight{position:relative;overflow:hidden}
        .card-spotlight::before{content:'';position:absolute;inset:0;border-radius:inherit;background:radial-gradient(600px circle at var(--mx,50%) var(--my,50%),rgba(212,165,106,.08),transparent 50%);opacity:0;transition:opacity .4s;pointer-events:none;z-index:1}
        .card-spotlight:hover::before{opacity:1}

        .cat-btn{transition:all .3s ease;position:relative;overflow:hidden}
        .cat-btn::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,#D4A56A,#C4914F);opacity:0;transition:opacity .3s}
        .cat-btn.active::before{opacity:1}
        .cat-btn span{position:relative;z-index:1}
        .cat-btn.active span{color:#050403}

        .service-icon{transition:all .4s cubic-bezier(.16,1,.3,1)}
        .glass-card:hover .service-icon{transform:scale(1.2) rotate(-8deg);background:linear-gradient(135deg,rgba(212,165,106,.12),rgba(168,118,53,.06))}

        input:focus,textarea:focus{outline:none!important;border-color:rgba(212,165,106,.35)!important;box-shadow:0 0 0 3px rgba(212,165,106,.08)!important}

        #scrollIndicator{transition:opacity .5s,transform .3s}
        #scrollIndicator:hover{transform:translateX(-50%) scale(1.08)}
        #scrollIndicator:hover .scroll-mouse{border-color:rgba(212,165,106,.3)}
        #scrollIndicator:hover .scroll-mouse div{background:#D4A56A}

        .hero-btn{position:relative;overflow:hidden;cursor:pointer}
        .hero-btn::after{content:'';position:absolute;inset:0;border-radius:inherit;background:radial-gradient(circle at var(--mx,50%) var(--my,50%),rgba(255,255,255,.2),transparent 60%);opacity:0;transition:opacity .3s;pointer-events:none}
        .hero-btn:hover::after{opacity:1}

        .toast{animation:slideIn .4s cubic-bezier(.16,1,.3,1)}
        @keyframes slideIn{from{transform:translateX(110%);opacity:0}to{transform:translateX(0);opacity:1}}
        @keyframes slideOut{from{transform:translateX(0);opacity:1}to{transform:translateX(110%);opacity:0}}

        .page-btn{transition:all .25s ease}
        .page-btn.active{background:linear-gradient(135deg,#D4A56A,#C4914F);color:#050403;font-weight:600}
        .page-btn:not(.active):hover{background:rgba(212,165,106,.08)}
        .light .page-btn:not(.active):hover{background:rgba(168,118,53,.08)}

        .badge-rec{background:linear-gradient(135deg,rgba(212,165,106,.15),rgba(196,145,79,.08));border:1px solid rgba(212,165,106,.15)}
        .light .badge-rec{background:linear-gradient(135deg,rgba(168,118,53,.1),rgba(139,94,40,.05));border-color:rgba(168,118,53,.15)}
        .badge-best{background:linear-gradient(135deg,rgba(234,179,8,.12),rgba(202,138,4,.06));border:1px solid rgba(234,179,8,.15)}

        .rating-stars{color:#D4A56A}
        .light .rating-stars{color:#A87635}

        .hero-line{overflow:hidden}
        .hero-line-inner{transform:translateY(110%);transition:transform 1s cubic-bezier(.16,1,.3,1)}
        .hero-line-inner.show{transform:translateY(0)}

        .theme-toggle{position:relative;width:52px;height:28px;border-radius:14px;cursor:pointer;transition:background .3s}
        .dark .theme-toggle{background:rgba(212,165,106,.15);border:1px solid rgba(212,165,106,.15)}
        .light .theme-toggle{background:rgba(44,29,14,.08);border:1px solid rgba(44,29,14,.1)}
        .theme-toggle .thumb{position:absolute;top:2px;width:22px;height:22px;border-radius:50%;transition:all .4s cubic-bezier(.16,1,.3,1);display:flex;align-items:center;justify-content:center}
        .dark .theme-toggle .thumb{left:2px;background:linear-gradient(135deg,#D4A56A,#C4914F)}
        .light .theme-toggle .thumb{left:26px;background:linear-gradient(135deg,#F59E0B,#FBBF24)}
        .theme-toggle .thumb .iconify{font-size:13px;color:#050403}
    </style>
