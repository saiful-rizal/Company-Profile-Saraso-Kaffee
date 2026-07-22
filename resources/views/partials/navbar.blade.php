<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 glass-nav h-14 flex items-center transition-all duration-500">
    <div class="max-w-7xl mx-auto w-full px-5 flex items-center justify-between">
        <a href="#home" class="flex items-center gap-2 group">
            <div class="w-7 h-7 rounded-lg grad-warm flex items-center justify-center shadow-lg shadow-s-300/10">
                <span class="iconify text-dk-950 text-base" data-icon="mdi:coffee"></span>
            </div>
            <div class="leading-none">
                <span class="font-serif text-base font-semibold text-main tracking-[0.15em]">SARASO</span>
                <span class="block text-[7px] text-accent tracking-[0.25em] uppercase mt-0.5">Koffiehaus</span>
            </div>
        </a>
        <div class="hidden md:flex items-center gap-6">
            <a href="#home" class="nav-link text-[12px] transition-colors">Home</a>
            <a href="#menu" class="nav-link text-[12px] transition-colors">Menu</a>
            <a href="#about" class="nav-link text-[12px] transition-colors">Tentang</a>
            <a href="#gallery" class="nav-link text-[12px] transition-colors">Gallery</a>
            <a href="#contact" class="nav-link text-[12px] transition-colors">Contact</a>
            <div class="flex items-center gap-2 ml-1">
                <div class="theme-toggle" onclick="toggleTheme()" title="Toggle theme" style="transform:scale(.85)">
                    <div class="thumb"><span class="iconify" id="themeIcon" data-icon="mdi:moon-waning-crescent"></span></div>
                </div>
                <a href="{{ route('orders.index') }}" class="text-[10px] font-medium grad-warm-soft text-accent border border-line-light px-3 py-1.5 rounded-full hover:border-s-300/25 transition-all flex items-center gap-1">
                    <span class="iconify text-xs" data-icon="mdi:cart-outline"></span>Pesanan
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-[10px] font-medium text-red-400 border border-red-500/20 px-3 py-1.5 rounded-full hover:bg-red-500/10 transition-all flex items-center gap-1">
                        <span class="iconify text-xs" data-icon="mdi:logout"></span>Logout
                    </button>
                </form>
            </div>
        </div>
        <div class="flex items-center gap-2 md:hidden">
            <div class="theme-toggle" onclick="toggleTheme()" style="transform:scale(.75)"><div class="thumb"><span class="iconify" id="themeIconMob" data-icon="mdi:moon-waning-crescent"></span></div></div>
            <button id="mobToggle" onclick="toggleMob()" class="text-main text-xl"><span class="iconify" data-icon="mdi:menu"></span></button>
        </div>
    </div>
    <div id="mobMenu" class="absolute top-14 left-0 right-0 glass-nav border-t border-line md:hidden hidden">
        <div class="flex flex-col px-5 py-3 gap-1">
            <a href="#home" onclick="closeMob()" class="nav-link text-xs py-1.5">Home</a>
            <a href="#menu" onclick="closeMob()" class="nav-link text-xs py-1.5">Menu</a>
            <a href="#about" onclick="closeMob()" class="nav-link text-xs py-1.5">Tentang</a>
            <a href="#gallery" onclick="closeMob()" class="nav-link text-xs py-1.5">Gallery</a>
            <a href="#contact" onclick="closeMob()" class="nav-link text-xs py-1.5">Contact</a>
            <a href="{{ route('order.create') }}" onclick="closeMob()" class="text-[10px] font-medium grad-warm text-dk-950 px-3 py-1.5 rounded-full w-fit mt-1">Pesan Menu</a>
            <a href="{{ route('orders.index') }}" onclick="closeMob()" class="text-[10px] font-medium grad-warm-soft text-accent border border-line-light px-3 py-1.5 rounded-full w-fit mt-1">Pesanan Saya</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-1">
                @csrf
                <button type="submit" class="text-[10px] font-medium text-red-400 border border-red-500/20 px-3 py-1.5 rounded-full w-fit">Logout</button>
            </form>
        </div>
    </div>
</nav>
