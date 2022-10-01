<?php

use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CoursesController::class, 'index']);

//Show Create Form
Route::get('/create',[CoursesController::class,'create'])->middleware(EnsureAdmin::class);

//Store Data
Route::post('/listings',[CoursesController::class,'store'])->middleware(EnsureAdmin::class);

//Dashboard Listing Page
Route::get('/listings/manage',[CoursesController::class, 'manage' ])->middleware(EnsureAdmin::class);

//Dashboard Listing Page Only Stats
Route::get('/manage/statistic',[CoursesController::class, 'manageStats' ])->middleware(EnsureAdmin::class);

//Dashboard Listing Page Only Users
Route::get('/manage/users',[CoursesController::class, 'manageUsers' ])->middleware(EnsureAdmin::class);

//Dashboard Listing Page Full
Route::get('/manage/statsandusers',[CoursesController::class, 'manageStatsAndUsers' ])->middleware(EnsureAdmin::class);

//Save Edit
Route::put('/listings/{listing}',[CoursesController::class,'update'])->name('updateRoute')->middleware(EnsureAdmin::class);

//Show
Route::get('/listings/{listing}', [CoursesController::class, 'show']);

//Delete
Route::delete('listings/{listing}',[CoursesController::class,'destroy'])->name('deleteRoute')->middleware(EnsureAdmin::class);

//Show Edit Form
Route::get('/listings/{listing}/edit',[CoursesController::class,'edit'])->middleware(EnsureAdmin::class);

//Register User Form
Route::get('/users/register',[UserController::class,'register'])->middleware('guest');

//Register User
Route::post('/users',[UserController::class,'store']);

//Logout
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//Login
Route::get('/login',[UserController::class,'login'])->middleware('guest');

//Login
Route::post('/users/authenticate',[UserController::class,'authenticate']);

//User Delete
Route::delete('/userdelete/{user}',[UserController::class,'destroy'])->middleware(EnsureAdmin::class);
