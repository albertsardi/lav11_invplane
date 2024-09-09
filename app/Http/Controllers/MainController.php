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
        if (in_array('client',$opt)) $data['mClient'] =  DB::table('clients')->select('AccCode as id','AccName as Name')->orderBy('AccName','ASC')->get();
        if (in_array('project',$opt)) $data['mProject'] =  DB::table('projects')->select('id','Name')->get();
        if (in_array('gender',$opt)) $data['mGender'] = [
                                        ['id'=> 'M', 'name'=>'Male'],
                                        ['id'=> 'F', 'name'=>'Female'],
                                        ['id'=> 'O', 'name'=>'Other'],
                                      ];
        if (in_array('clientas',$opt)) $data['mClientas'] = [
                                                          ['id'=> 'C', 'name'=>'as Customer'],
                                                          ['id'=> 'S', 'name'=>'as Supplier'],
                                                      ];
        return $data;
    }

    function lastNo($jr) {
        $db = '';
        if (in_array($jr, ['AP','AR'])) $db = 'transpaymenthead';
        if (in_array($jr, ['QE'])) $db = 'quotation';
        if (in_array($jr, ['IN'])) $db = 'invoice';
        //dd("LEFT(TransNo,5)='$jr.".date('y')."' ");
        $res = DB::table($db)->whereRaw("LEFT(TransNo,5)='$jr.".date('y')."' ")->orderBy('TransNo','desc')->first();
        if (!empty($res)) {
            //dd($res);
            $oldno = $res->TransNo;
            $oldno = substr($oldno, -4);
            return intval($oldno);
        } else {
            return 0;
        }
    }

    public function transNewNo($jr) {
        $db = '';
        if (in_array($jr, ['AP','AR'])) $db = 'transpaymenthead';
        if (in_array($jr, ['QE'])) $db = 'quotation';
        if (in_array($jr, ['IN'])) $db = 'invoice';
        if ($db == '') return dd("no table from jr $jr");
        $oldno = $this->lastNo($jr);
        $newno = $oldno +1;
        //dd([$oldno,$newno]);
        //dd(4-strlen((string)$newno));
        $newno = $jr.'.'.date('y').str_repeat('0', 4-strlen((string)$newno)).$newno;
        return $newno;
    }
}
