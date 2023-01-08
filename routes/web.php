<?php

use App\Http\Controllers\RandomController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [RandomController::class, 'index']);
Route::post('/generate_name', [RandomController::class, 'store']);
Route::get('/getBreakdown', [RandomController::class, 'getBreakdown']);


Route::get('/welcome', function () {
    return view('welcome');
});
