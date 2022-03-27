<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Debts;
use App\Models\DebtsPayments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\StoreDebtsPaymentsRequest;
use App\Http\Requests\UpdateDebtsPaymentsRequest;

class DebtsPaymentsController extends BaseController
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
    public function store(Request $request)
    {
        $dbt = Debts::query()->where('user_id', auth()->id())->first();
       // dd($id->amount);
       // dd($basket);
        $rules = [
            // 'amount' => 'required',
             'amount' => 'required|numeric|between:1,99999999999999','lte:'.$dbt->amount,
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return $this->sendError('Please validate error', $validator->errors());
        }
        $debt = DebtsPayments::create([
                'amount'    => $request->amount,
                'debt_id' => $dbt->id,
            ]);
        //dd($debt);
        $payment = $dbt->decrement('amount' ,$debt->amount);
        return $this->sendResponse($debt ,'Taransaction Added successfully');
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
