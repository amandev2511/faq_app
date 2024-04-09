<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CreateTemplate;
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

Route::get('/', [AuthController::class,'index']);
Route::get('/authenticate', [AuthController::class,'authenticate'])->name('authenticate');
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/createfaq', [DashboardController::class, 'createfaq'])->name('createfaq');
Route::get('all/product/{shop_name}',[DashboardController::class,'all_product']);
Route::get('all/custom/collection/{shop_name}',[DashboardController::class,'custom_collection']);
Route::get('all/smart/collection/{shop_name}',[DashboardController::class,'smart_collection']);
Route::get('all/blogs/{shop_name}',[DashboardController::class,'get_all_blogs']);
Route::get('all/pages',[DashboardController::class,'get_all_pages']);
Route::get('all/cart',[DashboardController::class,'get_all_cart']);
Route::get('all/checkout',[DashboardController::class,'get_all_checkout']);
Route::get('all/not/found',[DashboardController::class,'get_all_404']);
Route::get('all/password',[DashboardController::class,'get_all_password']);
Route::get('main/pages',[DashboardController::class,'get_all_home']);
Route::get('all/pages/{shop}',[DashboardController::class,'get_all_pages']);

Route::post('save/faq/all/data/{shop}',[DashboardController::class,'save_val_data']);
Route::post('update/status/pro',[DashboardController::class,'update_pro_status']);
Route::post('save/faq/collection/data/{shop}',[DashboardController::class,'save_faq_collection_data']);
Route::post('save/faq/blogs/data/{shop}',[DashboardController::class,'save_faq_blogs_data']);
Route::post('save/pages/{shop}',[DashboardController::class,'save_pages']);
Route::post('save/faq/data/{shop}',[DashboardController::class,'save_faq_data']);
Route::get('get/faq/data/{shop}/{id}',[DashboardController::class,'get_faq_data']);
Route::any('recurring',[DashboardController::class,'recurringAppCharge']);
Route::get('remove/category/{id}',[DashboardController::class,'del_category']);
Route::get('remove/faq/{id}',[DashboardController::class,'del_faq_qusans']);
Route::post('update/faq/data/{id}',[DashboardController::class,'update_faq_data']);
Route::post('update/status/faq/{id}',[DashboardController::class,'update_status_faq']);
Route::post('update/faq/category/data/{shop}/{id}',[DashboardController::class,'update_category_data']);
Route::get('template',[CreateTemplate::class,'show_template']);
Route::get('template/{shop}',[CreateTemplate::class,'show_template']);
Route::get('create/template/{shop}',[CreateTemplate::class,'create_template'])->name('create_template');
Route::post('save/template',[CreateTemplate::class,'save_template']);
Route::get('edit/template/{shop}/{id}',[CreateTemplate::class,'edit_template']);
Route::post('update/template/{id}',[CreateTemplate::class,'update_template'])->name('update_template');
Route::get('delete/template/{id}',[CreateTemplate::class,'delete_template']);


