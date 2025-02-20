<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomizedRegisterUserController;
use App\Http\Controllers\CustomizedAuthenticatedSessionController;


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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::get('/back', function () {
    $old_input = session()->get('ses');
    return redirect('/')->withInput($old_input);
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
    Route::get('/admin/search', [AuthController::class, 'search']);
    Route::post('admin/export', [AuthController::class, 'export']);
    Route::delete('/admin/delete/{contact}', [AuthController::class, 'destroy']);
});

Route::post('/register',[CustomizedRegisterUserController::class,'store']);
Route::post('/login',[CustomizedAuthenticatedSessionController::class,'store']);
Route::post('/logout',[CustomizedAuthenticatedSessionController::class,'destroy']);