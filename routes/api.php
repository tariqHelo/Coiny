<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{
   RegisterController,
   UserController,
};
use App\Http\Resources\{
   ExpensesRevenuesResource,
};
use App\Models\{
   ExpensesRevenues,
};
use App\Http\Controllers\User\Auth\AuthUserController;


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

// Route::post('register', [RegisterController::class, 'register']);
 //Route::post('login', [RegisterController::class, 'login']);

// Route::middleware(['auth:sanctum'])->group( function () {
    
//    /// Will Return All Categories From DataBase
//    Route::get('/general_incomes', function () {
//     return ExpensesRevenuesResource::collection(ExpensesRevenues::all());
//    });
//    /// Logout User 
//    Route::post('/logout',[RegisterController::class, 'logout']);
// });

Route::prefix('user')->group(function () {
    Route::post('register', [AuthUserController::class, 'register']);
    Route::post('login', [AuthUserController::class, 'login']);

    // Route::middleware('auth:customer')->group(function () {
    //     Route::post('logout', [AuthUserController::class, 'logout']);

    //     Route::get('home', [UserStoryController::class, 'home']);

    //     Route::prefix('profile')->group(function () {
    //         Route::post('update_image', [UserProfileController::class, 'updateImage']);
    //         Route::get('get_profile', [UserProfileController::class, 'getProfile']);
    //         Route::post('update_profile', [UserProfileController::class, 'updateProfile']);
    //     });
    // });
});
