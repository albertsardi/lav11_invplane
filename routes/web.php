<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\InvController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;


use App\Http\Controllers\ReportController;

//API route
//include('api.php');


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

//app
Route::any('/', 'App\Http\Controllers\AppController@dashboard');
Route::get('/dashboard', 'App\Http\Controllers\AppController@dashboard');

//test pdf
Route::get('/testpdf', [ReportController::class, 'testpdf']);

/* 
    router tuk coba2
*/
Route::prefix('test')->group(function($e) {
    // form master load
    Route::get('reportPDF', 'App\Http\Controllers\TestController@reportPDF');
    Route::get('koolreport/chart', 'App\Http\Controllers\TestController@koolreportchart');
    Route::get('koolreport/chart/pdf', 'App\Http\Controllers\TestController@koolreportchart_pdf');
    Route::get('aggrid', 'App\Http\Controllers\TestController@view');
});

//quotation
Route::prefix('quotation')->group(function () {
    // http://localhost/lav9Invplane/quotation/view/1718
    //Route::get('/{formtype}/{id}', 'App\Http\Controllers\QuoteController@view');
    Route::get('/generate_pdf/{id}', [QuoteController::class, 'generatePDF']);
    Route::get('/{formtype}/{id}', [QuoteController::class, 'view']);
    // http://localhost/lav9Invplane/quotation/edit/1718
    //Route::get('/edit/{id}', 'App\Http\Controllers\QuoteController@edit');
});

//invoice
//Route::get('invoice/view/{id}', [App\Http\Controllers\InvController::class, 'view']);
 Route::prefix('invoice')->group(function () {
    // http://localhost/lav9Invplane/quotation/view/1718
    // Route::get('/view/{id}', 'App\Http\Controllers\InvController@view');
    Route::get('/generate_pdf/{id}', [InvController::class, 'generatePDF']);
    Route::get('/{formtype}/{id}', [InvController::class, 'view']);
    // http://localhost/lav9Invplane/quotation/edit/1718
    //Route::get('/edit/{id}', 'App\Http\Controllers\QuoteController@edit');
});

//Clients
//Route::get('invoice/view/{id}', [App\Http\Controllers\InvController::class, 'view']);
Route::prefix('clients')->group(function () {
    // http://localhost/lav9Invplane/quotation/view/1718
    // Route::get('/view/{id}', 'App\Http\Controllers\InvController@view');
    Route::get('/{formtype}/{id}', [ClientController::class, 'view']);
    // http://localhost/lav9Invplane/quotation/edit/1718
    //Route::get('/edit/{id}', 'App\Http\Controllers\QuoteController@edit');
    // Route::create('/create', [ClientController::class, 'create']);
    Route::post('/update/{id}', [ClientController::class, 'update']);
});

//Projects
Route::prefix('projects')->group(function () {
    // http://localhost/lav9Invplane/quotation/view/1718
    // Route::get('/view/{id}', 'App\Http\Controllers\InvController@view');
    Route::get('/{formtype}/{id}', [ProjectController::class, 'view']);
    // http://localhost/lav9Invplane/quotation/edit/1718
    //Route::get('/edit/{id}', 'App\Http\Controllers\QuoteController@edit');
    // Route::create('/create', [ClientController::class, 'create']);
    Route::post('/update/{id}', [ProjectController::class, 'update']);
});

//Projects
Route::prefix('tasks')->group(function () {
    // http://localhost/lav9Invplane/quotation/view/1718
    // Route::get('/view/{id}', 'App\Http\Controllers\InvController@view');
    Route::get('/{formtype}/{id}', [TaskController::class, 'view']);
    // http://localhost/lav9Invplane/quotation/edit/1718
    //Route::get('/edit/{id}', 'App\Http\Controllers\QuoteController@edit');
    // Route::create('/create', [ClientController::class, 'create']);
    Route::post('/update/{id}', [TaskController::class, 'update']);
});

