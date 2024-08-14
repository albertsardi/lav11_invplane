<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('api')->group(function() {
    
    //for Dashboard
    Route::get('total/{jr}', 'App\Http\Controllers\ApiController@getTotal');
    
    // general create
    Route::post('customer/create', 'ApiController@createdata');
    Route::post('customer/update/{id}', 'ApiController@updatedata');
    
    // form master load
    Route::get('product/{id?}', 'AjaxController@ajax_getProduct');
    Route::get('customer/{id?}', 'AjaxController@ajax_getCustomer');
    Route::get('supplier/{id?}', 'AjaxController@ajax_getSupplier');
    Route::get('coa/{id?}', 'AjaxController@ajax_getCoa');

    // from common
    Route::get('common/{id?}', 'ApiController@getcommon');
    // from trans load
    Route::get('{jr}/{id?}', 'ApiController@getdata');
    // Route::get('{jr}/{id?}', 'ApiController@getdata');

    

     // select2 / combobox
     //Route::get('select/{jr}', 'MainController@selectData');

    // data save
    Route::prefix('datasave')->group(function() {
        Route::post('/', 'TransController@datasave_PI');
        Route::post('product', 'MasterController@datasave_product');
        Route::post('PI', 'TransController@datasave_PI');
    });

    Route::post('transsave', 'TransController@transsave');

    

});

// report /pdf
Route::get('report/pdf', 'ReportController@testpdf');

Route::prefix('ajax')->group(function() {
    //chart in dashboard
    Route::get('makechart/{id}', 'AppController@makechart');

    // data save
    Route::any('datasave', 'AjaxController@datasave');
});

//API route tuk crud
//include('crud.php');
