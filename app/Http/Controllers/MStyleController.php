<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StyleRambut;

class MStyleController extends Controller
{
    public function index()
    {
        $styles = StyleRambut::all();
        return view('pelanggan.style_menu', compact('styles'));
    }
}
