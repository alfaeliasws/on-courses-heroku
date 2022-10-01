<?php

use Illuminate\Http\Request;
use App\Http\Middleware\EnsureUser;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Middleware\EnsureAdminApi;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursesController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'admin'], function () {
    // Route::get('getsimplestats',[ApiController::class,'stats']);

    //Post Store
    Route::post('listings',[ApiController::class,'store']);

    //Put Update
    Route::put('listings/{listing}',[ApiController::class,'update']);

    //Delete Data
    Route::delete('listings/{listing}',[ApiController::class,'update']);

    //delete user
    Route::delete('userdelete/{user}',[ApiController::class,'deleteUser']);

    //get stats
    Route::get('getsimplestats',[ApiController::class,'stats']);
});

Route::group(['middleware' => 'user'], function () {

    //get by category
    Route::get('getcategories/{category}',[ApiController::class,'getCourseByCategory']);

    //get all category
    Route::get('getallcategories',[ApiController::class,'getAllCategories']);

    //get popular category
    Route::get('getPopularCategories',[ApiController::class,'getPopularCategories']);

    //search
    Route::get('s',[ApiController::class,'apiSearch']);

    //sort course by lowest price TSW
    Route::get('sort/lowestprice',[ApiController::class,'lowestPrice']);

    //sort course by highest price TSW
    Route::get('sort/highestprice',[ApiController::class,'highestprice']);

    //get free course TSW
    Route::get('free',[ApiController::class,'priceFree']);
});




//Get Data
Route::get('listings',[ApiController::class,'index']);

//Get Course
Route::get('listings/{listing}',[ApiController::class,'show'])->middleware('guest');


//Register Admin
// Route::post('admin',[UserController::class,'storeAdmin']);




