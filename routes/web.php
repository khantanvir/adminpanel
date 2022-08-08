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
Route::controller(CategoryController::class)->group(function() {
    Route::get('/create-category', 'add_category');
    Route::get('/create-category/{id?}', 'add_category');
    Route::post('category-store', 'category_store');
    Route::post('category-status-change', 'category_status_change');
    Route::get('/all-category', 'all_category');
    Route::get('/create-subcategory', 'add_subcategory');
    Route::get('/create-subcategory/{id?}', 'add_subcategory');
    Route::get('/all-subcategory', 'all_subcategory');
    Route::post('/store-subcategory', 'store_subcategory');
    Route::post('subcategory-status-change', 'subcategory_status_change');
    Route::get('/subcategory-value-delete/{id?}','subcategory_value_delete');
    Route::get('/deleted-items', 'deleted_items');
    Route::get('/attributes','attributes');
    Route::post('/store-attribute','store_attribute');
    Route::post('/attribute-value-status-change','attribute_value_status_change');
    Route::get('/attribute-value-delete/{id?}','attribute_value_delete');
    Route::get('/roll-back-attribute-value/{id?}','roll_back_attribute_value');
    Route::post('/roll-back-attribute-value','roll_back_attribute_value');
});
