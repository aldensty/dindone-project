@extends('layouts.app')

@section('content')
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

    @endsection