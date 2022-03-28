<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Transaction;
use App\Models\Expenses;
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
         //dd(20)
        $user = \Auth::user();
        $total = Expenses::query()->where('user_id', $user->id);
        $net = collect($total->get())->map(function ($net) {
            return [
                'amount' => $net->amount,
                'category' => $net->category->name,
                'user_name' => $net->user->name,
            ];
        });
        //dd($net);
        $success = [
            'user_name' => $user->name,
            'all amounts' => $net,
            'total' => $total->sum('amount'),
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
       
        $id = Transaction::query()->where('user_id', auth()->id())->first();
       // dd($basket);
        $rules = [
            'type' =>'required',
            'user_id' =>'required',
            'category_id' =>'required',
            'amount' => ['numeric', 'min:1','lte:'.$id->total],
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return $this->sendError('Please validate error', $validator->errors());
        }
       // dd('sucess');
        $transaction = Expenses::create($request->all());
        $balance = $id->decrement('total' ,$transaction->amount);
        //dd($ss);
        $success['balance'] = $balance - $transaction->amount;
        return $this->sendResponse($success ,'Taransaction Added successfully');
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
