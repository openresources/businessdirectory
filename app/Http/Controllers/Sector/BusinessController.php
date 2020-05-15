<?php

namespace App\Http\Controllers\Sector;

use App\Business;
use App\Http\Controllers\Controller;
use App\Sector;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function index(Sector $sector)
    {
        $businesses = $sector->businesses;
        return view('sectors.businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function create(Sector $sector)
    {

    }

    public function edit(Sector $sector, Business $business)
    {
        return view('businesses.edit', compact('business'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sector $sector)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector, Business $business)
    {
        $business = Business::where('id', $business->id)
            ->withCount('services')
            ->with('services')
            ->with('tags')
            ->first();

        return view('sectors.businesses.show', compact('business', 'sector'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector, Business $business)
    {
        //
    }
}
