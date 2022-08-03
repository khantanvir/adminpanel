<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;

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
//     return view('welcome');
// });

//Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/login', [App\Http\Controllers\LoginController::class, 'admin_login']);
Route::get('/forgot-password', [App\Http\Controllers\LoginController::class, 'forgot_password']);

Route::post('/admin-login', [App\Http\Controllers\LoginController::class, 'custom_login']);
Route::get('/sign-out', [App\Http\Controllers\LoginController::class, 'sign_out']);

Route::get('/all-role', [App\Http\Controllers\DashboardController::class, 'all_role']);
Route::get('role/activate/{id?}', [App\Http\Controllers\DashboardController::class, 'activate']);
Route::get('role/deactivate/{id?}', [App\Http\Controllers\DashboardController::class, 'deactivate']);
Route::get('/get-role-data', [App\Http\Controllers\DashboardController::class, 'getRoleData']);

Route::get('/all-user', [App\Http\Controllers\DashboardController::class, 'all_user']);
Route::get('/all-admin-user', [App\Http\Controllers\DashboardController::class, 'all_admin_user']);

//category route 
Route::get('/create-category', [CategoryController::class, 'add_category']);
Route::get('/create-category/{id?}', [CategoryController::class, 'add_category']);
Route::post('/category-store', [CategoryController::class, 'category_store']);
Route::post('/category-status-change', [CategoryController::class, 'category_status_change']);
Route::get('/all-category', [CategoryController::class, 'all_category']);
Route::get('/create-subcategory', [CategoryController::class, 'add_subcategory']);
Route::get('/all-subcategory', [CategoryController::class, 'all_subcategory']);