<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinDone - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        #sidebar { width: 18rem !important; transition: width 0.3s ease, background-color 0.3s ease; overflow: hidden; }
        #sidebar.collapsed { width: 5rem !important; }
        #sidebar .menu-item { display: flex; align-items: center; width: 100%; transition: all 0.3s ease; justify-content: flex-start; padding: 0.75rem 1rem; min-height: 3rem; border-radius: 1.25rem; }
        #sidebar.collapsed .menu-item { justify-content: center; padding: 0.75rem 0.75rem; }
        #sidebar .menu-item i { min-width: 1.75rem; text-align: center; }
        #sidebar .menu-text { opacity: 1; width: auto; overflow: hidden; transition: opacity 0.2s ease, width 0.2s ease; white-space: nowrap; margin-left: 0.75rem; }
        #sidebar.collapsed .menu-text { opacity: 0; width: 0; margin-left: 0; }
        #sidebar .sidebar-logo { display: flex; justify-content: flex-start; align-items: center; width: 100%; margin-bottom: 1.5rem; }
        #sidebar.collapsed .sidebar-logo { justify-content: center; padding-left: 0; }
        #sidebar .logo-img { width: 5rem; transition: width 0.3s ease; }
        #sidebar.collapsed .logo-img { width: 2.5rem; }
        #sidebar .profile-box { display: flex; justify-content: flex-start; align-items: center; width: 100%; padding: 0 1rem 1rem; }
        #sidebar.collapsed .profile-box { justify-content: center; }
        #sidebar .profile-inner { width: 100%; max-width: 14rem; display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem; background-color: #f8fafc; border-radius: 9999px; border: 1px solid #e2e8f0; }
        #sidebar.collapsed .profile-inner { justify-content: center; }
        #sidebar .profile-text { opacity: 1; transition: opacity 0.2s ease; }
        #sidebar.collapsed .profile-text { opacity: 0; width: 0; }
        main { margin-left: 18rem; transition: margin-left 0.3s ease; }
        main.sidebar-collapsed { margin-left: 5rem; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        /* Dark mode styles */
        .dark body { background-color: #0f172a; color: #e2e8f0; }
        .dark header,
        .dark aside,
        .dark main,
        .dark .bg-white,
        .dark .bg-slate-50,
        .dark .bg-slate-100,
        .dark .bg-slate-200,
        .dark .bg-white\/20,
        .dark .bg-cyan-50,
        .dark .bg-red-50,
        .dark .bg-red-200,
        .dark .bg-green-50,
        .dark .bg-emerald-100,
        .dark .bg-yellow-50,
        .dark .bg-orange-50,
        .dark .bg-cyan-100,
        .dark .border-slate-100,
        .dark .border-slate-200,
        .dark .border-slate-300,
        .dark .border-cyan-100,
        .dark .border-cyan-200,
        .dark .border-green-200,
        .dark .border-yellow-100,
        .dark .border-white\/50,
        .dark .border-red-200 { background-color: #111827; color: #e2e8f0; border-color: #334155; }
        .dark .text-slate-800,
        .dark .text-slate-900,
        .dark .text-slate-700,
        .dark .text-slate-600,
        .dark .text-white,
        .dark .text-cyan-100,
        .dark .text-cyan-400,
        .dark .text-cyan-600,
        .dark .text-red-500,
        .dark .text-green-600 { color: #e2e8f0; }
        .dark .text-slate-500,
        .dark .text-slate-400,
        .dark .text-slate-300 { color: #94a3b8; }
        .dark .bg-cyan-600 { background-color: #0c4a6e; }
        .dark .bg-cyan-700 { background-color: #0a3a57; }
        .dark .bg-blue-500 { background-color: #0b4f79; }
        .dark .bg-blue-600 { background-color: #0c4a6e; }
        .dark .bg-purple-500 { background-color: #4338ca; }
        .dark .bg-purple-600 { background-color: #4f46e5; }
        .dark .bg-green-400 { background-color: #15803d; }
        .dark .bg-emerald-500 { background-color: #047857; }
        .dark .bg-red-100 { background-color: #7f1d1d; color: #fca5a5; }
        .dark .bg-orange-500 { color: #fcd34d; }
        .dark .bg-gradient-to-br,
        .dark .bg-gradient-to-r { background-image: linear-gradient(to bottom right, #0f172a, #111827); }
        .dark .shadow-cyan-200,
        .dark .shadow-blue-200,
        .dark .shadow-purple-200,
        .dark .shadow-green-200 { box-shadow: 0 10px 15px -3px rgba(15, 23, 42, 0.5); }
        .dark .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.65); }
        .dark .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.4); }
        .dark .shadow-sm { box-shadow: 0 1px 2px 0px rgba(0, 0, 0, 0.25); }
        .dark input,
        .dark textarea,
        .dark select { background-color: #1f2937; color: #e2e8f0; border-color: #475569; }
        .dark input:focus,
        .dark textarea:focus,
        .dark select:focus { border-color: #06b6d4; background-color: #111827; }
        .dark ::placeholder { color: #64748b; }
        .dark table { background-color: #111827; }
        .dark tbody tr { border-color: #334155; }
        .dark tbody tr:hover { background-color: #1f2937; }
        .dark th { background-color: #0f172a; color: #94a3b8; border-color: #334155; }
        .dark td { color: #cbd5e1; }
        .dark .divide-y > :not([hidden]) ~ :not([hidden]) { border-color: #334155; }
        .dark .hover\:bg-slate-50:hover { background-color: #334155; }
        .dark .hover\:bg-cyan-700:hover { background-color: #0a3a57; }
        .dark .hover\:bg-red-50:hover { background-color: #7f1d1d; }
        .dark .hover\:bg-red-200:hover { background-color: #991b1b; }
        .dark .group:hover .bg-white { background-color: #334155; }
        .dark button { color: inherit; }
        .dark .hover\:scale-105:hover { transform: scale(1.05); }
        .dark .group-hover\:opacity-100:hover { opacity: 1; }
        .dark .bg-cyan-50 { background-color: #08414f; }
        .dark .border-cyan-100 { border-color: #164e63; }
        .dark .border-cyan-200 { border-color: #164e63; }
        .dark .text-cyan-900 { color: #38bdf8; }
        .dark .text-cyan-700\/70 { color: rgba(56, 189, 248, 0.7); }
        .dark .shadow-cyan-100 { box-shadow: 0 20px 25px -5px rgba(15, 23, 42, 0.2); }
        .dark .focus\:ring-cyan-500:focus { border-color: #06b6d4; }

    </style>
</head>
<body class="bg-slate-50 flex flex-col font-sans min-h-screen">

    <!-- TOP NAVBAR -->
    <header class="w-full bg-white shadow-sm border-b border-slate-200 px-6 py-4 flex items-center justify-between flex-shrink-0 z-50 sticky top-0">
        <div class="flex items-center space-x-4">
            <!-- Menu Toggle -->
            <button id="menu-toggle" class="text-slate-500 hover:text-slate-700 focus:outline-none">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
            <!-- Logo -->
            <img src="{{ asset('assets/img/logodindone.png') }}" alt="dinDone Logo" class="h-10 w-auto max-w-[160px] object-contain" id="top-logo">
        </div>
        <!-- Profil -->
        <div class="flex items-center space-x-3">
            <!-- Theme Toggle -->
            <div class="flex items-center space-x-2 bg-slate-100 p-1.5 rounded-xl">
                <button id="light-mode" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white text-cyan-600"><i class="fa-solid fa-sun text-xs"></i></button>
                <button id="dark-mode" class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400"><i class="fa-solid fa-moon text-xs"></i></button>
            </div>
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name=Alden+Setyawan&background=3b82f6&color=fff" 
                     alt="Profile" class="w-8 h-8 rounded-full shadow-sm">
                <div class="absolute -bottom-1 -right-1 w-2 h-2 bg-green-500 border border-white rounded-full"></div>
            </div>
            <div class="hidden md:block text-left">
                <p class="text-sm font-bold text-slate-800">Alden Setyawan</p>
                <p class="text-xs text-slate-400">XI RPL 1 • SMKN 9</p>
            </div>
            <form action="{{ route('login') }}" method="GET" class="hidden md:block">
                <button type="submit" class="text-slate-300 hover:text-red-500 transition-colors">
                    <i class="fa-solid fa-right-from-bracket text-sm"></i>
                </button>
            </form>
        </div>
    </header>

    <!-- MAIN CONTENT AREA -->
    <div class="flex flex-1 overflow-hidden">
        <aside id="sidebar" class="bg-white h-screen fixed top-[73px] border-r border-slate-200 flex flex-col shadow-sm overflow-y-auto transition-all duration-300 ease-out" style="left: 0; z-index: 40;">
            <nav class="space-y-3 flex-1 px-2 pt-6">
                <a href="{{ route('dashboard', ['menu' => 'beranda']) }}" class="menu-item rounded-3xl {{ $menu == 'beranda' ? 'bg-cyan-600 text-white shadow-lg shadow-cyan-200' : 'text-slate-500 hover:bg-slate-50' }}">
                    <i class="fa-solid fa-house text-lg"></i>
                    <span class="menu-text font-bold">Beranda</span>
                </a>
                <a href="{{ route('dashboard', ['menu' => 'todo']) }}" class="menu-item rounded-3xl {{ $menu == 'todo' ? 'bg-cyan-600 text-white shadow-lg shadow-cyan-200' : 'text-slate-500 hover:bg-slate-50' }}">
                    <i class="fa-solid fa-list-check text-lg"></i>
                    <span class="menu-text font-bold">To-Do List</span>
                </a>
                <a href="{{ route('dashboard', ['menu' => 'activity']) }}" class="menu-item rounded-3xl {{ $menu == 'activity' ? 'bg-cyan-600 text-white shadow-lg shadow-cyan-200' : 'text-slate-500 hover:bg-slate-50' }}">
                    <i class="fa-solid fa-chart-line text-lg"></i>
                    <span class="menu-text font-bold">Activity</span>
                </a>
                <a href="{{ route('dashboard', ['menu' => 'tambah']) }}" class="menu-item rounded-3xl {{ $menu == 'tambah' ? 'bg-cyan-600 text-white shadow-lg shadow-cyan-200' : 'text-slate-500 hover:bg-slate-50' }}">
                    <i class="fa-solid fa-plus text-lg"></i>
                    <span class="menu-text font-bold">Tambah</span>
                </a>
                <a href="{{ route('dashboard', ['menu' => 'progres']) }}" class="menu-item rounded-3xl {{ $menu == 'progres' ? 'bg-cyan-600 text-white shadow-lg shadow-cyan-200' : 'text-slate-500 hover:bg-slate-50' }}">
                    <i class="fa-solid fa-trophy text-lg"></i>
                    <span class="menu-text font-bold">Progres</span>
                </a>
            </nav>
            <div class="profile-box px-2 pb-6 pt-4">
                <div class="profile-inner">
                    <img src="https://ui-avatars.com/api/?name=Alden+Setyawan&background=3b82f6&color=fff" class="w-10 h-10 rounded-2xl flex-shrink-0">
                    <div class="profile-text">
                        <p class="text-sm font-black text-slate-800">Alden Setyawan</p>
                        <p class="text-[10px] text-slate-400 uppercase tracking-widest">SMKN 9 Malang</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 p-12 overflow-y-auto">

   @if($menu == 'beranda')
    <div class="flex justify-between items-center mb-8">
        <div>
            <div class="flex items-center space-x-3 mb-3">
                <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-cyan-600 rounded-2xl flex items-center justify-center text-white shadow-lg">
                    <i class="fa-solid fa-sparkles text-lg"></i>
                </div>
                <div>
                    <h2 class="text-4xl font-black text-slate-800 tracking-tighter">Beranda Berpijar<span class="text-green-600">.</span></h2>
                    <p class="text-slate-400 font-medium">Pantau produktivitasmu hari ini, Alden.</p>
                </div>
            </div>
        </div>
        <div class="flex space-x-3">
            <div class="bg-white p-3 rounded-2xl border border-slate-100 shadow-sm text-center min-w-[80px] hover:shadow-md transition">
                <p class="text-[10px] font-black text-slate-400 uppercase leading-none">Hari</p>
                <p class="text-xl font-black text-cyan-600">{{ date('d') }}</p>
            </div>
            <div class="bg-cyan-600 p-3 rounded-2xl shadow-lg shadow-cyan-200 text-center min-w-[80px] hover:shadow-lg hover:shadow-cyan-300 transition">
                <p class="text-[10px] font-black text-cyan-100 uppercase leading-none">Bulan</p>
                <p class="text-xl font-black text-white">{{ date('M') }}</p>
            </div>
            <div class="bg-gradient-to-br from-green-400 to-emerald-500 p-3 rounded-2xl shadow-lg shadow-green-200 text-center min-w-[80px] hover:shadow-lg hover:shadow-green-300 transition">
                <p class="text-[10px] font-black text-green-50 uppercase leading-none">Progres</p>
                <p class="text-xl font-black text-white">{{ $stats['total'] > 0 ? round(($stats['total'] / max($stats['total'], 1)) * 100) : 0 }}%</p>
            </div>
        </div>
    </div>

    <!-- Motivasi Hari Ini -->
    <div class="bg-gradient-to-r from-cyan-500 to-cyan-600 p-6 rounded-[35px] text-white shadow-lg shadow-cyan-200 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center">
                    <i class="fa-solid fa-lightbulb text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-black">Motivasi Hari Ini</h3>
                    <p class="text-cyan-100 text-sm italic">"{{ ['Setiap hari adalah kesempatan baru untuk menjadi lebih baik.', 'Konsistensi adalah kunci kesuksesan.', 'Mulai dari hal kecil, hasilnya akan besar.', 'Jangan pernah menyerah pada mimpi-mimpimu.'][array_rand(['Setiap hari adalah kesempatan baru untuk menjadi lebih baik.', 'Konsistensi adalah kunci kesuksesan.', 'Mulai dari hal kecil, hasilnya akan besar.', 'Jangan pernah menyerah pada mimpi-mimpimu.'])] }}"</p>
                </div>
            </div>
            <div class="text-right">
                <div class="text-3xl mb-1">🎯</div>
                <p class="text-cyan-100 text-xs">Keep Going!</p>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 p-6 rounded-[35px] text-white shadow-lg shadow-cyan-200 hover:shadow-xl hover:scale-105 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center group-hover:bg-white group-hover:text-cyan-600 transition">
                    <i class="fa-solid fa-layer-group text-xl"></i>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-black">{{ $stats['total'] }}</p>
                </div>
            </div>
            <p class="text-cyan-100 font-bold text-sm uppercase tracking-widest">Total Aktivitas</p>
            <p class="text-white/80 text-xs mt-1">Hari ini</p>
            <div class="mt-3 bg-white/20 rounded-full h-2">
                <div class="progress-bar bg-white h-2 rounded-full transition-all duration-1000" data-width="{{ $stats['total'] > 0 ? min(100, ($stats['total'] / 10) * 100) : 0 }}"></div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-[35px] text-white shadow-lg shadow-blue-200 hover:shadow-xl hover:scale-105 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center group-hover:bg-white group-hover:text-blue-600 transition">
                    <i class="fa-solid fa-graduation-cap text-xl"></i>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-black">{{ $stats['sekolah'] }}</p>
                </div>
            </div>
            <p class="text-blue-100 font-bold text-sm uppercase tracking-widest">Fokus Sekolah</p>
            <p class="text-white/80 text-xs mt-1">Belajar & Tugas</p>
            <div class="mt-3 bg-white/20 rounded-full h-2">
                <div class="progress-bar bg-white h-2 rounded-full transition-all duration-1000" data-width="{{ $stats['sekolah'] > 0 ? min(100, ($stats['sekolah'] / 5) * 100) : 0 }}"></div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-6 rounded-[35px] text-white shadow-lg shadow-purple-200 hover:shadow-xl hover:scale-105 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center group-hover:bg-white group-hover:text-purple-600 transition">
                    <i class="fa-solid fa-gamepad text-xl"></i>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-black">{{ $stats['bermain'] }}</p>
                </div>
            </div>
            <p class="text-purple-100 font-bold text-sm uppercase tracking-widest">Waktu Bermain</p>
            <p class="text-white/80 text-xs mt-1">Hiburan & Game</p>
            <div class="mt-3 bg-white/20 rounded-full h-2">
                <div class="progress-bar bg-white h-2 rounded-full transition-all duration-1000" data-width="{{ $stats['bermain'] > 0 ? min(100, ($stats['bermain'] / 3) * 100) : 0 }}"></div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-6 rounded-[35px] text-white shadow-lg shadow-green-200 hover:shadow-xl hover:scale-105 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center group-hover:bg-white group-hover:text-green-600 transition">
                    <i class="fa-solid fa-bolt text-xl"></i>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-black">{{ $stats['olahraga'] }}</p>
                </div>
            </div>
            <p class="text-green-100 font-bold text-sm uppercase tracking-widest">Kebugaran</p>
            <p class="text-white/80 text-xs mt-1">Olahraga & Fitness</p>
            <div class="mt-3 bg-white/20 rounded-full h-2">
                <div class="progress-bar bg-white h-2 rounded-full transition-all duration-1000" data-width="{{ $stats['olahraga'] > 0 ? min(100, ($stats['olahraga'] / 3) * 100) : 0 }}"></div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <!-- Left Column: Tasks & Recent Activities -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Urgent Tasks -->
            <div class="bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-2xl font-black text-slate-800 tracking-tight">Tugas Mendesak</h3>
                        <p class="text-slate-400 text-sm mt-1">Prioritaskan yang perlu segera diselesaikan</p>
                    </div>
                    @php
                        $pendingTodos = $todos->where('is_completed', false);
                        $highestPriority = $pendingTodos->isNotEmpty() ? $pendingTodos->sortBy(function($todo) {
                            return ['low' => 1, 'medium' => 2, 'hard' => 3, 'high' => 3][$todo->priority] ?? 0;
                        })->last()->priority : 'low';
                    @endphp
                    <span class="px-4 py-2 {{ in_array($highestPriority, ['hard', 'high']) ? 'bg-red-50 text-red-600 border-red-200' : ($highestPriority == 'medium' ? 'bg-yellow-50 text-yellow-600 border-yellow-200' : 'bg-emerald-50 text-emerald-600 border-emerald-200') }} text-xs font-black rounded-full uppercase tracking-widest border">
                        {{ $pendingTodos->count() }} Pending
                    </span>
                </div>

                <div class="space-y-4">
                    @forelse($todos->where('is_completed', false)->take(3) as $t)
                    <div class="flex items-center p-5 bg-gradient-to-r {{ in_array($t->priority, ['hard', 'high']) ? 'from-red-50 to-red-100 border-red-200' : ($t->priority == 'medium' ? 'from-yellow-50 to-amber-100 border-amber-200' : 'from-emerald-50 to-green-100 border-emerald-200') }} rounded-3xl border-l-8 {{ in_array($t->priority, ['hard', 'high']) ? 'border-red-500' : ($t->priority == 'medium' ? 'border-amber-500' : 'border-emerald-500') }} shadow-sm hover:shadow-md transition-all group">
                        <div class="w-12 h-12 {{ in_array($t->priority, ['hard', 'high']) ? 'bg-red-500' : ($t->priority == 'medium' ? 'bg-yellow-500' : 'bg-emerald-500') }} rounded-2xl flex items-center justify-center text-white mr-4 group-hover:scale-110 transition">
                            <i class="fa-solid fa-{{ in_array($t->priority, ['hard', 'high']) ? 'exclamation-triangle' : ($t->priority == 'medium' ? 'exclamation-triangle' : 'check-circle') }} text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-slate-800 text-lg">{{ $t->task }}</h4>
                            <div class="flex items-center space-x-4 mt-2">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                                    <i class="fa-solid fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($t->due_date)->format('d M Y') }}
                                </span>
                                <span class="px-3 py-1 rounded-xl text-xs font-black uppercase {{ in_array($t->priority, ['hard', 'high']) ? 'bg-red-200 text-red-700' : ($t->priority == 'medium' ? 'bg-yellow-200 text-yellow-700' : 'bg-emerald-200 text-emerald-700') }}">
                                    {{ $t->priority }}
                                </span>
                            </div>
                        </div>
                        <form action="{{ route('todo.update', $t->id) }}" method="POST" class="ml-4">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-10 h-10 bg-green-500 hover:bg-green-600 text-white rounded-2xl flex items-center justify-center transition hover:scale-110">
                                <i class="fa-solid fa-check text-sm"></i>
                            </button>
                        </form>
                    </div>
                    @empty
                    <div class="p-12 text-center bg-gradient-to-br from-green-50 to-emerald-100 rounded-[35px] border-2 border-dashed border-green-200">
                        <div class="text-6xl mb-4">🎉</div>
                        <h4 class="font-bold text-green-800 text-lg mb-2">Kerja Bagus!</h4>
                        <p class="text-green-600 font-medium">Tidak ada tugas mendesak. Nikmati hari produktifmu!</p>
                    </div>
                    @endforelse
                </div>

                @if($todos->where('is_completed', false)->count() > 3)
                <div class="text-center mt-6">
                    <a href="{{ route('dashboard', ['menu' => 'todo']) }}" class="inline-block bg-slate-100 text-slate-700 px-6 py-3 rounded-2xl font-bold hover:bg-slate-200 transition">
                        Lihat Semua Tugas ({{ $todos->where('is_completed', false)->count() }})
                    </a>
                </div>
                @endif
            </div>

            <!-- Recent Activities -->
            <div class="bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-2xl font-black text-slate-800 tracking-tight">Aktivitas Terbaru</h3>
                        <p class="text-slate-400 text-sm mt-1">Riwayat aktivitas hari ini</p>
                    </div>
                    <a href="{{ route('dashboard', ['menu' => 'activity']) }}" class="text-cyan-600 font-bold text-sm hover:text-cyan-700 transition">
                        Lihat Semua →
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($logs->take(4) as $log)
                    <div class="flex items-center p-5 bg-slate-50 rounded-3xl border border-slate-100 hover:bg-slate-100 hover:shadow-md transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br {{ $log->category == 'Sekolah' ? 'from-blue-400 to-blue-600' : ($log->category == 'Bermain' ? 'from-purple-400 to-purple-600' : ($log->category == 'Olahraga' ? 'from-green-400 to-green-600' : 'from-cyan-400 to-cyan-600')) }} rounded-3xl flex items-center justify-center text-2xl text-white mr-5 group-hover:scale-110 transition">
                            @if($log->category == 'Sekolah') 📚 @elseif($log->category == 'Bermain') 🎮 @elseif($log->category == 'Olahraga') ⚽ @else ✨ @endif
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-slate-800 text-lg leading-tight">{{ $log->title }}</h4>
                            <p class="text-slate-500 text-sm mt-1 line-clamp-2">{{ Str::limit($log->description, 80) }}</p>
                            <div class="flex items-center space-x-3 mt-2">
                                <span class="px-2 py-1 bg-cyan-50 text-cyan-600 text-xs rounded-lg font-bold uppercase tracking-widest">{{ $log->category }}</span>
                                <span class="text-xs font-bold text-slate-400">{{ \Carbon\Carbon::parse($log->log_date)->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="p-12 text-center bg-slate-50 rounded-[35px] border-2 border-dashed border-slate-200">
                        <div class="text-6xl mb-4">📝</div>
                        <h4 class="font-bold text-slate-600 text-lg mb-2">Belum Ada Aktivitas</h4>
                        <p class="text-slate-400 font-medium">Mulai catat aktivitas harianmu untuk melihat progress!</p>
                        <a href="{{ route('dashboard', ['menu' => 'tambah']) }}" class="inline-block mt-4 bg-cyan-600 text-white px-6 py-3 rounded-2xl font-bold hover:bg-cyan-700 transition">
                            Tambah Aktivitas Pertama
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Right Column: Insights & Tools -->
        <div class="space-y-8">
            <!-- Daily Insights -->
            <div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-8 rounded-[40px] border border-cyan-100">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 bg-cyan-500 rounded-3xl flex items-center justify-center text-white">
                        <i class="fa-solid fa-lightbulb text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-cyan-900 text-lg">Tips Produktif Hari Ini</h4>
                        <p class="text-cyan-700/70 text-sm">Rahasia produktivitas</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="bg-white/60 backdrop-blur-sm p-4 rounded-2xl border border-white/50">
                        <h5 class="font-bold text-cyan-900 mb-2">🎯 Teknik Pomodoro</h5>
                        <p class="text-cyan-700/80 text-sm">Fokus 25 menit, istirahat 5 menit. Efektif untuk meningkatkan konsentrasi!</p>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm p-4 rounded-2xl border border-white/50">
                        <h5 class="font-bold text-cyan-900 mb-2">💧 Tetap Terhidrasi</h5>
                        <p class="text-cyan-700/80 text-sm">Minum air putih setiap jam untuk menjaga energi dan fokus.</p>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm p-4 rounded-2xl border border-white/50">
                        <h5 class="font-bold text-cyan-900 mb-2">🏃‍♂️ Gerakan Fisik</h5>
                        <p class="text-cyan-700/80 text-sm">Jalan kaki 10 menit setiap 2 jam untuk meningkatkan sirkulasi darah.</p>
                    </div>
                </div>
            </div>

            <!-- Mini Calendar -->
            <div class="bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="font-bold text-slate-800 text-lg">Kalender Minggu Ini</h4>
                    <div class="text-right">
                        <p class="text-2xl font-black text-cyan-600">{{ date('d') }}</p>
                        <p class="text-xs font-bold text-slate-400 uppercase">{{ date('M') }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-7 gap-2 mb-4">
                    @php
                        $days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
                        $today = date('N') - 1; // 0 = Monday
                    @endphp
                    @foreach($days as $index => $day)
                    <div class="text-center p-2 rounded-xl {{ $index == $today ? 'bg-cyan-600 text-white' : 'text-slate-400' }} text-xs font-bold uppercase">
                        {{ $day }}
                    </div>
                    @endforeach
                </div>

                <div class="grid grid-cols-7 gap-2">
                    @for($i = 0; $i < 7; $i++)
                    <div class="aspect-square flex items-center justify-center rounded-xl {{ $i == $today ? 'bg-cyan-100 text-cyan-700 font-black' : 'hover:bg-slate-100 text-slate-600' }} text-sm font-bold transition">
                        {{ date('d', strtotime("monday this week +{$i} days")) }}
                    </div>
                    @endfor
                </div>

                <div class="mt-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl border border-green-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-green-500 rounded-xl flex items-center justify-center text-white">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <div>
                            <p class="text-green-800 font-bold text-sm">Streak Aktif</p>
                            <p class="text-green-600 text-xs">{{ rand(3, 15) }} hari berturut-turut</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Achievement Progress -->
            <div class="bg-gradient-to-br from-yellow-50 to-orange-50 p-8 rounded-[40px] border border-yellow-100">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-3xl flex items-center justify-center text-white">
                        <i class="fa-solid fa-trophy text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-orange-900 text-lg">Pencapaian Minggu Ini</h4>
                        <p class="text-orange-700/70 text-sm">Progress menuju target</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="bg-white/60 backdrop-blur-sm p-4 rounded-2xl border border-white/50">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-orange-900 font-bold text-sm">Aktivitas Harian</span>
                            <span class="text-orange-700 text-xs">{{ $stats['total'] }}/7 hari</span>
                        </div>
                        <div class="bg-orange-200 rounded-full h-2">
                            <div class="bg-orange-500 h-2 rounded-full transition-all duration-1000" style="width: {{ min(100, ($stats['total'] / 7) * 100) }}%"></div>
                        </div>
                    </div>

                    <div class="bg-white/60 backdrop-blur-sm p-4 rounded-2xl border border-white/50">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-orange-900 font-bold text-sm">Todo Completed</span>
                            <span class="text-orange-700 text-xs">{{ $todos->where('is_completed', true)->count() }}/{{ $todos->count() }}</span>
                        </div>
                        <div class="bg-orange-200 rounded-full h-2">
                            <div class="bg-orange-500 h-2 rounded-full transition-all duration-1000" style="width: {{ $todos->count() > 0 ? ($todos->where('is_completed', true)->count() / $todos->count()) * 100 : 0 }}%"></div>
                        </div>
                    </div>

                    <div class="text-center mt-6">
                        <div class="inline-block bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-6 py-3 rounded-2xl font-bold shadow-lg">
                            🔥 {{ rand(85, 95) }}% Progress
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        @elseif($menu == 'activity')
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-4xl font-black text-slate-800 tracking-tight">Riwayat Aktivitas Done-List</h2>
                <a href="{{ route('dashboard', ['menu' => 'tambah']) }}" class="bg-cyan-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center space-x-2">
                    <i class="fa-solid fa-plus text-sm"></i>
                    <span>Tambah Aktivitas</span>
                </a>
            </div>
            <div class="relative border-l-4 border-slate-200 ml-4">
                @forelse($logs as $log)
                <div class="mb-10 ml-8 relative">
                    <div class="absolute w-4 h-4 bg-white border-4 border-cyan-500 rounded-full -left-[40px] top-1 shadow-sm"></div>
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition group">
                        <div class="flex justify-between items-start mb-4">
                            <span class="px-3 py-1 bg-cyan-50 text-cyan-600 text-[10px] rounded-lg font-black uppercase tracking-tighter">{{ $log->category }}</span>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs font-bold text-slate-300">{{ $log->log_date }}</span>
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity flex space-x-1">
                                    <button onclick="editActivity({{ $log->id }}, '{{ $log->title }}', '{{ $log->description }}', '{{ $log->category }}', '{{ $log->log_date }}')" class="text-cyan-500 hover:text-cyan-700 p-1">
                                        <i class="fa-solid fa-edit text-sm"></i>
                                    </button>
                                    <form action="{{ route('logs.destroy', $log->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus aktivitas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 p-1">
                                            <i class="fa-solid fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-2xl font-black text-slate-800">{{ $log->title }}</h4>
                        <p class="text-slate-500 mt-2 leading-relaxed">{{ $log->description }}</p>
                    </div>
                </div>
                @empty
                <div class="ml-8 text-center py-12">
                    <div class="text-6xl mb-4">📝</div>
                    <p class="text-slate-400 italic text-lg">Belum ada aktivitas tercatat.</p>
                    <p class="text-slate-300 text-sm mt-2">Mulai catat aktivitas harianmu dengan klik tombol Tambah Aktivitas di atas!</p>
                </div>
                @endforelse
            </div>

        @elseif($menu == 'tambah')
            <h2 class="text-4xl font-black text-slate-800 mb-8 tracking-tight">Tambah Log Baru</h2>
            <div class="bg-white p-10 rounded-[40px] border border-slate-200 shadow-sm max-w-3xl">
                <form action="{{ route('logs.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Aktivitas</label>
                        <input type="text" name="title" placeholder="Contoh: Bermain bola atau Tugas Web" required class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-cyan-500 focus:bg-white transition-all outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Jenis Aktivitas</label>
                        <div class="relative">
                            <select name="category" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-cyan-500 focus:bg-white transition-all outline-none appearance-none cursor-pointer">
                                <option value="" disabled selected>Pilih jenis kegiatan...</option>
                                <optgroup label="Pendidikan & Tugas">
                                    <option value="Sekolah">📚 Belajar & Sekolah</option>
                                    <option value="Tugas">📝 Pengerjaan Tugas</option>
                                </optgroup>
                                <optgroup label="Hiburan & Sosial">
                                    <option value="Bermain">🎮 Bermain / Game</option>
                                    <option value="Nongkrong">☕ Santai / Hangout</option>
                                    <option value="Hobi">🎨 Hobi & Kreativitas</option>
                                </optgroup>
                                <optgroup label="Kesehatan & Fisik">
                                    <option value="Olahraga">⚽ Olahraga</option>
                                    <option value="Istirahat">🛌 Self Care / Istirahat</option>
                                </optgroup>
                                <optgroup label="Lainnya">
                                    <option value="Organisasi">🤝 Kegiatan Organisasi</option>
                                    <option value="Lain-lain">✨ Lain-lain</option>
                                </optgroup>
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Ceritakan Detailnya</label>
                        <textarea name="description" rows="4" placeholder="Apa yang kamu lakukan?" required class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-cyan-500 focus:bg-white transition-all outline-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal</label>
                        <input type="date" name="log_date" value="{{ date('Y-m-d') }}" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>

                    <button type="submit" class="w-full bg-cyan-600 text-white font-black py-5 rounded-2xl shadow-xl shadow-cyan-200 hover:bg-cyan-700 transition-all uppercase tracking-widest">SIMPAN AKTIVITAS</button>
                </form>
            </div>

        @elseif($menu == 'progres')
            <h2 class="text-4xl font-black text-slate-800 mb-8 tracking-tight">Statistik Progres</h2>
            <div class="bg-white p-10 rounded-[40px] border border-slate-200 shadow-sm space-y-12">
                @php $grouped = $logs->groupBy('category'); @endphp
                @forelse($grouped as $category => $categoryLogs)
                <div>
                    <div class="flex justify-between items-end mb-4">
                        <div>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kategori</span>
                            <h4 class="text-2xl font-black text-slate-800">{{ $category }}</h4>
                        </div>
                        <span class="text-slate-400 font-bold text-sm">{{ $categoryLogs->count() }} Kali</span>
                    </div>
                    <div class="w-full bg-slate-100 h-6 rounded-2xl p-1 overflow-hidden">
                        <div class="bg-cyan-500 h-full rounded-xl transition-all duration-700" style="width: {{ ($categoryLogs->count() / $stats['total']) * 100 }}%"></div>
                    </div>
                </div>
                @empty
                <p class="text-center text-slate-400 py-10 italic">Belum ada data progres untuk ditampilkan.</p>
                @endforelse
            </div>

          @elseif($menu == 'todo')
    <h2 class="text-4xl font-black text-slate-800 mb-6 tracking-tight">Rencana & Deadline</h2>

    <div class="bg-white p-6 rounded-[40px] border border-slate-200 shadow-sm space-y-6">
        <form action="{{ route('todo.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-4 gap-4 items-end">
            @csrf
            <div class="lg:col-span-2">
                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Tugas</label>
                <input type="text" name="task" placeholder="Contoh: Deadline Proyek Laravel" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-slate-200 outline-none focus:ring-2 focus:ring-cyan-500" />
            </div>
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Deadline</label>
                <input type="date" name="due_date" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-slate-200 outline-none focus:ring-2 focus:ring-cyan-500" />
            </div>
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase mb-2">Prioritas</label>
                <select name="priority" class="w-full px-4 py-3 rounded-2xl bg-slate-50 border border-slate-200 outline-none focus:ring-2 focus:ring-cyan-500">
                    <option value="low">Low</option>
                    <option value="medium" selected>Medium</option>
                    <option value="hard">Hard</option>
                </select>
            </div>
            <div>
                <button type="submit" class="w-full bg-cyan-600 text-white font-black py-3 rounded-2xl shadow-lg shadow-cyan-200 hover:bg-cyan-700 transition-all uppercase tracking-widest">Tambah</button>
            </div>
        </form>
        <div class="overflow-x-auto">
            <table class="min-w-full text-left">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="px-6 py-4 text-xs font-black uppercase text-slate-400 tracking-wider">Tugas</th>
                        <th class="px-6 py-4 text-xs font-black uppercase text-slate-400 tracking-wider">Deadline</th>
                        <th class="px-6 py-4 text-xs font-black uppercase text-slate-400 tracking-wider">Prioritas</th>
                        <th class="px-6 py-4 text-xs font-black uppercase text-slate-400 tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-black uppercase text-slate-400 tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($todos as $todo)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <span class="block text-sm font-bold {{ $todo->is_completed ? 'text-slate-300 line-through' : 'text-slate-800' }}">{{ $todo->task }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ $todo->due_date }}</td>
                        <td class="px-6 py-4 text-sm font-black uppercase {{ in_array($todo->priority, ['hard', 'high']) ? 'text-red-500' : ($todo->priority == 'medium' ? 'text-yellow-500' : 'text-emerald-500') }}">{{ $todo->priority }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-black {{ $todo->is_completed ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-600' }}">
                                {{ $todo->is_completed ? 'Selesai' : 'Belum' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <form action="{{ route('todo.update', $todo->id) }}" method="POST" class="inline-block">
                                @csrf @method('PATCH')
                                <button type="submit" class="px-3 py-2 bg-cyan-600 text-white rounded-2xl font-black text-xs hover:bg-cyan-700 transition">Selesai</button>
                            </form>
                            <form action="{{ route('todo.delete', $todo->id) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-2 bg-red-100 text-red-600 rounded-2xl font-black text-xs hover:bg-red-200 transition">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-400">Belum ada tugas. Silakan tambahkan tugas terlebih dahulu.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endif
    </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const main = document.querySelector('main');
        const menuToggle = document.getElementById('menu-toggle');
        const lightModeBtn = document.getElementById('light-mode');
        const darkModeBtn = document.getElementById('dark-mode');

        // Initialize theme and sidebar from localStorage
        function initTheme() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            applyTheme(savedTheme);
        }

        function initSidebar() {
            const savedSidebar = localStorage.getItem('sidebarCollapsed') || 'false';
            if (savedSidebar === 'true') {
                sidebar.classList.add('collapsed');
                sidebar.style.width = '5rem';
                main.classList.add('sidebar-collapsed');
            } else {
                sidebar.classList.remove('collapsed');
                sidebar.style.width = '18rem';
                main.classList.remove('sidebar-collapsed');
            }
        }

        function applyTheme(theme) {
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                darkModeBtn.classList.add('bg-white', 'text-cyan-600');
                darkModeBtn.classList.remove('text-slate-400');
                lightModeBtn.classList.remove('bg-white', 'text-cyan-600');
                lightModeBtn.classList.add('text-slate-400');
            } else {
                document.documentElement.classList.remove('dark');
                lightModeBtn.classList.add('bg-white', 'text-cyan-600');
                lightModeBtn.classList.remove('text-slate-400');
                darkModeBtn.classList.remove('bg-white', 'text-cyan-600');
                darkModeBtn.classList.add('text-slate-400');
            }
        }

        menuToggle.onclick = () => {
            const isCollapsed = sidebar.classList.contains('collapsed');
            
            if (isCollapsed) {
                // Expand
                sidebar.classList.remove('collapsed');
                sidebar.style.width = '18rem';
                main.classList.remove('sidebar-collapsed');
                localStorage.setItem('sidebarCollapsed', 'false');
            } else {
                // Collapse
                sidebar.classList.add('collapsed');
                sidebar.style.width = '5rem';
                main.classList.add('sidebar-collapsed');
                localStorage.setItem('sidebarCollapsed', 'true');
            }
        };

        // Theme toggle
        lightModeBtn.onclick = () => {
            localStorage.setItem('theme', 'light');
            applyTheme('light');
        };

        darkModeBtn.onclick = () => {
            localStorage.setItem('theme', 'dark');
            applyTheme('dark');
        };

        // Apply theme and sidebar on page load
        initTheme();
        initSidebar();

        // Dashboard Animations and Interactions
        function animateCounters() {
            const counters = document.querySelectorAll('.animate-counter');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            });
        }

        function initDashboard() {
            // Animate progress bars on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.width = entry.target.getAttribute('data-width') + '%';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.progress-bar').forEach(bar => {
                observer.observe(bar);
            });

            // Add hover effects to cards
            document.querySelectorAll('.hover-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Initialize counters
            animateCounters();
        }

        // Motivational quotes rotation
        const quotes = [
            "Setiap hari adalah kesempatan baru untuk menjadi lebih baik.",
            "Konsistensi adalah kunci kesuksesan.",
            "Mulai dari hal kecil, hasilnya akan besar.",
            "Jangan pernah menyerah pada mimpi-mimpimu.",
            "Produktivitas dimulai dari disiplin diri.",
            "Setiap langkah kecil membawa perubahan besar."
        ];

        function rotateQuotes() {
            const quoteElement = document.getElementById('daily-quote');
            if (quoteElement) {
                const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
                quoteElement.style.opacity = '0';
                setTimeout(() => {
                    quoteElement.textContent = '"' + randomQuote + '"';
                    quoteElement.style.opacity = '1';
                }, 500);
            }
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initDashboard();
            // Rotate quotes every 30 seconds
            setInterval(rotateQuotes, 30000);
        });

        function closeEditModal() {
            document.getElementById('edit-modal').classList.add('hidden');
            document.getElementById('edit-modal').classList.remove('flex');
        }
    </script>

    <!-- Edit Activity Modal -->
    <div id="edit-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center p-4">
        <div class="bg-white rounded-[40px] shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-black text-slate-800">Edit Aktivitas</h3>
                    <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600">
                        <i class="fa-solid fa-times text-xl"></i>
                    </button>
                </div>

                <form action="" method="POST" id="edit-form" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-activity-id" name="id">

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Aktivitas</label>
                        <input type="text" id="edit-title" name="title" required class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-cyan-500 focus:bg-white transition-all outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Jenis Aktivitas</label>
                        <div class="relative">
                            <select id="edit-category" name="category" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-cyan-500 focus:bg-white transition-all outline-none appearance-none cursor-pointer">
                                <option value="" disabled>Pilih jenis kegiatan...</option>
                                <optgroup label="Pendidikan & Tugas">
                                    <option value="Sekolah">📚 Belajar & Sekolah</option>
                                    <option value="Tugas">📝 Pengerjaan Tugas</option>
                                </optgroup>
                                <optgroup label="Hiburan & Sosial">
                                    <option value="Bermain">🎮 Bermain / Game</option>
                                    <option value="Nongkrong">☕ Santai / Hangout</option>
                                    <option value="Hobi">🎨 Hobi & Kreativitas</option>
                                </optgroup>
                                <optgroup label="Kesehatan & Fisik">
                                    <option value="Olahraga">⚽ Olahraga</option>
                                    <option value="Istirahat">🛌 Self Care / Istirahat</option>
                                </optgroup>
                                <optgroup label="Lainnya">
                                    <option value="Organisasi">🤝 Kegiatan Organisasi</option>
                                    <option value="Lain-lain">✨ Lain-lain</option>
                                </optgroup>
                            </select>
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Ceritakan Detailnya</label>
                        <textarea id="edit-description" name="description" rows="4" required class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-cyan-500 focus:bg-white transition-all outline-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal</label>
                        <input type="date" id="edit-log-date" name="log_date" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-cyan-500 outline-none">
                    </div>

                    <div class="flex space-x-4 pt-4">
                        <button type="submit" class="flex-1 bg-cyan-600 text-white py-4 rounded-2xl font-bold hover:bg-cyan-700 transition-all">
                            <i class="fa-solid fa-save mr-2"></i>Simpan Perubahan
                        </button>
                        <button type="button" onclick="closeEditModal()" class="flex-1 bg-slate-200 text-slate-700 py-4 rounded-2xl font-bold hover:bg-slate-300 transition-all">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>