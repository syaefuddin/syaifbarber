<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MTeamController extends Controller
{
    public function index()
    {
        return view('pelanggan.team_menu');
    }
}
