<section id="menu" class="py-16 px-6 relative bg-section">
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center mb-8">
            <span class="reveal text-[9px] font-medium text-accent tracking-[0.25em] uppercase">Rp25.000 – Rp50.000/orang</span>
            <h2 class="reveal font-serif text-2xl md:text-4xl font-bold text-main mt-3 tracking-tight">Menu <span class="text-grad">Kami</span></h2>
            <p class="reveal text-sub text-xs mt-3 max-w-md mx-auto font-light">Dari kopi klasik hingga signature racikan, temukan favoritmu</p>
        </div>
        <div class="reveal flex flex-col lg:flex-row items-center justify-between gap-3 mb-6">
            <div class="relative w-full lg:w-72">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-accent/25 text-base" data-icon="mdi:magnify"></span>
                <input id="menuSearch" type="text" placeholder="Cari menu..." oninput="filterMenu()" class="w-full bg-input border border-line rounded-xl pl-10 pr-3 py-2.5 text-xs text-main placeholder:text-muted">
            </div>
            <div class="flex flex-wrap gap-1.5 justify-center" id="catBtns">
                <button class="cat-btn active text-[10px] font-medium px-3 py-1.5 rounded-full border cat-border text-sub" onclick="setCat('all',this)"><span>Semua</span></button>
                <button class="cat-btn text-[10px] font-medium px-3 py-1.5 rounded-full border cat-border text-sub" onclick="setCat('basic',this)"><span>Basic</span></button>
                <button class="cat-btn text-[10px] font-medium px-3 py-1.5 rounded-full border cat-border text-sub" onclick="setCat('signature',this)"><span>Signature</span></button>
                <button class="cat-btn text-[10px] font-medium px-3 py-1.5 rounded-full border cat-border text-sub" onclick="setCat('refreshment',this)"><span>Refreshment</span></button>
                <button class="cat-btn text-[10px] font-medium px-3 py-1.5 rounded-full border cat-border text-sub" onclick="setCat('non-coffee',this)"><span>Non Coffee</span></button>
                <button class="cat-btn text-[10px] font-medium px-3 py-1.5 rounded-full border cat-border text-sub" onclick="setCat('sumatra',this)"><span>Sumatera</span></button>
                <button class="cat-btn text-[10px] font-medium px-3 py-1.5 rounded-full border cat-border text-sub" onclick="setCat('dessert',this)"><span>Dessert</span></button>
                <button class="cat-btn text-[10px] font-medium px-3 py-1.5 rounded-full border cat-border text-sub" onclick="setCat('food',this)"><span>Food</span></button>
            </div>
        </div>
        <div id="menuGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8"></div>
        <div id="emptyState" class="hidden text-center py-10"><span class="iconify text-4xl text-accent/15 mx-auto mb-3" data-icon="mdi:coffee-off-outline"></span><p class="text-sub text-xs">Menu tidak ditemukan.</p></div>
        <div id="pagination" class="flex items-center justify-center gap-2"></div>
    </div>
</section>
