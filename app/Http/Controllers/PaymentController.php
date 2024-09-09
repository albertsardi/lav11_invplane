<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\PaymentARAP;
use App\Models\Invoice;
use App\Models\Options;
use App\Helpers\formHelper;

class PaymentController extends MainController
{
    // fview / orm edit
    function view($formtype, $id='') {
        //return "payment $id";
        //$OpenApi = new OpenapiController();
        $data =[];
        // $data['data'] = Client::all();
        if ($id!='') $data['data'] = Payment::findOrFail($id);
        if(!empty($data['data'])) {
            $arap = PaymentARAP::where('TransNo', 'AR.240004')->first();
            //dd($arap);
            $data['data']->AmountPaid = 1234567890; //$arap->AmountPaid ?? 0;
        } 
        //$data['data']->AmountPaid = PaymentARAP::where('TransNo', $data['data']->TransNo)->first()->AmountPaid??0; 
        //$data = $this->createSelection($data, ['gender','clientas']);
        // $data['address'] = DB::table('masteraccountaddr')->where('AccCode', $id)->where('defaddr', 1)->first();
        // $data['mCustomer'] = [];//DB::table('masteraccount')->where('AccType','C')->select('AccCode','AccName')->orderBy('AccCode','ASC')->get();
        $data['mInvoice'] = [];
        $inv = Invoice::whereRaw('Total>TotalPaid+FirstpaymentAmount')->select('TransNo',"AccName")->orderBy('TransNo','ASC')->get();
        foreach($inv as $d) {
            $inv = Invoice::getStatus($d->InvNo);
            $bal = $inv['Outstanding']??0;
            //if($bal>0) {
                $data['mInvoice'][] = [
                    'id' => $d->TransNo,
                    'Name' => $d->TransNo. ' '.$d->TransDate. ' outstanding='. $bal,
                ];
            //}
        }
         // $data['mProv'] = $OpenApi->IndoProvince();
        // $data['mCountry'] = $OpenApi->WorldCountry('asia');
        // $data['mGender'] = [
        //     ['id'=> 'M', 'name'=>'Male'],
        //     ['id'=> 'F', 'name'=>'Female'],
        //     ['id'=> 'O', 'name'=>'Other'],
        // ];
        // $data['mClientas'] = [
        //     ['id'=> 'C', 'name'=>'as Customer'],
        //     ['id'=> 'S', 'name'=>'as Supplier'],
        // ];
        $data['mPaymentType'] = Options::GetData('paymenttype');
        //$data['mPaymentType'] = DB::table('options')->where('opttype','paymenttype')->select('Code','Name')->get();

        $data['formtype'] = ($id==''?'create':'update');
        dump($data);
        return view("form_payment", $data);
        
        // if(str_contains($_SERVER['REQUEST_URI'], 'customer/edit')) $jr='customer';
	    // if(str_contains($_SERVER['REQUEST_URI'], 'supplier/edit')) $jr='supplier';
    
        

        // $data = array_merge($data,[
        //     //'mAddr'         => $this->DB_list('masteraccountaddr', 'Code', "AccCode='$id' "),
        //     //'mCat'          => $this->DB_list('masteraccountcategory', 'Category'),
        //     //'mSalesman'     => $this->DB_list('mastersalesman', 'Name'),
        //     //'mPriceChannel' => ['Channel1', 'Channel2', 'Channel3', 'Channel4', 'Channel5' ],
        //     //'mAccount'      => json_encode(DB::table('mastercoa')->selectRaw('AccNo, AccName, CatName')->get()),
        //     //'mAccount'      => DB::table('mastercoa')->selectRaw('id, AccNo, AccName, CatName')->where('CatName','Accounts Receivable (A/R)')->get(),
        //     'mAccount'      => ($jr=='AR')? $this->modalData(['modAccount-AR']):$this->modalData(['modAccount-AP']),
        //     'mAddress'      => DB::table('masteraccountaddr')->where('AccountId',$id)->get(),
        //     //'AdrressCount'  => (DB::table('masteraccountaddr')->where('AccountId',$id)->count()),
        //     'mOrder'        => '[]',
        //     //'data'        => $res->data,

        //     'select' => $this->selectData(['selCustomerSupplierCategory', 'selSalesman', 'selPriceLevel']),
        // ]);

    }

    public function list() {
        //return 'list payment';
        $data =[];
        $data['data'] = Payment::join('invoice', 'invoice.TransNo', '=', 'transpaymentarap.InvNo')->join('transpaymenthead', 'transpaymenthead.TransNo', '=', 'transpaymentarap.TransNo')->select('transpaymenthead.TransDate as PayDate','invoice.TransDate as InvDate','invoice.TransNo','invoice.AccCode','invoice.AccName','transpaymenthead.id as id','invoice.Total as InvTotal')->take(20)->get();
        foreach($data['data'] as $d) {
            $inv = Invoice::getStatus($d->InvNo);
            $d->InvAmount = 123456789;
            $d->InvAmount = $d->InvTotal??0;
            $d->Balance = 123456789;
            $d->Balance = $inv['Outstanding']??0;
            // $d->Balance = Client::Balance($d->AccCode);
        } 
        //$data['data'] = Client::Get();
        //$data['data'] = DB::table('clients')->where('Active',1)->get();
        return view("list_payment", $data);
    }

    public function save(Request $req, $id='') {
        $input = $req->getContent();
        $input = $req->all();
    
        //dd($input);
    
        // validation 
        // $validate = $req->validate([
        //     'Name' => 'required',
        //     'AccName' => 'required|max:255',
        // ]);
    
        //update by id, save using manual karena fill able tidak jalan
        if ($id=='') {
            //create new with Id generate
            $m = new Payment;
            $transno = $this->transNewNo('AR'); //'AR.NEW';
            //dd($transno);
            //$transno = 'AR.NEW';
            $m->TransNo = $transno;
            $m->Transdate = $input['TransDate']??'';
            $m->AccCode = $input['FinishDate']??'';
            $m->AccName = $input['Projectid']??0;
            $m->Payment = 'CASH';
            $m->Memo = $input['Memo']??'';
            $m->save();
            $id = $m->id??0;
            //dd($id);

            $arap = PaymentARAP::where('TransNo', $transno)->first();
            if($arap===null) {//if not exist
                $m = new PaymentARAP;
                $m->TransNo = $transno;
                $m->InvNo = $input['InvNo']??'';
                $m->AmountPaid = $input['AmountPaid']??0;
                $m->AmountAdj = 0;
                $m->Memo = $input['Memo']??'';
                $m->save();
            } else {
            //update  by id
                $arap->AmountPaid = $input['AmountPaid']??0;
                $arap->AmountAdj = 0;
                $arap->Memo = $input['Memo']??'';
                $arap->save();
            }
            


            
            //$client = Client::where('AccCode', $input['AccCode'])->first();
            //$clientid = $client->id ?? 0;
            // $m->clientid = $clientid;
            // $m->AccName = $input['AccName']??'';
            // $m->Active = $input['Active']??'';
            //$m->save();
        }
        return redirect('/payment/view/'.$id)->with('success', 'Berhasil simpan data');
    }
    
}

