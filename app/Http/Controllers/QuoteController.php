<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Model\Common;
use App\Http\Model\User;
use App\Http\Model\Parameter;
use App\Http\Model\Company;
use Session;
use HTML;

//use App\Http\Requests;

class QuoteController extends MainController
{
  public function view($formtype, $id='') {
    //return 'view '.$id;

    $data['data'] = DB::table('quotation')->first();
    $transno = $data['data']->TransNo; 
    $transno = 'DO.1800011'; //debug
    // dd($data['head']->TransNo);
    $detail = DB::table('transdetail')->where('TransNo',$transno)->orderBy('id','ASC')->select('ProductCode','ProductName','UOM','Qty','Price','Qty','id')->get();
    $subtotal=0;
    foreach($detail as $d) {
        $d->Qty = abs($d->Qty);
        $d->Amount = abs($d->Qty) * $d->Price; 
        $subtotal = $subtotal + $d->Amount;
    }
    $detail = $this->array_value($detail);
    //dd($detail);
    $data['detail']=$detail;
    $data['subtotal']=$subtotal;
    if ($formtype=='form') return view('form_quotation', $data);
    if ($formtype=='view') return view('view_quotation', $data);
    return abort(404);
  }

  public function generatePDF($id) {
    return "generate $id";
  }

  


}
