<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Options extends Model
{
  protected $table = 'options';
  public $timestamps = false;
  //protected $primaryKey = 'AccCode';
  //protected $keyType = 'string';
  protected $fillable= [
    'Code',
    'Name',
    'opttype',
];

  // public static function GetData($opttype, $code='') {
  //   dd($code);
  //   if ($code=='') {
  //     $res = Options::where('opttype', $opttype)->select('Code as id','Name')->get();
  //     return $res->toArray();
  //   }else{
  //     $res = Options::where('opttype', $opttype)->select('Code as id','Name')->get();
  //     return $res->toArray();
  //   }
  // }
  public static function GetData($opttype, $code='') {
    if ($code=='') {
      $out = [];
      $res = Options::where('opttype', $opttype)->get();
      foreach($res as $r) {
        $out[] = [
          'id' => $r->Code??'',
          'Name' => $r->Name??'',
        ];
      }
      return $out;
    }else{
      $res = Options::where('opttype', $opttype)->select('Code as id','Name')->get();
      return $res->toArray();
    }
  }

  

}


