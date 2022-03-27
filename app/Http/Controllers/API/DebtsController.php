<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Debts;
use App\Models\DebtsPayments;
use App\Http\Requests\StoreDebtsRequest;
use App\Http\Requests\UpdateDebtsRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DebtsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debt = Debts::query()->where('user_id', \Auth::user()->id)->first();
        //dd($debt->id);
        $debtsPayments = DebtsPayments::query()->where('debt_id', $debt->id)->get();
        $payments = collect($debtsPayments)->map(function ($payments) {
            return [
                 'amount' => $payments->amount,
                 'created_at' => $payments->created_at->format('Y-m-d'),
            ];
        });
        //dd($payments);
         $success =  [
            'debt_name' => $debt->name,
            'amount' => $debt->sum('amount'),
            'type' => $debt->type,
            'debtsPayments' => $payments,
        ];
        return $this->sendResponse($success ,'DebtsPayments Retirved successfully'); 
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
    public function store(Request $request)
    {   
        $rules = [
            'name' =>'required',
           // 'user_id' =>'required',
            'type' =>'required',
            'amount' => 'required|numeric|between:1,99999999999999',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return $this->sendError('Please validate error', $validator->errors());
        }
        $debt = Debts::create([
                'name'    => $request->name,
                'amount'  => $request->amount,
                'type'    => $request->type,
                'user_id' => \Auth::user()->id,
            ]); 
        return $this->sendResponse($debt ,'Debt Added successfully');
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
