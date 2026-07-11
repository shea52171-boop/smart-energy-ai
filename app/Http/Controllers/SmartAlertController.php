<?php

namespace App\Http\Controllers;

use App\Models\SmartAlert;
use Illuminate\Http\Request;

class SmartAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('alert.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SmartAlert $smartAlert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SmartAlert $smartAlert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SmartAlert $smartAlert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SmartAlert $smartAlert)
    {
        //
    }
}
