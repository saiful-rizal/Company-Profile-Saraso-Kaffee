<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Anda — Saraso Koffiehaus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #050403; color: #F5E6D0; }
        .glass-nav { background: rgba(12,10,9,.75); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(212,165,106,.06); }
        .glass-card { background: rgba(28,25,23,.45); backdrop-filter: blur(10px); border: 1px solid rgba(212,165,106,.06); }
        .text-main { color: #F5E6D0; }
        .text-sub { color: rgba(245,230,208,.45); }
        .text-accent { color: #D4A56A; }
        .grad-warm { background: linear-gradient(135deg,#D4A56A 0%,#E8CBA4 40%,#C4914F 100%); }
    </style>
</head>
<body class="min-h-screen pb-20">
    <nav class="sticky top-0 left-0 right-0 z-50 glass-nav h-14 flex items-center">
        <div class="max-w-7xl mx-auto w-full px-5 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="iconify text-xl text-accent" data-icon="mdi:arrow-left"></span>
                <span class="font-serif text-sm font-semibold text-main tracking-tight">Kembali ke Menu</span>
            </a>
            <div class="font-serif text-lg font-bold text-accent">Pesanan Anda</div>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto px-5 py-8 space-y-8">
        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/20 text-green-400 text-xs rounded-xl p-3">
                {{ session('success') }}
            </div>
        @endif

        @php
            $pendingOrders = $orders->where('status', 'pending');
            $completedOrders = $orders->where('status', 'completed');
        @endphp

        <div>
            <h2 class="text-sm font-bold text-main mb-4 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                Belum Dibayar
            </h2>

            @forelse($pendingOrders as $order)
                <div class="glass-card rounded-2xl p-5 border border-line-light mb-4">
                    <div class="flex justify-between items-start mb-4 border-b border-white/5 pb-3">
                        <div>
                            <h3 class="text-sm font-bold text-main">Order #{{ $order->id }}</h3>
                            <p class="text-[10px] text-sub">{{ $order->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <span class="text-[10px] px-2 py-1 rounded-md font-medium bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="space-y-3 mb-4">
                        @foreach($order->items as $item)
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $item->menu->image }}" class="w-10 h-10 object-cover rounded-lg">
                                    <div>
                                        <div class="text-xs font-semibold text-main">{{ $item->menu->name }}</div>
                                        <div class="text-[10px] text-sub">{{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }}</div>
                                    </div>
                                </div>
                                <div class="text-xs font-medium text-main">
                                    Rp{{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-between items-center pt-3 border-t border-white/5">
                        <span class="text-xs text-sub">Total</span>
                        <span class="text-sm font-bold text-accent">Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>

                    <div class="flex gap-2 mt-4">
                        <form method="POST" action="{{ route('orders.checkout', $order->id) }}" class="flex-1">
                            @csrf
                            <button class="w-full grad-warm text-black font-semibold text-xs py-2.5 rounded-xl hover:shadow-lg hover:shadow-s-300/20 transition-all">
                                Konfirmasi
                            </button>
                        </form>
                        <form method="POST" action="{{ route('orders.destroy', $order->id) }}" class="flex-none">
                            @csrf
                            @method('DELETE')
                            <button class="h-full px-4 py-2.5 text-xs font-medium text-red-400 border border-red-500/20 rounded-xl hover:bg-red-500/10 transition-all">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-10 glass-card rounded-2xl border border-line-light">
                    <p class="text-[10px] text-sub">Tidak ada pesanan yang belum dibayar.</p>
                </div>
            @endforelse
        </div>

        <div>
            <h2 class="text-sm font-bold text-main mb-4 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                Sudah Dibayar
            </h2>

            @forelse($completedOrders as $order)
                <div class="glass-card rounded-2xl p-5 border border-line-light mb-4">
                    <div class="flex justify-between items-start mb-4 border-b border-white/5 pb-3">
                        <div>
                            <h3 class="text-sm font-bold text-main">Order #{{ $order->id }}</h3>
                            <p class="text-[10px] text-sub">{{ $order->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <span class="text-[10px] px-2 py-1 rounded-md font-medium bg-green-500/10 text-green-400 border border-green-500/20">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="space-y-3 mb-4">
                        @foreach($order->items as $item)
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $item->menu->image }}" class="w-10 h-10 object-cover rounded-lg">
                                    <div>
                                        <div class="text-xs font-semibold text-main">{{ $item->menu->name }}</div>
                                        <div class="text-[10px] text-sub">{{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }}</div>
                                    </div>
                                </div>
                                <div class="text-xs font-medium text-main">
                                    Rp{{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-between items-center pt-3 border-t border-white/5">
                        <span class="text-xs text-sub">Total</span>
                        <span class="text-sm font-bold text-accent">Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>

                    <form method="POST" action="{{ route('orders.destroy', $order->id) }}" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button class="w-full text-xs font-medium text-red-400 border border-red-500/20 py-2.5 rounded-xl hover:bg-red-500/10 transition-all">
                            Hapus
                        </button>
                    </form>
                </div>
            @empty
                <div class="text-center py-10 glass-card rounded-2xl border border-line-light">
                    <p class="text-[10px] text-sub">Belum ada pesanan yang sudah dibayar.</p>
                </div>
            @endforelse
        </div>

        @if($orders->count() === 0)
            <div class="text-center py-20">
                <span class="iconify text-4xl text-accent/20 mx-auto mb-3" data-icon="mdi:cart-outline"></span>
                <h3 class="text-sm font-bold text-main mb-1">Belum ada pesanan</h3>
                <p class="text-[10px] text-sub mb-4">Silakan pesan menu favorit Anda terlebih dahulu.</p>
                <a href="{{ route('home') }}" class="grad-warm text-black font-semibold text-xs py-2 px-5 rounded-full inline-block">
                    Lihat Menu
                </a>
            </div>
        @endif
    </div>
</body>
</html>
