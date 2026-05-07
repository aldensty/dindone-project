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
        /* Animasi transisi lebar sidebar */
        #sidebar { transition: width 0.3s ease-in-out; }
        .menu-text { transition: opacity 0.2s ease-in-out; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden" id="main-body">

    <!-- SIDEBAR -->
    <aside id="sidebar" class="w-72 bg-white h-screen border-r border-slate-200 p-6 flex flex-col flex-shrink-0 z-50 relative">
        <!-- Tombol Toggle (Floating) -->
        <button id="toggle-btn" class="absolute -right-3 top-10 bg-blue-600 text-white w-6 h-6 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-700 z-[60]">
            <i id="toggle-icon" class="fa-solid fa-chevron-left text-[10px]"></i>
        </button>

        <!-- Logo -->
        <div class="mb-10 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('assets/img/logodindone.png') }}" alt="Logo" id="logo-img" class="w-26 h-14 transition-all">
        </div>
        
        <nav class="space-y-2 flex-1">
            <a href="#" class="flex items-center space-x-4 p-4 bg-blue-600 text-white rounded-2xl font-bold shadow-lg shadow-blue-100 group">
                <i class="fa-solid fa-house min-w-[20px]"></i> 
                <span class="menu-text opacity-100">Beranda</span>
            </a>
            <a href="#" class="flex items-center space-x-4 p-4 text-slate-500 hover:bg-slate-50 rounded-2xl font-bold transition group">
                <i class="fa-solid fa-list-check min-w-[20px]"></i> 
                <span class="menu-text opacity-100">To-Do List</span>
            </a>
            <a href="#" class="flex items-center space-x-4 p-4 text-slate-500 hover:bg-slate-50 rounded-2xl font-bold transition group">
                <i class="fa-solid fa-chart-line min-w-[20px]"></i> 
                <span class="menu-text opacity-100">Activity</span>
            </a>
        </nav>
        
        <!-- Profile Bawah -->
        <div class="mt-auto pt-6 border-t border-slate-100">
            <div class="p-3 bg-slate-50 rounded-2xl flex items-center space-x-3 overflow-hidden">
                <img src="https://ui-avatars.com/api/?name=Alden+Setyawan&background=3b82f6&color=fff" class="w-10 h-10 rounded-xl flex-shrink-0">
                <div class="flex-1 menu-text opacity-100 min-w-0">
                    <p class="text-xs font-black text-slate-800 truncate">Alden Setyawan</p>
                    <p class="text-[9px] text-slate-400 font-bold">XI RPL 1</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- KONTEN KANAN -->
    <div class="flex-1 relative flex flex-col min-w-0 h-full">
        <!-- NAVBAR -->
        <header class="h-20 bg-white/90 backdrop-blur-md border-b border-slate-200 px-8 flex justify-between items-center flex-shrink-0 z-40">
            <h4 class="text-sm font-black text-slate-800">Ringkasan Aktivitas</h4>
            
            <div class="flex items-center space-x-6">
                <!-- Clock -->
                <div class="bg-slate-900 px-4 py-2 rounded-xl border-r-4 border-blue-500 flex flex-col items-end">
                    <h2 id="clock" class="text-lg font-black text-white tabular-nums">00:00</h2>
                </div>

                <!-- Theme Toggle -->
                <div class="flex items-center space-x-2 bg-slate-100 p-1.5 rounded-xl">
                    <button id="light-mode" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white text-blue-600"><i class="fa-solid fa-sun text-xs"></i></button>
                    <button id="dark-mode" class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400"><i class="fa-solid fa-moon text-xs"></i></button>
                </div>
            </div>
        </header>

        <!-- AREA CONTENT -->
        <main class="flex-1 overflow-y-auto p-8 custom-scrollbar bg-slate-50/50">
            @yield('content')
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggle-btn');
        const toggleIcon = document.getElementById('toggle-icon');
        const menuTexts = document.querySelectorAll('.menu-text');
        const logoImg = document.getElementById('logo-img');

        toggleBtn.onclick = () => {
            const isCollapsed = sidebar.classList.contains('w-72');

            if (isCollapsed) {
                // Menciutkan Sidebar
                sidebar.classList.replace('w-72', 'w-24');
                toggleIcon.classList.replace('fa-chevron-left', 'fa-chevron-right');
                logoImg.style.width = '40px'; // Logo mengecil
                menuTexts.forEach(el => el.classList.add('hidden'));
            } else {
                // Melebarkan Sidebar
                sidebar.classList.replace('w-24', 'w-72');
                toggleIcon.classList.replace('fa-chevron-right', 'fa-chevron-left');
                logoImg.style.width = '100px'; // Logo normal
                setTimeout(() => {
                    menuTexts.forEach(el => el.classList.remove('hidden'));
                }, 150);
            }
        };

        // Jam Digital
        function updateClock() {
            const now = new Date();
            document.getElementById('clock').textContent = now.getHours().toString().padStart(2, '0') + ":" + now.getMinutes().toString().padStart(2, '0');
        }
        setInterval(updateClock, 1000); updateClock();
    </script>
</body>
</html>