<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Model\Common;
use App\Http\Model\User;
use App\Http\Model\Parameter;
use App\Http\Model\Company;
use App\Models\Client;
use App\Models\Invoice;
use Session;
use HTML;



class InvController extends MainController
{
  public function view($formtype, $id='') {
    //return 'view '.$id;

    $data['data'] = DB::table('invoice')->first();
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

    
    $formtype='view';//test
    if ($formtype=='form') return view('form_invoice', $data);
    if ($formtype=='view') return view('view_invoice', $data);
    return abort(404);
  }

  function list() {
    //return 'list invoice';
    $data =[];
    $data['data'] = Invoice::select('Status','TransNo','TransDate','DueDate','AccCode','AccName','Total','id')->get();
    foreach($data['data'] as $d) {
        $d->Balance = 123456789;
        $d->Balance = Client::Balance($d->AccCode);
    } 
    //$data['data'] = Client::Get();
    //$data['data'] = DB::table('clients')->where('Active',1)->get();
    return view("list_invoice", $data);
}

  public function generatePDF($id) {
    //return "generate $id";
    $filePdf =public_path('pdf\invoice_001.pdf');
    return response()->file($filePdf);
  }

  


}
