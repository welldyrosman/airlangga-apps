<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
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
Route::get('/', [HomeController::class, 'index']);
Route::get('/tourpackage/{id}', [HomeController::class, 'detailpack']);
Route::get('/bookpackage/{id}', [HomeController::class, 'bookpack']);
Route::get('/invoicedet/{id}',[HomeController::class,'invoicedet']);

Route::get('/google/redirect', [LoginController::class,'redirect']);
Route::get('/google/callback', [LoginController::class,'callback']);


Route::get('/test/kirim-email',[MailController::class,'sendMail']);

Route::get('/viewmmailtmp',[MailController::class,'mailtmp']);

Route::get('/bookpdf/{id}',[PDFController::class,'bookingpdf']);

Route::get('/logout',[HomeController::class,'logout']);

Route::get('/loginPage',[HomeController::class,'loginPage']);
