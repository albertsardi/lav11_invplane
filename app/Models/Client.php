<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
  protected $table = 'clients';
  protected $primaryKey = 'AccCode';
  protected $keyType = 'string';
  protected $fillable= [
              'AccCode',
              'AccName',
              'Category',
              'SubCategory',
              'Salesman',
              'CreditLimit',
              'CreditActive',
              'Warning',
              'Unlimit',
              'Combine',
              'Taxno',
              'TaxName',
              'TaxAddr',
              'PaymentAr',
              'Area2',
              'PriceChannel',
              'AccNo',
              'Memo',
              'AccTo',
              'Active',
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

  public static function Balance($acccode) {
    $salesTot =  DB::table('invoice')->where('AccCode', $acccode)->where('Status',1)->sum('Total')''
    return $salesTot;
  }
}
