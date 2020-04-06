<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $sectors = Sector::get()->take(8);

        return view('welcome', compact('sectors'));
    }    
}
