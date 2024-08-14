<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('crud')->group(function() {
    
    // form master load
    Route::get('{db}',function($db, Request $req) {
        //dd($req);
        $id = $req->get('id') ?? '';
        $fld = $req->get('field') ?? '';//dd($req->get('field'));
        $fld = str_replace('{','',$fld);$fld = str_replace('}','',$fld);
        //dd($req->get('field'));
        $dat = DB::table($db);
        if ($id!='') $dat=$dat->where('trans_id', $id);
        //$dat=$dat->selectRaw('ProductCode,ProductName,Qty,UOM,Price,DiscPercentD,Cost,Memo,id');
        $dat=$dat->selectRaw($fld);
        $dat = $dat->get();
        return $dat;
    });


});

