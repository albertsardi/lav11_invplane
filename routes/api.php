<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\api\DatatableController;
use App\Http\Controllers\api\ApiController;


/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('api')->group(function() {
    /* 
    router tuk datatables
*/
    Route::prefix('datatables')->group(function () {
        Route::get('/{table}', [DatatableController::class, 'list']);
    });

    // http://localhost/lav11_invplanePdf/api/quotation/detail/save/QE.1800785
    Route::prefix('quotation')->group(function () {
        Route::get('/detail/save/{transno}', [ApiController::class, 'detail_save']);
    });
});

