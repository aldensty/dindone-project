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
            @php $menus = [
                ['id' => 'beranda', 'icon' => 'house', 'label' => 'Beranda'],
                ['id' => 'todo', 'icon' => 'list-check', 'label' => 'To-Do List'],
                ['id' => 'activity', 'icon' => 'chart-line', 'label' => 'Activity'],
                ['id' => 'tambah', 'icon' => 'plus', 'label' => 'Tambah'],
                ['id' => 'progres', 'icon' => 'trophy', 'label' => 'Progres'],
            ]; @endphp

            @foreach($menus as $m)
            <a href="{{ route('dashboard', ['menu' => $m['id']]) }}" 
               class="flex items-center space-x-4 p-4 {{ $menu == $m['id'] ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-500 hover:bg-slate-50' }} rounded-2xl font-bold transition">
                <i class="fa-solid fa-{{ $m['icon'] }}"></i> <span>{{ $m['label'] }}</span>
            </a>
            @endforeach
        </nav>
        <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
            <p class="text-sm font-bold text-slate-800">Alden Setyawan</p>
            <p class="text-[10px] text-slate-400 uppercase tracking-widest">SMKN 9 Malang</p>
        </div>
    </aside>

    <main class="flex-1 p-12 overflow-y-auto">
        @yield('content')
    </main>
</body>
</html>