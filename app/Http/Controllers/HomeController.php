<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StyleRambut;
use App\Models\Semir;

class HomeController extends Controller
{
    public function index()
    {
        $styles = StyleRambut::all();
        $semirs = Semir::all();
        return view('pelanggan.home', compact('styles', 'semirs'));
    }
}
