<?php

namespace App\Http\Controllers;

use App\Models\DebtsPayments;
use App\Http\Requests\StoreDebtsPaymentsRequest;
use App\Http\Requests\UpdateDebtsPaymentsRequest;

class DebtsPaymentsController extends Controller
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
     * @param  \App\Http\Requests\StoreDebtsPaymentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDebtsPaymentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DebtsPayments  $debtsPayments
     * @return \Illuminate\Http\Response
     */
    public function show(DebtsPayments $debtsPayments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DebtsPayments  $debtsPayments
     * @return \Illuminate\Http\Response
     */
    public function edit(DebtsPayments $debtsPayments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDebtsPaymentsRequest  $request
     * @param  \App\Models\DebtsPayments  $debtsPayments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDebtsPaymentsRequest $request, DebtsPayments $debtsPayments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DebtsPayments  $debtsPayments
     * @return \Illuminate\Http\Response
     */
    public function destroy(DebtsPayments $debtsPayments)
    {
        //
    }
}
