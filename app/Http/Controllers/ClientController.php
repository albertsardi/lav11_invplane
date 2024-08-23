<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Model\Client;

class ClientController extends MainController
{
    // fview / orm edit
    function view($formtype, $id='') {
        $OpenApi = new OpenapiController();
        $data =[];
        $data['data'] = DB::table('clients')->where('AccCode', $id)->first();
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
        $data = [];
        return view("list_client", $data);
    }

    public function create(Request $req) {
        $input = $req->getContent();
        $input = $req->all();
        unset($input['_token']);
        unset($input['is_update']);
        dump($input);
        Client::unguard();
        if ($input['id']=='') {
            //create new
            logger('create new');
            $m = new Client;
            $m = $m->save($input);
        } else {
            //update
            logger('update');
            $m = Client::where('id',$id);
            $m->create($input);
        }
        Cient::reguard();
    }

    public function update($id, Request $req) {
        $input = $req->getContent();
        $input = $req->all();
        unset($input['_token']);
        unset($input['is_update']);
        dump($input);
        Client::unguard();
        if ($input['id']=='') {
            //create new
            logger('create new');
            $m = new Client;
            $m = $m->save($input);
        } else {
            //update
            logger('update');
            $m = Client::where('id',$id);
            $m->create($input);
        }
        Cient::reguard();
    }
}
