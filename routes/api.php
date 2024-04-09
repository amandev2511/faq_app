<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('uninstalled/{shop}', [AuthController::class, 'appUninstalled']);
// Route::group(['middleware' => 'api'], function () {
    Route::get('/get/product/faq/ans',[DashboardController::class,'show_faq_product']);
    Route::get('/get/collections/faq/ans',[DashboardController::class,'show_faq_collection']);
    Route::get('/get/blogs/faq/ans',[DashboardController::class,'show_faq_blogs']);
    Route::get('/get/pages/faq/ans',[DashboardController::class,'show_faq_page']);


// });