<?php

namespace App\Http\Controllers;

use App\Models\Debts;
use App\Http\Requests\StoreDebtsRequest;
use App\Http\Requests\UpdateDebtsRequest;

class DebtsController extends Controller
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
     * @param  \App\Http\Requests\StoreDebtsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDebtsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debts  $debts
     * @return \Illuminate\Http\Response
     */
    public function show(Debts $debts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debts  $debts
     * @return \Illuminate\Http\Response
     */
    public function edit(Debts $debts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDebtsRequest  $request
     * @param  \App\Models\Debts  $debts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDebtsRequest $request, Debts $debts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debts  $debts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debts $debts)
    {
        //
    }
}
