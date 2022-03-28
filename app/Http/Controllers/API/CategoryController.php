<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CategoryResource;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  Category::query()->where('user_id' ,auth()->id())->get();
        $category = collect($user)->map(function ($category) {
            return [
                 'image' => $category->getImageUrlAttribute(),
                 'category_name' => $category->name,
               //  'bank_name' => $category->bank->name,
            ];
        });
         $success =  [
          'user_name' => \Auth::user()->name,
          'categoreis' => $category,
        ];
        return $this->sendResponse($success ,'category Retirved successfully'); 
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //dd(20);
         if($request->hasFile('icon')) {
            $file = $request->file('icon');
            // UplodedFile Object
            $icon_path = $file->store('/', [
                'disk' => 'uploads',
            ]);
         }
        $category = Category::create([
                'name' => $request->name,
                'icon' => $icon_path,
                'user_id' => \Auth::user()->id,
            ]);
        return $this->sendResponse($category ,'Category Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //dd($id);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
