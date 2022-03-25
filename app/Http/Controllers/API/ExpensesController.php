<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpensesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $total = User::query()->where('id', auth()->id())->first();
        $success = [
            // 'revenues' => $total->revenuesTransactions() ,
            'expenses' => $total->expensesTransactions(),
        ];
        //dd($total);
        return $this->sendResponse($success, 'Expenses Retirved successfully');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $basket = Transaction::query()->where('user_id', auth()->id())->first()->sum('total');

        $rules = [
            'amount' => ['int', 'min:1','lte:'.$basket],
            'type' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ];
        $validator = Validator::make(request()->all(), $rules);
//        dd($rules);
        if ($validator->fails()) {
            return $this->sendError('Please validate error', $validator->errors());
        }
        dd('sucess');

//        $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
////            'amount' => ['int', 'min:1', function($attr, $value, $fail) {
////                $id = auth()->id;
////                $basket = Transaction::find($id);
////               // dd($basket);
////                if ($value > $basket->total) {
////                    $fail(__('الكمية المطلوبة أكبر من القيمة المخزنة'));
////                }
////            }],
//
//            'type' =>'required',
//            'user_id' =>'required',
//            'category_id' =>'required',
//        ]);

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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
