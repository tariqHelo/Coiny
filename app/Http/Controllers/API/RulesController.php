<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Rules;
use App\Http\Requests\StoreRulesRequest;
use App\Http\Requests\UpdateRulesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RulesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $rule = Rules::query()->where('user_id', \Auth::user()->id);
      //  dd($rule);
        $rules = collect($rule->get())->map(function ($rules) {
            return [
                 'amount' => $rules->amount,
                 'name' => $rules->name,
                 'category_name' => $rules->category->name,
                 'period' => $rules->period,
                 'created_at' => $rules->created_at->format('Y-m-d'),
            ];
        });
         $success =  [
            'user_name' => \Auth::user()->name,
            'rules' => $rules,
        ];
        return $this->sendResponse($success ,'Rules Retirved successfully'); 
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
     * @param  \App\Http\Requests\StoreRulesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $rule = Rules::query()->where('user_id', auth()->id())->first();
        $rules = [
            'amount' => 'required|numeric|between:1,99999999999999',
            'name' => 'requird',
            'category_name' => 'requird',
            'period' => 'requird|numeric',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return $this->sendError('Please validate error', $validator->errors());
        }
        $rule = Rules::create([
                 'amount' => $request->amount,
                 'name' => $request->name,
                 'category_id' => $request->category_id,
                 'period' => $request->period,
                 'user_id' => \Auth::user()->id,
            ]);
        return $this->sendResponse($rule ,'Rules Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function show(Rules $rules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function edit(Rules $rules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRulesRequest  $request
     * @param  \App\Models\Rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRulesRequest $request, Rules $rules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rules $rules)
    {
        //
    }
}
