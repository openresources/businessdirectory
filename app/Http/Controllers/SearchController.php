<?php

namespace App\Http\Controllers;

use App\Business;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'keyword' => 'required|min:3|string',
        ]);

        $results = Business::search($request->keyword)->get();

        $records = $results->count() == 1 ? Str::singular('records') : 'records';

        return view('search.index', compact('results', 'records'));
    }
}
