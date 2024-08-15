<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;

class ProjectController extends Controller
{
    // fview / orm edit
    public function rules() {
        return [
            'Name' => 'required',
            'AccName' => 'required|max:255',
        ];
    }

    public function view($formtype, $id='') {
        // return "$formtype - $id";
        $data =[];
        $data['data'] = DB::table('projects')->where('id', $id)->first();
        $data['mCustomer'] = [];//DB::table('masteraccount')->where('AccType','C')->select('AccCode','AccName')->orderBy('AccCode','ASC')->get();
        $data['mSupplier'] = [];//DB::table('masteraccount')->where('AccType','S')->select('AccCode','AccName')->orderBy('AccCode','ASC')->get();
        // $data['mProv'] = $OpenApi->IndoProvince();
        
        $data['formtype'] = ($id==''?'create':'update');
        //dump($data);
        //$m = new Project;
        //dump($m->fillable);
        return view("form_project", $data);
        
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

        $data['formtype'] = ($id==''?'create':'update');
        return view("form_project", $data);
    }

    public function create(Request $req) {
        $input = $req->getContent();
        $input = $req->all();
        unset($input['_token']);
        unset($input['is_update']);
        unset($input['Active']);
        dump($input);
        //Client::unguard();
        if ($input['id']=='') {
            //create new
            logger('create new');
            $m = new Client;
            $m = $m->save($input);
        } else {
            //update
            logger('update');
            $m = Project::where('id',$id);
            $m->create($input);
        }
        //Cient::reguard();
    }

    public function update($id, Request $req) {
        $input = $req->getContent();
        $input = $req->all();

        //dd($input);

        // validation 
        $validate = $req->validate([
            'Name' => 'required',
            'AccName' => 'required|max:255',
        ]);

        $m = Project::where('id',$id);
        
        $m0 = new Project();
        $v = $m0->getFillable();
        $fillable = app(Project::class)->getFillable();
        //dd($v);

        //save using manual karena fill able tidak jalan
        // $m = Project::where('id',$id);
        // $m->Name =  $input['Name'] ?? '';
        // $m->AccName = $input['AccName'] ?? '';
        // $m->save();
        //dd( $m->getFillable() );

        //save using custom fillable
        //$fillable = ['Name','AccName'];
        $newinput = $this->getfill($input, $fillable);
        dump($newinput);
        $m->update($newinput);
        return 'data save..';


        
    }

    function getfill($input, $fill) {
        $out = [];
        foreach($fill as $f) {
            $out[$f] = $input[$f];
        }
        return $out;
    }
}
