<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Todo;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $menu = $request->query('menu', 'beranda');
        $logs = ActivityLog::orderBy('log_date', 'desc')->get();
        
        // Mengambil data To-Do List (Urutkan yang belum selesai di atas)
        $todos = Todo::orderBy('is_completed', 'asc')
                     ->orderBy('due_date', 'asc')
                     ->get();

        $stats = [
            'total'    => $logs->count(),
            'sekolah'  => $logs->filter(fn($l) => strtolower($l->category) == 'sekolah')->count(),
            'bermain'  => $logs->filter(fn($l) => strtolower($l->category) == 'bermain')->count(),
            'olahraga' => $logs->filter(fn($l) => strtolower($l->category) == 'olahraga')->count(),
            'lainnya'  => $logs->filter(fn($l) => strtolower($l->category) == 'lain-lain')->count(),
        ];

        return view('welcome', compact('logs', 'menu', 'stats', 'todos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'category'    => 'required',
            'log_date'    => 'required|date',
        ]);

        ActivityLog::create($validated);
        return redirect()->route('dashboard', ['menu' => 'activity']);
    }

    // --- UPDATE NOMOR 3 DI SINI ---
    public function storeTodo(Request $request) 
    {
        // Validasi input tambahan: due_date dan priority
        $validated = $request->validate([
            'task' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required'
        ]);

        // Simpan semua data sekaligus
        Todo::create($validated);

        return redirect()->route('dashboard', ['menu' => 'todo']);
    }

    public function updateTodo($id) 
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['is_completed' => !$todo->is_completed]);
        return back();
    }

    public function deleteTodo($id) 
    {
        Todo::destroy($id);
        return back();
    }

    // CRUD untuk ActivityLog
    public function show($id)
    {
        $log = ActivityLog::findOrFail($id);
        return response()->json($log);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'category'    => 'required',
            'log_date'    => 'required|date',
        ]);

        $log = ActivityLog::findOrFail($id);
        $log->update($validated);
        return redirect()->route('dashboard', ['menu' => 'activity'])->with('success', 'Activity log berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $log = ActivityLog::findOrFail($id);
        $log->delete();
        return redirect()->route('dashboard', ['menu' => 'activity'])->with('success', 'Activity log berhasil dihapus!');
    }
}