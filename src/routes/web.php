<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
    // return view('welcome');
// });

// ログイン時のみ、管理画面を表示
Route::middleware('auth')->group(function ()
{
    // Route::get('admin', [AuthController::class, 'index']);
    // Route::get('/admin', [ContactController::class, 'show']);
    Route::get('/admin', [ContactController::class, 'search']);
});



Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
Route::delete('/admin', [ContactController::class, 'destroy']);
Route::get('/download_csv', [ContactController::class, 'download_csv']);
