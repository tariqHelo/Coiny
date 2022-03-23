<?php

namespace App\Http\Controllers\API;

use App\Models\GeneralIncome;
use App\Http\Requests\StoreGeneralIncomeRequest;
use App\Http\Requests\UpdateGeneralIncomeRequest;

class GeneralIncomeController extends Controller
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
     * @param  \App\Http\Requests\StoreGeneralIncomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneralIncomeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralIncome  $generalIncome
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralIncome $generalIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralIncome  $generalIncome
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralIncome $generalIncome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGeneralIncomeRequest  $request
     * @param  \App\Models\GeneralIncome  $generalIncome
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneralIncomeRequest $request, GeneralIncome $generalIncome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralIncome  $generalIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralIncome $generalIncome)
    {
        //
    }
}
