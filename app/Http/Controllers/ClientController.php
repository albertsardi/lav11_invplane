<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
//use App\Models\Client;

class ClientController extends MainController
{
    // fview / orm edit
    function view($formtype, $id='') {
        $OpenApi = new OpenapiController();
        $data =[];
        // $data['data'] = Client::all();
        //$data['data'] = Client::where('AccCode', $id)->first();
        $data['data'] = Client::where('id', $id)->first();
        $data = $this->createSelection($data, ['gender','clientas']);
        // $data['address'] = DB::table('masteraccountaddr')->where('AccCode', $id)->where('defaddr', 1)->first();
        // $data['mCustomer'] = [];//DB::table('masteraccount')->where('AccType','C')->select('AccCode','AccName')->orderBy('AccCode','ASC')->get();
        // $data['mSupplier'] = [];//DB::table('masteraccount')->where('AccType','S')->select('AccCode','AccName')->orderBy('AccCode','ASC')->get();
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
        

        $data['formtype'] = ($id==''?'create':'update');
        dump($data);
        return view("form_client", $data);
        
        // if(str_contains($_SERVER['REQUEST_URI'], 'customer/edit')) $jr='customer';
	    // if(str_contains($_SERVER['REQUEST_URI'], 'supplier/edit')) $jr='supplier';
    
        $data = [
            'jr' => $jr, 'id' => $id,
            'caption' => $this->makeCaption($jr, $id),
            //'user' => ['Code'=>'123']
        ];

        

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

        // get data
        $res = CustomerSupplier::getdata($jr, $id);
        if(!empty($res->data)) {
            $data['data'] = $res->data;
            $data['mOrder'] = Order::where('AccCode',$res->data->AccCode)->get();
        }

        
        return view("form_client", $data);
    }

    function list() {
        //return 'list client';
        $data =[];
        $data['data'] = Client::where('Active',1)->get();
        foreach($data['data'] as $d) {
            $d->Balance = 123456789;
            $d->Balance = Client::Balance($d->AccCode);
        } 
        //$data['data'] = Client::Get();
        //$data['data'] = DB::table('clients')->where('Active',1)->get();
        return view("list_client", $data);
    }

    public function save($id, Request $req) {
        $input = $req->getContent();
        $input = $req->all();
    
        dd($input);
    
        // validation 
        // $validate = $req->validate([
        //     'Name' => 'required',
        //     'AccName' => 'required|max:255',
        // ]);
    
        //update by id, save using manual karena fill able tidak jalan
        if ($id=='') {
            //create new with Id generate
            $m = new client;
            $m->Status = 1;
            $m->Name = $input['Name']??'';
            $m->FinishDate = $input['FinishDate']??'';
            $m->Projectid = $input['Projectid']??0;
            $m->Active = $input['Active']??1;
            $m->save();
            $id = $m->id??0;
        } else {
            //update  by id
            $m = Client::find($id);
            $m->AccCode = 1;
            $m->AccName = $input['Name']??'';
            $m->Category = $input['Category']??'';
            $m->Subcategory = $input['SubCategory']??'';
            $m->Salesman = $input['Salesman']??'';
            $m->CreditLimit = $input['CreditLimit']??'';
            $m->CreditActive = $input['CreditActive']??'';
            $m->Warning = $input['Warning']??'';
            $m->Unlimit = $input['Unlimit']??'';
            $m->Combine = $input['Combine']??'';
            $m->TaxNo = $input['TaxNo']??'';
            $m->TaxName = $input['TaxName']??'';
            $m->TaxAddr = $input['TaxAddr']??'';
            $m->PaymentAddr = $input['PaymentAddr']??'';
            $m->Email = $input['Email']??'';
            $m->Area2 = $input['Area2']??'';
            $m->PriceChannel = $input['PriceChannel']??'';
            $m->AccNo = $input['AccNo']??'';
            $m->Memo = $input['Memo']??'';
            $m->AccType = $input['AccTYpe']??'';
            $m->Active = $input['Active']??1;
            $m->Phone= $input['Phone']??'';
            $m->Language = $input['Language']??'';
            $m->Address1 = $input['Address1']??'';
            $m->Address2 = $input['Address2']??'';
            $m->City = $input['City']??'';
            $m->State = $input['State']??'';
            $m->ZipCode = $input['ZipCode']??'';
            $m->Country = $input['Country']??'';
            $m->PhoneNo = $input['PhoneNo']??'';
            $m->FaxNo = $input['FaxNo']??'';
            $m->MobileNo = $input['MobileNo']??'';
            $m->WebAddress = $input['WebAddress']??'';
            $m->Gender = $input['Gender']??'';
            $m->BirthDate = $input['BirthDate']??'';
            $m->Vat = $input['Vat']??'';
            $m->TaxCode = $input['TaxCode']??'';
            //$client = Client::where('AccCode', $input['AccCode'])->first();
            //$clientid = $client->id ?? 0;
            // $m->clientid = $clientid;
            // $m->AccName = $input['AccName']??'';
            // $m->Active = $input['Active']??'';
            $m->save();
        }
        return redirect('/client/view/'.$id)->with('success', 'Berhasil simpan data');
    }
}
