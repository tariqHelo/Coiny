<?php

namespace App\Http\Controllers;

use App\Models\Transacrion;
use App\Http\Requests\StoreTransacrionRequest;
use App\Http\Requests\UpdateTransacrionRequest;

class TransacrionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransacrionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransacrionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transacrion  $transacrion
     * @return \Illuminate\Http\Response
     */
    public function show(Transacrion $transacrion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transacrion  $transacrion
     * @return \Illuminate\Http\Response
     */
    public function edit(Transacrion $transacrion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransacrionRequest  $request
     * @param  \App\Models\Transacrion  $transacrion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransacrionRequest $request, Transacrion $transacrion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transacrion  $transacrion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transacrion $transacrion)
    {
        //
    }
}
