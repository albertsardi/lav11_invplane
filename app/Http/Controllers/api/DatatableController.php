<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

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
}
