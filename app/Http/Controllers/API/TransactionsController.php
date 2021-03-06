<?php

namespace App\Http\Controllers\API;


use App\Models\ExpensesRevenues;
use App\Models\Transaction;
use App\Models\User;

use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Http\Request;


class TransactionsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $total = User::query()->where('id',auth()->id())->first();
        // //dd($total);
        // $success =  [
        //     'TotalWealth' => $total->totalWealth(),
        // ];

       return $this->sendResponse($success ,'TotalWealth for User Retirved successfully');

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $validator = Validator::make($request->all(),[
        //     'amount' =>'required',
        //     'type' =>'required',
        //     'user_id' =>'required',
        //     'category_id' =>'required',
        // ]);

        // if ($validator->fails()) {
        //     return $this->sendError('Please validate error' ,$validator->errors() );
        // }
        // $transaction = ExpensesRevenues::create($request->all());
        // if(Transaction::find($transaction->user_id)){
        //     Transaction::find($transaction->user_id)->increment('total' ,$transaction->amount);    
        // }else{
        //  $transaction =  Transaction::create([
        //     'total' => $transaction->amount,
        //     'type' => $transaction->type,
        //     'user_id' =>$transaction->user_id,
        //   ]);
        // }
        // $success['amount'] = $transaction->total;
        // return $this->sendResponse($success ,'Taransaction Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //  Customer::find($customer_id)->decrement('loyalty_points', 50);
    }
}
