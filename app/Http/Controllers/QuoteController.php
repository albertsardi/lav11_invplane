<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Model\Common;
use App\Models\Quotation;
use Session;
use HTML;

//use App\Http\Requests;

class QuoteController extends MainController
{
  public function view($formtype, $id='') {
    //return 'view '.$id;

    if ($id!='') {
      $data['data'] = DB::table('quotation')->find($id);
      //return dd($data['data']);
      $transno = $data['data']->TransNo; 
      //dd($transno);
      //$transno = 'DO.1800011'; //debug
      // dd($data['head']->TransNo);
      $detail = DB::table('transdetail')->where('TransNo',$transno)->orderBy('id','ASC')->select('ProductCode','ProductName','UOM','Qty','Price','Qty','id')->get();
      //dump($detail);
      $subtotal = 0;
      if (!empty($detail)) {
        //$data['detail'] = $detail; 
        $subtotal=0;
        foreach($detail as $d) {
          $d->Qty = abs($d->Qty);
          $d->Amount = abs(intval($d->Qty)) * intval($d->Price); 
          $subtotal += $d->Amount;
        }
      } else {
        $data['detail'] = [];
      }
      
      //dd($detail);
      $data['detail'] = $detail;
      $data['subtotal'] = $subtotal;
    } else {
      // create new
    }
    if ($formtype=='form') return view('form_quotation', $data);
    if ($formtype=='view') return view('view_quotation', $data);
    return abort(404);
  }

  function list() {
    //return 'list quotation';
    $data =[];
    $data['data'] = Quotation::get();
    foreach($data['data'] as $d) {
        //$d->Balance = 123456789;
    } 
    //$data['data'] = Client::Get();
    //$data['data'] = DB::table('clients')->where('Active',1)->get();
    return view("list_quote", $data);
}

  public function generatePDF($id) {
    return "generate $id";
  }

  


}
