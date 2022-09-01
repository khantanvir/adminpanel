<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;

//category route 
Route::controller(ProductController::class)->group(function() {
    Route::get('/products', 'products');
    Route::get('/create-product', 'create_product');
    Route::post('/store-product', 'store');
    Route::get('/get-subcategory/{id?}','get_subcategory');
    Route::post('/product-status-change','product_status_change');
    Route::post('/change-main-image-post','change_main_image_post');
    Route::get('edit-product/{id?}','edit');
    Route::post('edit-product-post','edit_product_post');
    Route::get('delete-product/{id?}','delete_product');
    Route::get('product-attributes/{id?}','product_attributes');
});

?>