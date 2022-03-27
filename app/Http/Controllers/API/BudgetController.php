<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Budget;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class BudgetController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = Budget::query()->where('user_id', \Auth::user()->id)->get()->sum('amount');
        $success =  [
             'budget' => $total,
        ];
        return $this->sendResponse($success ,'Budget Retirved successfully');  
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
     * @param  \App\Http\Requests\StoreBudgetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules = [
            'period' =>'required',
            'category_id' => 'required',
            'amount' => 'required|numeric|between:1,99999999999999',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return $this->sendError('Please validate error', $validator->errors());
        }
        $budget = Budget::create([
                'amount' => $request->amount,
                'period' => $request->period,
                'category_id' => $request->category_id,
                'user_id' => \Auth::user()->id,
        ]);
        return $this->sendResponse($budget ,'Budget Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBudgetRequest  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        //
    }
}
