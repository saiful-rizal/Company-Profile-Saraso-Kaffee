<div id="detailModal" class="fixed inset-0 z-[100] p-4 items-center justify-center" style="display:none"><div class="modal-bg absolute inset-0" onclick="closeModal('detailModal')"></div><div class="relative glass-card rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto border border-line-light" id="detailContent"></div></div>

<div id="loginModal" class="fixed inset-0 z-[100] p-4 items-center justify-center" style="display:none"><div class="modal-bg absolute inset-0" onclick="closeModal('loginModal')"></div>
    <div class="relative glass-card rounded-3xl max-w-md w-full p-6 border border-line-light">
        <button onclick="closeModal('loginModal')" class="absolute top-3 right-3 w-7 h-7 flex items-center justify-center rounded-lg text-muted hover:text-main hover:bg-s-300/10 transition-all"><span class="iconify text-base" data-icon="mdi:close"></span></button>
        <div class="text-center mb-5">
            <div class="w-12 h-12 mx-auto mb-3 rounded-2xl grad-warm-soft border border-line-light flex items-center justify-center"><span class="iconify text-xl text-accent" data-icon="mdi:shield-lock-outline"></span></div>
            <h3 class="font-serif text-lg font-bold text-main">Admin Login</h3>
            <p class="text-sub text-[10px] mt-1">Panel administrator Saraso Koffiehaus</p>
        </div>
        <form onsubmit="submitLogin(event)" class="space-y-3">
            <div><label class="text-[9px] text-sub mb-1 block uppercase tracking-wider">Email</label><input type="email" required placeholder="admin@sarasokoffiehaus.id" class="w-full bg-input border border-line rounded-xl px-3 py-2.5 text-xs text-main placeholder:text-muted"></div>
            <div><label class="text-[9px] text-sub mb-1 block uppercase tracking-wider">Password</label><div class="relative"><input id="loginPw" type="password" required placeholder="••••••••" class="w-full bg-input border border-line rounded-xl px-3 py-2.5 text-xs text-main placeholder:text-muted pr-10"><button type="button" onclick="togglePw()" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-muted hover:text-accent transition-colors"><span class="iconify" id="eyeIco" data-icon="mdi:eye-off-outline"></span></button></div></div>
            <div class="flex items-center justify-between"><label class="flex items-center gap-1.5 cursor-pointer"><input type="checkbox" class="w-3 h-3 rounded border-line bg-input accent-[#D4A56A]"><span class="text-[10px] text-sub">Ingat saya</span></label><a href="#" class="text-[10px] text-accent/50 hover:text-accent transition-colors">Lupa password?</a></div>
            <button type="submit" class="w-full grad-warm text-dk-950 font-semibold text-xs py-3 rounded-xl hover:shadow-lg hover:shadow-s-300/20 transition-all">Masuk</button>
        </form>
        <p class="text-center text-muted text-[8px] mt-4">Demo: admin@sarasokoffiehaus.id / password123</p>
    </div>
</div>

<div id="pendingNotif" class="fixed bottom-6 right-6 z-[150] max-w-sm w-full" style="display:none">
    <div class="relative glass-card rounded-2xl border border-s-300/10 p-4 shadow-2xl shadow-s-300/5 overflow-hidden">
        <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-red-500 to-orange-500"></div>
        <button onclick="closePendingNotif()" class="absolute top-2.5 right-2.5 w-6 h-6 flex items-center justify-center rounded-lg text-muted hover:text-main hover:bg-s-300/10 transition-all">
            <span class="iconify text-xs" data-icon="mdi:close"></span>
        </button>
        <div class="flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-red-500/10 border border-red-500/15 flex items-center justify-center flex-shrink-0">
                <span class="iconify text-lg text-red-400" data-icon="mdi:bell-ring-outline"></span>
            </div>
            <div class="flex-1 min-w-0 pr-4">
                <h4 class="text-xs font-bold text-main mb-0.5">Pesanan Belum Dibayar</h4>
                <p class="text-[10px] text-sub leading-relaxed">Anda memiliki <strong class="text-red-400">{{ $pendingOrderCount }}</strong> pesanan yang belum dibayar. Segera lakukan pembayaran agar pesanan diproses.</p>
                <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-1 mt-2 text-[10px] font-semibold text-accent hover:text-s-300 transition-colors">
                    Lihat Pesanan
                    <span class="iconify text-xs" data-icon="mdi:arrow-right"></span>
                </a>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-[2px] bg-red-500/20">
            <div id="notifProgress" class="h-full bg-gradient-to-r from-red-500 to-orange-500 rounded-full" style="width:100%"></div>
        </div>
    </div>
</div>

<div id="toastBox" class="fixed top-20 right-4 z-[200] flex flex-col gap-3"></div>
