<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinlog - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 flex font-sans min-h-screen">

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
        
        <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
            <p class="text-sm font-bold text-slate-800">Alden Setyawan</p>
            <p class="text-[10px] text-slate-400 uppercase tracking-widest">SMKN 9 Malang</p>
        </div>
    </aside>

    <main class="flex-1 p-12 overflow-y-auto">

   @if($menu == 'beranda')
    <div class="flex justify-between items-center mb-10">
        <div>
            <h2 class="text-4xl font-black text-slate-800 tracking-tighter">Beranda Berpijar<span class="text-green-600">.</span></h2>
            <p class="text-slate-400 font-medium mt-1">Pantau produktivitasmu hari ini, Alden.</p>
        </div>
        <div class="flex space-x-3">
            <div class="bg-white p-3 rounded-2xl border border-slate-100 shadow-sm text-center min-w-[80px]">
                <p class="text-[10px] font-black text-slate-400 uppercase leading-none">Hari</p>
                <p class="text-xl font-black text-blue-600">{{ date('d') }}</p>
            </div>
            <div class="bg-blue-600 p-3 rounded-2xl shadow-lg shadow-blue-200 text-center min-w-[80px]">
                <p class="text-[10px] font-black text-blue-100 uppercase leading-none">Bulan</p>
                <p class="text-xl font-black text-white">{{ date('M') }}</p>
            </div>
        </div>
    </div>

    <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 rounded-[45px] p-10 mb-12 shadow-2xl shadow-blue-100">
        <div class="absolute -top-10 -right-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-green-400/20 rounded-full blur-2xl"></div>

        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center">
            <div class="max-w-md text-center md:text-left">
                <span class="px-4 py-1 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-bold text-white uppercase tracking-widest">Update Terbaru</span>
                <h3 class="text-4xl font-black text-white mt-4 leading-tight">Jangan biarkan harimu berlalu tanpa makna.</h3>
                <p class="text-blue-100 mt-4 font-medium italic">"Masa depan adalah milik mereka yang percaya pada keindahan mimpi mereka."</p>
            </div>
            <div class="mt-8 md:mt-0">
                <a href="{{ route('dashboard', ['menu' => 'tambah']) }}" class="group bg-white text-blue-600 px-10 py-5 rounded-3xl font-black shadow-xl hover:scale-105 transition-all flex items-center space-x-3">
                    <span>Buat Log Baru</span>
                    <i class="fa-solid fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-white p-6 rounded-[35px] border border-slate-100 shadow-sm hover:border-blue-200 transition group">
            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-4 group-hover:bg-blue-600 group-hover:text-white transition">
                <i class="fa-solid fa-layer-group text-xl"></i>
            </div>
            <p class="text-slate-400 font-bold text-[10px] uppercase tracking-widest">Total Aktivitas</p>
            <p class="text-3xl font-black text-slate-800 mt-1">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white p-6 rounded-[35px] border border-slate-100 shadow-sm hover:border-indigo-200 transition group">
            <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-4 group-hover:bg-indigo-600 group-hover:text-white transition">
                <i class="fa-solid fa-graduation-cap text-xl"></i>
            </div>
            <p class="text-slate-400 font-bold text-[10px] uppercase tracking-widest">Fokus Sekolah</p>
            <p class="text-3xl font-black text-slate-800 mt-1">{{ $stats['sekolah'] }}</p>
        </div>
        <div class="bg-white p-6 rounded-[35px] border border-slate-100 shadow-sm hover:border-purple-200 transition group">
            <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-4 group-hover:bg-purple-600 group-hover:text-white transition">
                <i class="fa-solid fa-gamepad text-xl"></i>
            </div>
            <p class="text-slate-400 font-bold text-[10px] uppercase tracking-widest">Waktu Bermain</p>
            <p class="text-3xl font-black text-slate-800 mt-1">{{ $stats['bermain'] }}</p>
        </div>
        <div class="bg-white p-6 rounded-[35px] border border-slate-100 shadow-sm hover:border-green-200 transition group">
            <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 mb-4 group-hover:bg-green-600 group-hover:text-white transition">
                <i class="fa-solid fa-bolt text-xl"></i>
            </div>
            <p class="text-slate-400 font-bold text-[10px] uppercase tracking-widest">Kebugaran</p>
            <p class="text-3xl font-black text-slate-800 mt-1">{{ $stats['olahraga'] }}</p>
        </div>
    </div>

                    <div class="mb-12">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-black text-slate-800 tracking-tight">Tugas Mendesak</h3>
        <span class="px-4 py-1 bg-red-50 text-red-500 text-[10px] font-black rounded-full uppercase">Perlu Perhatian</span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse($todos->where('is_completed', false)->take(2) as $t)
        <div class="bg-white p-6 rounded-[35px] border-l-8 {{ $t->priority == 'high' ? 'border-red-500' : 'border-blue-500' }} shadow-sm flex justify-between items-center">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $t->due_date }}</p>
                <h4 class="text-lg font-black text-slate-800">{{ $t->task }}</h4>
            </div>
            <span class="px-3 py-1 rounded-xl text-[10px] font-black uppercase {{ $t->priority == 'high' ? 'bg-red-100 text-red-600' : 'bg-slate-100 text-slate-600' }}">
                {{ $t->priority }}
            </span>
        </div>
        @empty
        <div class="md:col-span-2 p-8 text-center bg-slate-50 rounded-[35px] border-2 border-dashed border-slate-200">
            <p class="text-slate-400 font-medium italic">Tidak ada tugas mendesak. Kerja bagus!</p>
        </div>
        @endforelse
    </div>
</div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-black text-slate-800 tracking-tight">Baru Saja Selesai</h3>
                <a href="{{ route('dashboard', ['menu' => 'activity']) }}" class="text-blue-600 font-bold text-sm">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                @forelse($logs->take(3) as $log)
                <div class="flex items-center p-5 bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition">
                    <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center text-2xl mr-5">
                        @if($log->category == 'Sekolah') 📚 @elseif($log->category == 'Bermain') 🎮 @elseif($log->category == 'Olahraga') ⚽ @else ✨ @endif
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-slate-800 text-lg leading-none">{{ $log->title }}</h4>
                        <p class="text-slate-400 text-xs mt-2 font-medium">{{ Str::limit($log->description, 50) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-black text-blue-500 uppercase">{{ $log->category }}</p>
                    </div>
                </div>
                @empty
                <div class="p-10 text-center bg-slate-50 rounded-[35px] border-2 border-dashed border-slate-200 text-slate-400 font-medium">
                    Belum ada riwayat hari ini.
                </div>

                @endforelse
            </div>
        </div>

        <div class="space-y-6">
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Tips Produktif</h3>
            <div class="bg-indigo-50 p-8 rounded-[40px] border border-indigo-100">
                <div class="text-indigo-600 text-3xl mb-4"><i class="fa-solid fa-lightbulb"></i></div>
                <h4 class="font-bold text-indigo-900 text-lg">Teknik Pomodoro</h4>
                <p class="text-indigo-700/70 text-sm mt-2 leading-relaxed">Fokus belajar selama 25 menit, lalu istirahat 5 menit. Biar otak tetap segar!</p>
            </div>
            <div class="bg-green-50 p-8 rounded-[40px] border border-green-100">
                <div class="text-green-600 text-3xl mb-4"><i class="fa-solid fa-leaf"></i></div>
                <h4 class="font-bold text-green-900 text-lg">Minum Air Putih</h4>
                <p class="text-green-700/70 text-sm mt-2 leading-relaxed">Jangan lupa hidrasi tubuhmu di sela-sela aktivitas padatmu.</p>
            </div>
        </div>
    </div>

        @elseif($menu == 'activity')
            <h2 class="text-4xl font-black text-slate-800 mb-8 tracking-tight">Riwayat Aktivitas</h2>
            <div class="relative border-l-4 border-slate-200 ml-4">
                @forelse($logs as $log)
                <div class="mb-10 ml-8 relative">
                    <div class="absolute w-4 h-4 bg-white border-4 border-blue-500 rounded-full -left-[40px] top-1 shadow-sm"></div>
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition">
                        <div class="flex justify-between items-center mb-4">
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] rounded-lg font-black uppercase tracking-tighter">{{ $log->category }}</span>
                            <span class="text-xs font-bold text-slate-300">{{ $log->log_date }}</span>
                        </div>
                        <h4 class="text-2xl font-black text-slate-800">{{ $log->title }}</h4>
                        <p class="text-slate-500 mt-2 leading-relaxed">{{ $log->description }}</p>
                    </div>
                </div>
                @empty
                <p class="ml-8 text-slate-400 italic">Belum ada aktivitas. Klik menu Tambah untuk memulai.</p>
                @endforelse
            </div>

        @elseif($menu == 'tambah')
            <h2 class="text-4xl font-black text-slate-800 mb-8 tracking-tight">Tambah Log Baru</h2>
            <div class="bg-white p-10 rounded-[40px] border border-slate-200 shadow-sm max-w-3xl">
                <form action="{{ route('logs.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Aktivitas</label>
                        <input type="text" name="title" placeholder="Contoh: Bermain bola atau Tugas Web" required class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-blue-500 focus:bg-white transition-all outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Jenis Aktivitas</label>
                        <div class="relative">
                            <select name="category" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-blue-500 focus:bg-white transition-all outline-none appearance-none cursor-pointer">
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
                        <textarea name="description" rows="4" placeholder="Apa yang kamu lakukan?" required class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-blue-500 focus:bg-white transition-all outline-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal</label>
                        <input type="date" name="log_date" value="{{ date('Y-m-d') }}" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white font-black py-5 rounded-2xl shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all uppercase tracking-widest">SIMPAN AKTIVITAS</button>
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
                        <div class="bg-blue-500 h-full rounded-xl transition-all duration-700" style="width: {{ ($categoryLogs->count() / $stats['total']) * 100 }}%"></div>
                    </div>
                </div>
                @empty
                <p class="text-center text-slate-400 py-10 italic">Belum ada data progres untuk ditampilkan.</p>
                @endforelse
            </div>

          @elseif($menu == 'todo')
    <h2 class="text-4xl font-black text-slate-800 mb-8 tracking-tight">Rencana & Deadline</h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <div class="lg:col-span-1">
            <div class="bg-white p-8 rounded-[40px] border border-slate-200 shadow-sm sticky top-10">
                <form action="{{ route('todo.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-xs font-black text-slate-400 uppercase mb-2">Apa yang akan dikerjakan?</label>
                        <input type="text" name="task" placeholder="Contoh: Deadline Proyek Laravel" required 
                            class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase mb-2">Deadline</label>
                            <input type="date" name="due_date" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 border-none outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase mb-2">Prioritas</label>
                            <select name="priority" class="w-full px-4 py-3 rounded-2xl bg-slate-50 border-none outline-none text-sm">
                                <option value="low">Rendah</option>
                                <option value="medium" selected>Sedang</option>
                                <option value="high">Tinggi</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all uppercase tracking-widest">Tambah Tugas</button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-4">
            @forelse($todos as $todo)
            <div class="group flex items-center justify-between p-6 bg-white rounded-[35px] border border-slate-100 shadow-sm transition hover:shadow-md">
                <div class="flex items-center space-x-6">
                    <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <button type="submit" class="w-10 h-10 rounded-2xl border-2 {{ $todo->is_completed ? 'bg-green-500 border-green-500 text-white' : 'border-slate-100 bg-slate-50' }} flex items-center justify-center transition shadow-sm">
                            @if($todo->is_completed) <i class="fa-solid fa-check text-sm"></i> @endif
                        </button>
                    </form>
                    <div>
                        <span class="text-lg font-bold {{ $todo->is_completed ? 'text-slate-300 line-through' : 'text-slate-800' }}">
                            {{ $todo->task }}
                        </span>
                        <div class="flex items-center space-x-3 mt-1">
                            <span class="text-[10px] font-black uppercase {{ $todo->priority == 'high' ? 'text-red-500' : 'text-blue-400' }}">
                                <i class="fa-solid fa-flag mr-1"></i> {{ $todo->priority }}
                            </span>
                            <span class="text-[10px] font-bold text-slate-300">
                                <i class="fa-solid fa-calendar-day mr-1"></i> {{ $todo->due_date }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <form action="{{ route('todo.delete', $todo->id) }}" method="POST" class="opacity-0 group-hover:opacity-100 transition">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-10 h-10 flex items-center justify-center text-red-400 hover:bg-red-50 rounded-2xl transition">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </div>
            @empty
            <div class="text-center py-20 bg-white rounded-[45px] border-2 border-dashed border-slate-100">
                <p class="text-slate-300 font-medium">Semua tugas sudah beres? Kamu luar biasa!</p>
            </div>
            @endforelse
        </div>
    </div>
@endif
    </main>
</body>
</html>