<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Saraso Koffiehaus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #050403; color: #F5E6D0; }
        .glass-card { background: rgba(28,25,23,.45); backdrop-filter: blur(10px); border: 1px solid rgba(212,165,106,.06); }
        .bg-input { background: rgba(20,18,17,.7); }
        .border-line { border-color: rgba(212,165,106,.06); }
        .border-line-light { border-color: rgba(212,165,106,.1); }
        .text-main { color: #F5E6D0; }
        .text-sub { color: rgba(245,230,208,.45); }
        .text-muted { color: rgba(245,230,208,.3); }
        .text-accent { color: #D4A56A; }
        .grad-warm { background: linear-gradient(135deg,#D4A56A 0%,#E8CBA4 40%,#C4914F 100%); }
        .grad-warm-soft { background: linear-gradient(135deg,rgba(212,165,106,.12),rgba(168,118,53,.06)); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4" style="background-image: url('{{ asset('assets/auth-bg.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
    <div class="relative glass-card rounded-3xl max-w-md w-full p-6 border border-line-light">
        <div class="text-center mb-6">
            <div class="w-14 h-14 mx-auto mb-3 rounded-2xl grad-warm-soft border border-line-light flex items-center justify-center">
                <span class="iconify text-2xl text-accent" data-icon="mdi:coffee"></span>
            </div>
            <h3 class="font-serif text-2xl font-bold text-main">Saraso Koffiehaus</h3>
            <p class="text-sub text-xs mt-1">Silakan masuk untuk melanjutkan</p>
        </div>

        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 text-xs rounded-xl p-3 mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="text-[9px] text-sub mb-1 block uppercase tracking-wider">Email</label>
                <input type="email" name="email" required placeholder="admin@sarasokoffiehaus.id" class="w-full bg-input border border-line rounded-xl px-3 py-2.5 text-xs text-main placeholder:text-muted focus:outline-none focus:border-s-300">
            </div>
            <div>
                <label class="text-[9px] text-sub mb-1 block uppercase tracking-wider">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="passwordInput" required placeholder="••••••••" class="w-full bg-input border border-line rounded-xl px-3 py-2.5 pr-10 text-xs text-main placeholder:text-muted focus:outline-none focus:border-s-300">
                    <button type="button" onclick="togglePassword('passwordInput','eyeIcon')" class="absolute right-3 top-1/2 -translate-y-1/2 text-sub hover:text-main transition-colors">
                        <span class="iconify text-lg" id="eyeIcon" data-icon="mdi:eye-outline"></span>
                    </button>
                </div>
            </div>
            <div class="flex gap-2 mt-2">
                <button type="submit" class="flex-1 grad-warm text-black font-semibold text-xs py-3 rounded-xl hover:shadow-lg hover:shadow-s-300/20 transition-all">
                    Masuk
                </button>
                <a href="{{ route('register') }}" class="flex-1 grad-warm-soft text-accent border border-line-light font-semibold text-xs py-3 rounded-xl hover:bg-s-300/5 transition-all text-center block">
                    Daftar
                </a>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-muted text-[10px]">Demo: admin@sarasokoffiehaus.id / password123</p>
        </div>
    </div>
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.setAttribute('data-icon', 'mdi:eye-off-outline');
            } else {
                input.type = 'password';
                icon.setAttribute('data-icon', 'mdi:eye-outline');
            }
        }
    </script>
</body>
</html>
