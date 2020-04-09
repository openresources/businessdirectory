<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $results = Business::search($request->keyword)->get();

        $records = $results->count() == 1 ? Str::singular('records') : 'records';
        
        return view('search.index', compact('results', 'records'));
    }
}
