<?php

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hotel', [HotelController::class,'getHotel']);
Route::get('/hotel/map/{id}', [HotelController::class,'mapHotel'])->name('map_hotel');
