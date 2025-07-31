<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harga;

class AboutController extends Controller
{
    public function index()
    {
        $hargas = Harga::all();
        return view('pelanggan.about_menu', compact('hargas'));
    }
}
