<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Sector;

class WelcomeController extends Controller
{
    public function index()
    {
        $sectors = Sector::withCount('businesses')->get()->take(8);

        return view('welcome', compact('sectors'));
    }
}
