<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

// Halaman Landing (Halaman awal)
Route::get('/', function () {
    return view('landing');
});

// Halaman Utama (Dashboard)
// PASTIKAN ada kurung siku [ ] dan gunakan tanda koma ,
Route::get('/dashboard', [ActivityController::class, 'index'])->name('dashboard');

// Route untuk simpan data
Route::post('/logs', [ActivityController::class, 'store'])->name('logs.store');

Route::post('/todo', [ActivityController::class, 'storeTodo'])->name('todo.store');
Route::patch('/todo/{id}', [ActivityController::class, 'updateTodo'])->name('todo.update');
Route::delete('/todo/{id}', [ActivityController::class, 'deleteTodo'])->name('todo.delete');

Route::get('/', function () {
    return view('landing');
});

Route::post('/login', function () {
    // Logika autentikasi di sini...
    
    // Jika berhasil, arahkan ke dashboard menu beranda
    return redirect()->route('dashboard', ['menu' => 'beranda']);
})->name('login');