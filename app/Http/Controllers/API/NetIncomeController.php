<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\BaseController as BaseController;
class NetIncomeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $id = \Auth::user()->id;
        // $total = Transaction::query()->where('user_id', $id)->get()->sum('total');
        // $net = collect(Transaction::query()->where('user_id', $id)->get())->map(function ($net) use ($total) {
        //     return [
        //         'total' => $net->total,
        //         'type' => $net->type,
        //         'user_id' => $id,
        //         'user_name' => $net->user->name,
        //     ];
        // })->groupBy('type');
        // $success = [
        //     'NetIncome' => $total,
        //     'net' => $net,
        // ];
        //return $this->sendResponse($success ,'All Data User Retirved successfully');
        $total = User::query()->where('id',auth()->id())->first();
        $success =  [
            'NetIncome' => $total->NetIncome(),
            // 'revenues' => $total->revenuesTransactions() ,
            // 'expenses' => $total->expensesTransactions(),
        ];
         return $this->sendResponse($success ,'Net Income Retirved successfully');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       // dd($net);
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
        //
    }
}
