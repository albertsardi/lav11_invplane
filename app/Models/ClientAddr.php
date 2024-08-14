<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
  protected $table = 'clients';
  protected $primaryKey = 'id';
  protected $keyType = 'string';
  protected $fillable= [
              'Code',
              'AccCode',
              'Address',
              'Area',
              'Route',
              'Zip',
              'ContachPerson',
              'Phone',
              'Fax',
              'Email',
              'DefAddr',
              'AccoutId',
  ];
  // const CREATED_AT = 'CreatedDate'; //change laravel timestamp
  // const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp
  const CREATED_AT = null; //disable laravel timestamp
  const UPDATED_AT = null; //disable laravel creator stamp

  public static function Get($id=null) {
    if ($id==null) {
      $data = CustomerSupplier::all();
    } else {
      $data = CustomerSupplier::where('id',$id)->first();
      $data->Address =  DB::table('masteraccountaddr')->where('AccountId',$id)->first();
    }
    return (object)['status'=>'OK', 'data'=>$data];
  }
}
