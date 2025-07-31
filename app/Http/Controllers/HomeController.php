<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StyleRambut;
use App\Models\Semir;
use App\Models\User;
use App\Models\Harga;

class HomeController extends Controller
{
    public function index()
    {
        $styles = StyleRambut::all();
        $semirs = Semir::all();
        $hargas = Harga::all();
        $karyawan = User::where('role', 'karyawan')->get();
        return view('pelanggan.beranda_menu', compact('styles', 'semirs', 'karyawan', 'hargas'));
    }
}
