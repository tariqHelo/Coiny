<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Models\Assets;
use App\Http\Requests\StoreAssetsRequest;
use App\Http\Requests\UpdateAssetsRequest;
use Illuminate\Http\Request;

class AssetsController extends BaseController
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $asset = Assets::query()->where('user_id',auth()->id())->get();
        $assets = collect($asset)->map(function ($assets) {
            return [
                 'asset_name' => $assets->name,
                 'user_id' => $assets->user_id,
                 'icon' => $assets->icon,
                 'depreciation' => $assets->depreciation,
                 'value' => $assets->value,
            ];
        });
        $success =  [
             'user_name' => \Auth::user()->name,
             'Assets' => $assets,
             'totalAssets' => $asset->sum('value'),
        ];
        return $this->sendResponse($success ,'Assets Retirved successfully');
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
     * @param  \App\Http\Requests\StoreAssetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(),[
            'name' => 'required', 'string', 'max:255',
            'icon' =>'required|image',
            'useful_life' =>'required|numeric' , 'min:1',
            'depreciation' =>'required|numeric','min:1',
            'value' =>'required|numeric','min:1',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors() );
        }
         $data = array_merge($request->all(), ['user_id' => \Auth::user()->id]);
         $candidate = Assets::create($data);
        return $this->sendResponse($category ,'Category Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // dd(20);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function edit(Assets $assets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssetsRequest  $request
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssetsRequest $request, Assets $assets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assets $assets)
    {
        //
    }
}
