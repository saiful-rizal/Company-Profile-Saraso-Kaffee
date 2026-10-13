<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan — Saraso Koffiehaus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Inter',sans-serif;background:#050403;color:#F5E6D0}
        .glass-nav{background:rgba(12,10,9,.85);backdrop-filter:blur(20px);border-bottom:1px solid rgba(212,165,106,.06)}
        .glass-card{background:rgba(28,25,23,.45);backdrop-filter:blur(10px);border:1px solid rgba(212,165,106,.06)}
        .glass-card-2{background:rgba(28,25,23,.6);backdrop-filter:blur(12px);border:1px solid rgba(212,165,106,.08)}
        .text-main{color:#F5E6D0}
        .text-sub{color:rgba(245,230,208,.45)}
        .text-muted{color:rgba(245,230,208,.3)}
        .text-accent{color:#D4A56A}
        .grad-warm{background:linear-gradient(135deg,#D4A56A 0%,#E8CBA4 40%,#C4914F 100%)}
        .grad-warm-soft{background:linear-gradient(135deg,rgba(212,165,106,.12),rgba(168,118,53,.06))}
        .cat-btn{transition:all .3s ease;position:relative;overflow:hidden}
        .cat-btn.active{background:linear-gradient(135deg,#D4A56A,#C4914F);color:#050403;font-weight:600}
        .cat-btn:not(.active){background:rgba(212,165,106,.05);color:rgba(245,230,208,.55)}
        .cat-btn:not(.active):hover{background:rgba(212,165,106,.1);color:#D4A56A}
        .menu-item{transition:all .35s cubic-bezier(.16,1,.3,1)}
        .menu-item:hover{transform:translateY(-3px);border-color:rgba(212,165,106,.2);box-shadow:0 12px 40px rgba(212,165,106,.06)}
        .qty-btn{transition:all .2s ease}
        .qty-btn:hover{background:rgba(212,165,106,.15)}
        .cart-item{animation:fadeIn .3s ease}
        @keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
        ::-webkit-scrollbar{width:4px}
        ::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:rgba(212,165,106,.2);border-radius:2px}
    </style>
</head>
<body class="min-h-screen bg-[#050403]">
    <nav class="fixed top-0 left-0 right-0 z-50 glass-nav h-auto">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-14">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg grad-warm flex items-center justify-center">
                        <span class="iconify text-dk-950 text-base" data-icon="mdi:coffee"></span>
                    </div>
                    <span class="font-serif text-sm font-semibold text-main">Pesan Menu</span>
                </a>
                <div class="flex items-center gap-3">
                    <a href="{{ route('orders.index') }}" class="relative text-[10px] font-medium grad-warm-soft text-accent border border-line-light px-3 py-1.5 rounded-full hover:border-s-300/25 transition-all flex items-center gap-1">
                        <span class="iconify text-xs" data-icon="mdi:clipboard-list-outline"></span>Riwayat
                        @if(isset($pendingOrderCount) && $pendingOrderCount > 0)
                        <span class="absolute -top-1.5 -right-1.5 min-w-[16px] h-4 px-1 rounded-full bg-red-500 text-white text-[8px] font-bold flex items-center justify-center shadow-lg shadow-red-500/30 pending-badge">{{ $pendingOrderCount }}</span>
                        @endif
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="text-[10px] font-medium text-red-400 border border-red-500/20 px-3 py-1.5 rounded-full hover:bg-red-500/10 transition-all flex items-center gap-1">
                            <span class="iconify text-xs" data-icon="mdi:logout"></span>Keluar
                        </button>
                    </form>
                </div>
            </div>
            <div class="flex gap-1.5 pb-3 overflow-x-auto scrollbar-hide" id="catNav">
                <button class="cat-btn text-[11px] font-medium px-3.5 py-1.5 rounded-full active" onclick="filterCat('all',this)">Semua</button>
                <button class="cat-btn text-[11px] font-medium px-3.5 py-1.5 rounded-full" onclick="filterCat('basic',this)">Basic</button>
                <button class="cat-btn text-[11px] font-medium px-3.5 py-1.5 rounded-full" onclick="filterCat('signature',this)">Signature</button>
                <button class="cat-btn text-[11px] font-medium px-3.5 py-1.5 rounded-full" onclick="filterCat('refreshment',this)">Refreshment</button>
                <button class="cat-btn text-[11px] font-medium px-3.5 py-1.5 rounded-full" onclick="filterCat('non-coffee',this)">Non Coffee</button>
                <button class="cat-btn text-[11px] font-medium px-3.5 py-1.5 rounded-full" onclick="filterCat('sumatra',this)">Sumatera</button>
                <button class="cat-btn text-[11px] font-medium px-3.5 py-1.5 rounded-full" onclick="filterCat('dessert',this)">Dessert</button>
                <button class="cat-btn text-[11px] font-medium px-3.5 py-1.5 rounded-full" onclick="filterCat('food',this)">Food</button>
            </div>
        </div>
    </nav>

    <div class="pt-28 pb-32 px-4 max-w-7xl mx-auto">
        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/20 text-green-400 text-xs rounded-xl p-3 mb-4">{{ session('success') }}</div>
        @endif

        <div id="menuGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3"></div>
        <div id="emptyState" class="hidden text-center py-20">
            <span class="iconify text-4xl text-accent/15 mx-auto mb-3" data-icon="mdi:coffee-off-outline"></span>
            <p class="text-sub text-xs">Menu tidak ditemukan.</p>
        </div>
    </div>

    <div id="cartBar" class="fixed bottom-0 left-0 right-0 z-50 glass-card-2 rounded-t-2xl border-t border-s-300/10 transition-all duration-300 {{ $order && $order->items->count() > 0 ? '' : 'hidden' }}">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="iconify text-accent text-xl" data-icon="mdi:cart-outline"></span>
                <div>
                    <span class="text-xs text-sub" id="cartCount">{{ $order ? $order->items->sum('quantity') : 0 }} item</span>
                    <span class="text-sm font-bold text-accent ml-3" id="cartTotal">Rp{{ $order ? number_format($order->total_price, 0, ',', '.') : 0 }}</span>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('orders.index') }}" class="text-[10px] font-medium border border-line-light text-sub px-4 py-2 rounded-full hover:border-s-300/25 transition-all">Lihat Pesanan</a>
                @if($order && $order->items->count() > 0)
                <form method="POST" action="{{ route('orders.checkout', $order->id) }}">
                    @csrf
                    <button class="text-[10px] font-semibold grad-warm text-black px-4 py-2 rounded-full hover:shadow-lg hover:shadow-s-300/20 transition-all">Checkout</button>
                </form>
                @endif
            </div>
        </div>
    </div>

    <div id="toastBox" class="fixed top-20 right-4 z-[200] flex flex-col gap-3"></div>

    @if(session('show_pending_notif'))
    <div id="pendingNotifPesan" class="fixed bottom-6 right-6 z-[150] max-w-sm w-full">
        <div class="relative glass-card rounded-2xl border border-s-300/10 p-4 shadow-2xl shadow-s-300/5 overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-red-500 to-orange-500"></div>
            <button onclick="closePesanNotif()" class="absolute top-2.5 right-2.5 w-6 h-6 flex items-center justify-center rounded-lg text-muted hover:text-main hover:bg-s-300/10 transition-all">
                <span class="iconify text-xs" data-icon="mdi:close"></span>
            </button>
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-500/10 border border-red-500/15 flex items-center justify-center flex-shrink-0">
                    <span class="iconify text-lg text-red-400" data-icon="mdi:bell-ring-outline"></span>
                </div>
                <div class="flex-1 min-w-0 pr-4">
                    <h4 class="text-xs font-bold text-main mb-0.5">Pesanan Baru Ditambahkan</h4>
                    <p class="text-[10px] text-sub leading-relaxed">Pesanan Anda telah tersimpan. Jangan lupa lakukan <strong class="text-red-400">konfirmasi pembayaran</strong> agar diproses.</p>
                    <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-1 mt-2 text-[10px] font-semibold text-accent hover:text-s-300 transition-colors">
                        Lihat Pesanan
                        <span class="iconify text-xs" data-icon="mdi:arrow-right"></span>
                    </a>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-[2px] bg-red-500/20">
                <div id="notifProgressPesan" class="h-full bg-gradient-to-r from-red-500 to-orange-500 rounded-full" style="width:100%"></div>
            </div>
        </div>
    </div>
    @endif

    <form id="orderForm" method="POST" action="{{ route('orders.store') }}" class="hidden">
        @csrf
        <input type="hidden" name="menu_id" id="formMenuId">
        <input type="hidden" name="quantity" id="formQuantity" value="1">
    </form>

    <script>
        const menus = @json($menuData);

        let currentCat = 'all';

        function filterCat(cat, btn) {
            currentCat = cat;
            document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            renderMenus();
        }

        function renderMenus() {
            const filtered = currentCat === 'all' ? menus : menus.filter(m => m.cat === currentCat);
            const grid = document.getElementById('menuGrid');
            const empty = document.getElementById('emptyState');

            if (filtered.length === 0) {
                grid.innerHTML = '';
                empty.classList.remove('hidden');
                return;
            }
            empty.classList.add('hidden');

            grid.innerHTML = filtered.map((m, i) => `
                <div class="menu-item glass-card rounded-xl overflow-hidden border border-line-light" style="animation:fadeIn .4s ${i*0.05}s both">
                    <div class="relative h-28 overflow-hidden">
                        <img src="${m.img}" alt="${m.name}" class="w-full h-full object-cover" loading="lazy">
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-sm rounded-full px-2 py-0.5 text-[10px] font-semibold text-accent">Rp${m.price.toLocaleString('id-ID')}</div>
                        ${m.badge === 'rec' ? '<div class="absolute top-2 left-2 bg-s-300/10 backdrop-blur-sm rounded-full px-2 py-0.5 text-[8px] font-medium text-accent flex items-center gap-1"><span class="iconify" data-icon="mdi:star"></span>Rekomendasi</div>' : ''}
                        ${m.badge === 'best' ? '<div class="absolute top-2 left-2 bg-yellow-500/10 backdrop-blur-sm rounded-full px-2 py-0.5 text-[8px] font-medium text-yellow-500 flex items-center gap-1"><span class="iconify" data-icon="mdi:crown"></span>Best Seller</div>' : ''}
                    </div>
                    <div class="p-3">
                        <h3 class="font-serif text-xs font-semibold text-main mb-1">${m.name}</h3>
                        <p class="text-sub text-[9px] font-light leading-relaxed line-clamp-2 mb-2">${m.desc}</p>
                        <div class="flex items-center gap-2">
                            <div class="flex items-center border border-s-300/10 rounded-lg overflow-hidden">
                                <button type="button" class="qty-btn px-2 py-1 text-xs text-sub hover:text-accent" onclick="changeQty(${m.id}, -1)">−</button>
                                <span class="px-2 py-1 text-xs text-main min-w-[20px] text-center" id="qty-${m.id}">1</span>
                                <button type="button" class="qty-btn px-2 py-1 text-xs text-sub hover:text-accent" onclick="changeQty(${m.id}, 1)">+</button>
                            </div>
                            <button onclick="addOrder(${m.id})" class="flex-1 text-[10px] font-medium grad-warm text-black py-1.5 rounded-lg hover:shadow-md transition-all">Pesan</button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function changeQty(id, delta) {
            const el = document.getElementById('qty-' + id);
            let val = parseInt(el.textContent) + delta;
            if (val < 1) val = 1;
            el.textContent = val;
        }

        function addOrder(id) {
            const qty = parseInt(document.getElementById('qty-' + id).textContent);
            document.getElementById('formMenuId').value = id;
            document.getElementById('formQuantity').value = qty;
            document.getElementById('orderForm').submit();
        }

        function showToast(msg, type = 'success') {
            const c = document.getElementById('toastBox');
            const t = document.createElement('div');
            const bg = type === 'success' ? 'border-green-500/15 bg-green-500/5' : 'border-red-500/15 bg-red-500/5';
            const ic = type === 'success' ? 'text-green-400' : 'text-red-400';
            const ico = type === 'success' ? 'mdi:check-circle-outline' : 'mdi:alert-circle-outline';
            t.className = `glass-card ${bg} rounded-xl px-4 py-2.5 flex items-center gap-2 min-w-[240px] max-w-sm border`;
            t.innerHTML = `<span class="iconify ${ic} text-base flex-shrink-0" data-icon="${ico}"></span><span class="text-xs text-main">${msg}</span>`;
            c.appendChild(t);
            setTimeout(() => { t.style.opacity = '0'; t.style.transition = 'opacity .3s'; setTimeout(() => t.remove(), 300) }, 3000);
        }

        @if(session('show_pending_notif'))
        function closePesanNotif(){
            const n=document.getElementById('pendingNotifPesan');
            if(!n)return;
            n.style.transition='opacity .3s, transform .3s';
            n.style.opacity='0';
            n.style.transform='translateX(80px) scale(.92)';
            setTimeout(()=>n.remove(),300);
        }
        document.addEventListener('DOMContentLoaded',()=>{
            const n=document.getElementById('pendingNotifPesan');
            if(n){
                n.style.opacity='0';
                n.style.transform='translateX(80px) scale(.92)';
                n.style.transition='none';
                requestAnimationFrame(()=>{
                    n.style.transition='opacity .55s cubic-bezier(.16,1,.3,1), transform .55s cubic-bezier(.16,1,.3,1)';
                    n.style.opacity='1';
                    n.style.transform='translateX(0) scale(1)';
                });
                const pb=document.getElementById('notifProgressPesan');
                if(pb){
                    let w=100;
                    const iv=setInterval(()=>{
                        w-=100/(8*60);
                        if(w<=0){w=0;clearInterval(iv);closePesanNotif()}
                        pb.style.width=w+'%';
                    },1000/60);
                }
            }
        });
        @endif

        renderMenus();
    </script>
</body>
</html>
