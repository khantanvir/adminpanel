<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pos\PosController;

//category route 
Route::controller(PosController::class)->group(function() {
    Route::get('/pos', 'index');
});

?>