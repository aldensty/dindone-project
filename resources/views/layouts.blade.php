<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinDone - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Custom scrollbar agar lebih rapi */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</head>
<!-- Perbaikan 1: Pastikan body memiliki flex dan tinggi penuh -->
<body class="bg-slate-50 flex h-screen overflow-hidden" id="main-body">

    <!-- SIDEBAR (Fixed di Kiri) -->
    <aside class="w-72 bg-white h-screen border-r border-slate-200 p-8 flex flex-col shadow-sm z-50 flex-shrink-0">
        <div class="mb-12 flex items-center space-x-2">
            <img src="{{ asset('assets/img/logodindone.png') }}" alt="dinDone Logo" class="w-26 h-14">
        </div>
        
        <nav class="space-y-4 flex-1">
            <a href="{{ route('dashboard', ['menu' => 'beranda']) }}" class="flex items-center space-x-4 p-4 {{ $menu == 'beranda' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-500 hover:bg-slate-50' }} rounded-2xl font-bold transition">
                <i class="fa-solid fa-house"></i> <span>Beranda</span>
            </a>
            <a href="{{ route('dashboard', ['menu' => 'todo']) }}" class="flex items-center space-x-4 p-4 {{ $menu == 'todo' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-500 hover:bg-slate-50' }} rounded-2xl font-bold transition">
                <i class="fa-solid fa-list-check"></i> <span>To-Do List</span>
            </a>
            <a href="{{ route('dashboard', ['menu' => 'activity']) }}" class="flex items-center space-x-4 p-4 {{ $menu == 'activity' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-500 hover:bg-slate-50' }} rounded-2xl font-bold transition">
                <i class="fa-solid fa-chart-line"></i> <span>Activity</span>
            </a>
            <a href="{{ route('dashboard', ['menu' => 'tambah']) }}" class="flex items-center space-x-4 p-4 {{ $menu == 'tambah' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-500 hover:bg-slate-50' }} rounded-2xl font-bold transition">
                <i class="fa-solid fa-plus"></i> <span>Tambah</span>
            </a>
            <a href="{{ route('dashboard', ['menu' => 'progres']) }}" class="flex items-center space-x-4 p-4 {{ $menu == 'progres' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-500 hover:bg-slate-50' }} rounded-2xl font-bold transition">
                <i class="fa-solid fa-trophy"></i> <span>Progres</span>
            </a>
        </nav>
        
        <div class="mt-auto pt-6 border-t border-slate-100">
            <div class="p-4 bg-slate-50 rounded-[25px] border border-slate-100 flex items-center space-x-3 shadow-sm">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Alden+Setyawan&background=3b82f6&color=fff" alt="Profile" class="w-10 h-10 rounded-2xl shadow-sm">
                    <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
                </div>
                <div class="flex-1 overflow-hidden text-left">
                    <p class="text-xs font-black text-slate-800 truncate">Alden Setyawan</p>
                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter truncate">XI RPL 1 • SMKN 9 Malang</p>
                </div>
                <form action="{{ route('login') }}" method="GET">
                    <button type="submit" class="text-slate-300 hover:text-red-500 transition-colors">
                        <i class="fa-solid fa-right-from-bracket text-xs"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Perbaikan 2: WRAPPER UTAMA KANAN -->
    <!-- flex-1 mengambil sisa ruang, flex-col agar navbar dan main bertumpuk -->
    <div class="flex-1 flex flex-col h-screen min-w-0">
        
        <!-- Perbaikan 3: TOP NAVBAR (Kini posisinya benar di atas) -->
        <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 px-12 py-5 flex-shrink-0 z-40 flex justify-between items-center shadow-sm">
            
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Alden+Setyawan&background=3b82f6&color=fff" 
                         alt="Profile" class="w-11 h-11 rounded-2xl shadow-sm border border-blue-50">
                    <div class="absolute -bottom-1 -right-1 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full"></div>
                </div>
                <div class="flex flex-col text-left">
                    <h4 class="text-sm font-black text-slate-800 leading-none">Alden Setyawan</h4>
                    <p class="text-[10px] text-slate-400 font-bold mt-1 tracking-tight">alden.setyawan@student.smkn9malang.sch.id</p>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <!-- Digital Clock -->
                <div class="bg-slate-900 px-5 py-2.5 rounded-2xl shadow-lg border-r-4 border-blue-500 flex flex-col items-end">
                    <span class="text-[7px] font-black text-blue-400 uppercase tracking-widest leading-none mb-1">Live Time</span>
                    <h2 id="clock" class="text-xl font-black text-white tabular-nums tracking-tighter leading-none">00:00</h2>
                </div>

                <div class="h-8 w-[1px] bg-slate-200"></div>

                <!-- Theme Toggle -->
                <div class="flex items-center space-x-2 bg-slate-100 p-1.5 rounded-xl">
                    <button id="light-mode" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white text-blue-600 shadow-sm transition-all">
                        <i class="fa-solid fa-sun text-xs"></i>
                    </button>
                    <button id="dark-mode" class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 hover:text-slate-600 transition-all">
                        <i class="fa-solid fa-moon text-xs"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Perbaikan 4: AREA CONTENT (Kini Scrollable sendiri) -->
        <!-- flex-1 dan overflow-y-auto penting agar konten bisa di-scroll tanpa meng-scroll navbar -->
        <main class="flex-1 p-12 pt-8 overflow-y-auto bg-slate-50/50 custom-scrollbar">
            @yield('content')
        </main>
    </div>

    <!-- SCRIPTS -->
    <script>
        // Jam Digital
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const clockEl = document.getElementById('clock');
            if(clockEl) clockEl.textContent = `${hours}:${minutes}`;
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Dark Mode Simple Logic
        const lightBtn = document.getElementById('light-mode');
        const darkBtn = document.getElementById('dark-mode');
        const body = document.getElementById('main-body');

        darkBtn.addEventListener('click', () => {
            darkBtn.classList.add('bg-white', 'text-slate-800', 'shadow-sm');
            darkBtn.classList.remove('text-slate-400');
            lightBtn.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
            lightBtn.classList.add('text-slate-400');
            body.classList.add('bg-slate-900');
        });

        lightBtn.addEventListener('click', () => {
            lightBtn.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
            lightBtn.classList.remove('text-slate-400');
            darkBtn.classList.remove('bg-white', 'text-slate-800', 'shadow-sm');
            darkBtn.classList.add('text-slate-400');
            body.classList.remove('bg-slate-900');
        });
    </script>
</body>
</html>