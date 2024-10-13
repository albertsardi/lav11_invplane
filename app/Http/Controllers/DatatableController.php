<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class DatatableController extends Controller
{
    function list($table) {
        $data = DB::table($table)->where('Active',1)->get();
        $out = [
            'draw' => 1,
            'recordsTotal' => count($data),
            'recordsFilter' => 20,
            'data' => $data
        ];
        return response()->json($out);
    }

    function detail($transno) {
        //return 'detail '.$transno;
        if(substr($transno,0,2)=='QE') $field = ['ProductCode','ProductName','UOM','Qty','Price'];
        $data = DB::table('transdetail')->where('TransNo',$transno)->get($field);
        $out = [];
        foreach($data as $d) 
        {
            $d->Qty = abs($d->Qty);
            $d->Amount = abs($d->Qty * $d->Price);
            $out[]=array_values((array)$d);

        }
        return response()->json($out);
    }
}
