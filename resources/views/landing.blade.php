<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinDone - Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-pattern {
            background-color: #f8fafc;
            background-image: radial-gradient(#3b82f6 0.5px, transparent 0.5px);
            background-size: 24px 24px;
        }
    </style>
</head>
<body class="bg-pattern min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md">
        <div class="flex justify-center mb-10 transition-transform hover:scale-105 duration-500">
            <img src="{{ asset('assets/img/logodindone.png') }}" alt="DinDone Logo" class="w-48 h-auto shadow-sm">
        </div>

        <div class="bg-white p-10 rounded-[45px] shadow-2xl shadow-blue-100 border border-slate-100">
            <div class="mb-8">
                <h2 class="text-2xl font-extrabold text-slate-800">Selamat Datang!</h2>
                <p class="text-slate-400 text-sm font-medium">Silakan masuk untuk mengelola tugasmu.</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-500 transition-colors">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" name="email" placeholder="alden@smkn9malang.sch.id" required
                            class="w-full pl-12 pr-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-blue-500 outline-none transition-all font-medium text-slate-700">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-500 transition-colors">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" name="password" placeholder="••••••••" required
                            class="w-full pl-12 pr-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-blue-500 outline-none transition-all font-medium text-slate-700">
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-black py-4 rounded-2xl shadow-xl shadow-blue-200 hover:bg-blue-700 hover:scale-[1.02] active:scale-95 transition-all uppercase tracking-widest mt-4">
                    Masuk Sekarang
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-slate-50 text-center text-sm font-medium">
                <span class="text-slate-400">Belum punya akun?</span>
                <a href="#" class="text-blue-600 font-extrabold hover:underline ml-1">Daftar</a>
            </div>
        </div>

        <p class="text-center mt-10 text-slate-400 text-[10px] font-bold uppercase tracking-widest">
            &copy; {{ date('Y') }} DinDone Project &bull; SMK Negeri 9 Malang
        </p>
    </div>

</body>
</html>