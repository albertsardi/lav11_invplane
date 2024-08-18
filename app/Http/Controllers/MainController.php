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

class MainController extends Controller
{
    public function createSelection($data, $opt) {
        if (in_array('client',$opt)) $data['mClient'] = json_encode( DB::table('clients')->select('AccCode as id','AccName as Name')->orderBy('AccName','ASC')->get() );
        if (in_array('project',$opt)) $data['mProject'] = json_encode( DB::table('projects')->select('id','Name')->get() );
        if (in_array('gender',$opt)) $data['mGender'] = json_encode([
                                        ['id'=> 'M', 'name'=>'Male'],
                                        ['id'=> 'F', 'name'=>'Female'],
                                        ['id'=> 'O', 'name'=>'Other'],
                                      ]);
        if (in_array('clientas',$opt)) $data['mClientas'] = json_encode([
                                                          ['id'=> 'C', 'name'=>'as Customer'],
                                                          ['id'=> 'S', 'name'=>'as Supplier'],
                                                      ]);
        return $data;
    }


}
