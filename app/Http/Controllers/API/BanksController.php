<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Banks;
use App\Models\BankAccounts;


use App\Http\Requests\StoreBanksRequest;
use App\Http\Requests\UpdateBanksRequest;

class BanksController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Banks::query()->where('user_id', \Auth::user()->id)->first();
        $bankAccounts = BankAccounts::query()->where('bank_id', $bank->id)->get();
        $accounts = collect($bankAccounts)->map(function ($accounts) {
            return [
                 'currency' => $accounts->currency,
                 'amount' => $accounts->amount,
                 'bank_name' => $accounts->bank->name,
            ];
        });
        //dd($accounts);
        $success =  [
          'main_bank_name' => $bank->name,
          'main_bank_balance' => $bank->total_balance,
          'accounts' => $accounts,
          'total_balance' => $bankAccounts->sum('amount') + $bank->total_balance,
        ];
        return $this->sendResponse($success ,'Bank Accounts Retirved successfully');
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
