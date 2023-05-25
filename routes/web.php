<?php

use App\Http\Controllers\AdminControl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::post('/dashboard', [AdminControl::class, 'loginFunction'])->name('loginRoute');

Route::get('/product-master', [AdminControl::class, 'productMaster'])->name('productMaster');