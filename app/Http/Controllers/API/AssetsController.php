<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Assets;
use App\Http\Requests\StoreAssetsRequest;
use App\Http\Requests\UpdateAssetsRequest;

class AssetsController extends BaseController
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
     * @param  \App\Http\Requests\StoreAssetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetsRequest $request)
    {
        //
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
        $total = Assets::query()->where('user_id', $id)->get()->sum('value');
        return $this->sendResponse($total ,'All Data User Assets Retirved successfully');
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
