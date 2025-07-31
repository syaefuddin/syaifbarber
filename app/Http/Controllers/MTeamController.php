<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Harga;
use Illuminate\Http\Request;

class MTeamController extends Controller
{
    public function index()
    {
        $karyawan = User::where('role', 'karyawan')->get();
        $hargas = Harga::all();
        return view('pelanggan.team_menu', compact('karyawan', 'hargas'));
    }
}
