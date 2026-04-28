<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinDone - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 flex min-h-screen">

    <aside class="w-72 bg-white h-screen sticky top-0 border-r border-slate-200 p-8 flex flex-col shadow-sm">
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
        
        <div class="mt-auto pt-6 border-t border-slate-50">
            <div class="p-4 bg-slate-50 rounded-[30px] border border-slate-100 flex items-center space-x-3 shadow-sm hover:shadow-md transition">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Alden+Setyawan&background=3b82f6&color=fff" 
                         alt="Profile" class="w-10 h-10 rounded-2xl shadow-sm">
                    <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
                </div>
                <div class="flex-1 overflow-hidden text-left">
                    <p class="text-xs font-black text-slate-800 truncate">Alden Setyawan</p>
                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter truncate">XI RPL 1 • SMKN 9</p>
                </div>
                <form action="{{ route('login') }}" method="GET">
                    <button type="submit" class="text-slate-300 hover:text-red-500 transition-colors">
                        <i class="fa-solid fa-right-from-bracket text-xs"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <main class="flex-1 p-12 overflow-y-auto">
        @yield('content')
    </main>

</body>
</html>