<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{
   RegisterController,
   UserController,
   TransactionsController,
   CategoryController,
   NetIncomeController
};
use App\Http\Resources\{
   ExpensesRevenuesResource,
};
use App\Models\{
   ExpensesRevenues,
};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [RegisterController::class, 'register']);
 Route::post('login', [RegisterController::class, 'login']);

Route::middleware(['auth:sanctum'])->group( function () {
   
   Route::apiResources([
    'taransaction' => TransactionsController::class,
    'category' => CategoryController::class,
    'net_income' => NetIncomeController::class,
   ]);
   /// Will Return All Categories From DataBase
  // Route::post('/taransaction',[TransactionsController::class , 'store']);
   /// Will Return All Categories From DataBase
  // Route::post('/category',[CategoryController::class , 'store']);
   /// Logout User 
   Route::post('/logout',[RegisterController::class, 'logout']);

});

