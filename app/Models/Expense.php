<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expense extends Model
{
  protected $table = 'transexpense';

  public static function Get($id=null, $option=null) {
    if ($id==null) {
      $data = Expense::all();
    } else {
      $data = Expense::where('TransNo',$id)->first();
      if(!empty($data)) {
        $data['detail'] = DB::table('journal as j')
                        ->select(['j.*','m.AccName'])
                        ->leftJoin('mastercoa as m', 'm.AccNo', '=', 'j.AccNo')
                        ->where('ReffNo', $data->TransNo)
                        ->get();
			  foreach($data['detail'] as $dt) {
            $dt->Debet  = debet($dt->Amount);
          	$dt->Credit = credit($dt->Amount);
        } 
      }
    }
     return (object)['status'=>'OK', 'data'=>$data];
  }

 

}

 // func lib
 function debet($val) {
  if($val>0) { return $val; } else {return 0; }
}
function credit($val) {
  if($val<0) { return -$val; } else {return 0; }
}

