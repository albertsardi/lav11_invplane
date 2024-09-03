<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\Client;

class TaskController extends MainController
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
        $data['data'] = DB::table('tasks')->where('id', $id)->first();
        // $data['mClients'] = DB::table('clients')->where('Active', 1)->select('AccCode','AccName')->get();
        $data['mProject'] = DB::table('projects')->select('id','Name')->get();
        $data = $this->createSelection($data, ['client','project']);
        
        $data['formtype'] = ($id==''?'create':'update');
        //dump($data);
        //$m = new Project;
        //dump($m->fillable);
        // dd($data);
        return view("form_task", $data);
        
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

    function list() {
        //return 'list task';
        $data =[];
        //$data['data'] = Task::where('tasks.Active',1)->offset(00)->take(1)->join('projects','tasks.projectid','=','projects.id')->select('tasks.*','projects.id as projectId','projects.Name as projectName')->whereNotNull('projectid')->get();
        $data['data'] = DB::select( 'select tasks.*,projects.id,projects.Name  from tasks left join projects on projects.id=tasks.Projectid limit 20');
        $data['data'] = DB::table('tasklist')->get();
        //$data['data'] = Task::where('tasks.Active',1)->offset(00)->take(2)->select('tasks.*')->whereNotNull('projectid')->get();
        //$data['data'] = Client::where('Active',1)->get();
        //$data['tablecaption'] = ['Active','Status','Task Name','Finish Date','Project Name'];
        //foreach($data['data'] as $d) {
            //$d->Balance = 123456789;
            //$d->Balance = Client::Balance($d->AccCode);
        //} 
        //$data['data'] = Client::Get();
        //$data['data'] = DB::table('clients')->where('Active',1)->get();
        return view("list_task", $data);
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

    public function save($id, Request $req) {
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
            $m = new Task;
            $m->Status = 1;
            $m->Name = $input['Name']??'';
            $m->FinishDate = $input['FinishDate']??'';
            $m->Projectid = $input['Projectid']??0;
            $m->Active = $input['Active']??1;
            $m->save();
            $id = $m->id??0;
        } else {
            //update  by id
            $m = Task::find($id);
            $m->Status = 1;
            $m->Name = $input['Name']??'';
            $m->FinishDate = $input['FinishDate']??'';
            $m->Projectid = $input['Projectid']??0;
            $m->Active = $input['Active']??1;
            //$client = Client::where('AccCode', $input['AccCode'])->first();
            //$clientid = $client->id ?? 0;
            // $m->clientid = $clientid;
            // $m->AccName = $input['AccName']??'';
            // $m->Active = $input['Active']??'';
            $m->save();
        }
        return redirect('/tasks/view/'.$id)->with('success', 'Berhasil simpan data');

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
        //return 'data save..';
        return redirect('/projects/view/'.$id)->with('success', 'Berhasil simpan data');
    }

    function getfill($input, $fill) {
        $out = [];
        foreach($fill as $f) {
            $out[$f] = $input[$f]??'';
        }
        return $out;
    }
}
