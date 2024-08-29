<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Options extends Model
{
  protected $table = 'options';
  public $timestamps = false;
  

  public static function GetData($opttype, $code='') {
    if ($code=='') {
      $res = Options::where('opttype', $opttype)->select('Code as id','Name')->get();
      return $res->toArray();
    }else{
      $res = Options::where('opttype', $opttype)->where('Code',$code)->select('Code as id','Name')->first();
      return (object)$res->toArray();
    }
  }

  

}


