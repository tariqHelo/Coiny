<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use App\Http\Requests\StoreBanksRequest;
use App\Http\Requests\UpdateBanksRequest;

class BanksController extends Controller
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
     * @param  \App\Http\Requests\StoreBanksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBanksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function show(Banks $banks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function edit(Banks $banks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBanksRequest  $request
     * @param  \App\Models\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBanksRequest $request, Banks $banks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banks  $banks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banks $banks)
    {
        //
    }
}
