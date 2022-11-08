<?php

use App\Http\Controllers\CustomersControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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
Route::get('/customers' , [CustomersControllers::class , 'index'])->name('customers.index');
Route::get('/customers/create' , [CustomersControllers::class , 'create'])->name('customers.create');
Route::post('/customers' , [CustomersControllers::class , 'store'])->name('customers.store');
Route::get('/customers/{customer}/edit' , [CustomersControllers::class , 'edit'])->name('customers.edit');
Route::put('/customers/{customer}' , [CustomersControllers::class , 'update'])->name('customers.update');
Route::Delete('/customers/{customer}' , [CustomersControllers::class , 'destroy'])->name('customers.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// excel generating route
Route::get('/Customers/export', [CustomersControllers::class, 'export'])->name('customers.export');

Route::get('pdf/preview', [PDFController::class, 'preview'])->name('pdf.preview');
Route::get('pdf/generate', [PDFController::class, 'generatePDF'])->name('pdf.generate');
