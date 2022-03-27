<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{
   RegisterController,
   UserController,
   TransactionsController,
   CategoryController,
   NetIncomeController,
   AssetsController,
   RevenuesController,
   ExpensesController,
   BudgetController,
   BanksController,
   DebtsController,
   DebtsPaymentsController,
   RulesController
};
use App\Http\Resources\{
   ExpensesRevenuesResource,
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

Route::post('new_register', [RegisterController::class, 'register']);
 Route::post('login', [RegisterController::class, 'login']);

Route::middleware(['auth:sanctum'])->group( function () {
   
   Route::apiResources([
    'taransaction'   => TransactionsController::class,
    'category'       => CategoryController::class,
    'net_income'     => NetIncomeController::class,
    'expenses'       => ExpensesController::class,
    'revenues'       => RevenuesController::class,
    'assets'         => AssetsController::class,
    'transactions'   => TransactionsController::class,
    'budget'         => BudgetController::class,
    'banks'          => BanksController::class,
    'debts'          => DebtsController::class,
    'debts_payments' => DebtsPaymentsController::class,
    'rules'          => RulesController::class,
   ]);

   /// Logout User 
   Route::post('/logout',[RegisterController::class, 'logout']);

});

