<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StyleRambut;
use App\Models\Semir;
use App\Models\Harga;

class MStyleController extends Controller
{
    public function index()
    {
        $styles = StyleRambut::all();
        $semirs = Semir::all();
        $hargas = Harga::all();
        return view('pelanggan.style_menu', compact('styles', 'semirs', 'hargas'));
    }
}
