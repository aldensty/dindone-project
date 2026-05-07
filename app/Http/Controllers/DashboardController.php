<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter menu dari URL, contoh: ?menu=todo
        $menu = $request->query('menu', 'beranda');

        // Memanggil file: resources/views/menus/{nama_menu}.blade.php
        return view('menus.' . $menu, compact('menu'));
    }
}