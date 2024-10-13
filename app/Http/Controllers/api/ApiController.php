<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransDetail;

class ApiController extends Controller
{
    public function detail_save($transno, REQUEST $req) {
        //return "detail save $transno";
        $input = $req->all();
        
        if (empty($input['id'])) {
            //create new
            logger('create new');
            $d = new TransDetail;
            $d->TransNo = $input['TransNo']??'';
            $d->InvNo = $input['InvNo']??'';
            $d->ProductCode = $input['ProductCode']??'';
            $d->ProductName = $input['ProductName']??'';
            $d->Qty =  $input['Qty']??0;
            $d->UOM =  $input['UOM']??'';
            $d->Price = $input['Price']??0;
            $d->DiscPercentD = $input['DiscPercent']??0;
            $d->Cost = $input['Cost']??0;
            $d->Memo = $input['Memo']??0;
            $d->Trans_id = 12345;
            $m = $m->save($input);
        } else {
            //update
            logger('update');
            $m = TransDetail::where('id',$id);
            $m->create($input);
        }
    }
}
