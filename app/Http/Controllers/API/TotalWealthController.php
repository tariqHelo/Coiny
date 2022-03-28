<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\API\BaseController as BaseController;

class TotalWealthController extends BaseController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $total = User::query()->where('id',auth()->id())->first();
        //dd($total);
        $success =  [
            'TotalWealth' => $total->totalWealth(),
        ];

       return $this->sendResponse($success ,'TotalWealth for User Retirved successfully');

    }  
}
