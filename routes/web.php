<?php

use App\Http\Controllers\AdminControl;
use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Alert;
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
})->name('loginPage');

Route::post('/login-process', [AdminControl::class, 'loginFunction'])->name('loginRoute');


Route::get('/dashboard', [AdminControl::class, 'dashboard'])->name('dashboard');


Route::get('/product-master', [AdminControl::class, 'productMaster'])->name('productMaster');
Route::get('/product-insert', [AdminControl::class, 'productInsert'])->name('productInsert');
Route::get('/product-update/{prodid}', [AdminControl::class, 'productUpdate']);
Route::post('/update-function', [AdminControl::class, 'updateFunction'])->name('updateRoute');
Route::get('/product-delete/{prodid}/{status}', [AdminControl::class, 'productDelete']);
Route::post('/product-master-search', [AdminControl::class, 'productMasterSearch'])->name('productMasterSearch');
Route::post('/insert-function', [AdminControl::class, 'insertFunction'])->name('insertRoute');


Route::get('/transaction', [AdminControl::class, 'transaction'])->name('transaction');
Route::get('/transaction-detail/{transid}', [AdminControl::class, 'transactionDetail']);
Route::get('/transaction-product', [AdminControl::class, 'transactionProduct'])->name('transactionProduct');
Route::post('/transaction-search', [AdminControl::class, 'transactionSearch'])->name('transactionSearch');


Route::get('/customer-data', [AdminControl::class, 'customerData'])->name('customerData');
Route::get('/customer-insert', [AdminControl::class, 'customerInsert'])->name('customerInsert');
Route::post('/customer-insert-process', [AdminControl::class, 'custInsertFunction'])->name('custInsertFunction');
Route::get('/customer-edit/{custid}', [AdminControl::class, 'customerEdit'])->name('customerEdit');
Route::post('/customer-edit-process', [AdminControl::class, 'editFunction'])->name('editFunction');
Route::post('/customer-data-search', [AdminControl::class, 'customerDataSearch'])->name('customerDataSearch');