<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// define("ProjectFillable", [ 'Name', 'AccName' ]);

class Project extends Model
{
    use HasFactory;
    public $fillable2 = [ 'Name', 'AccName' ];
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [ 'Name', 'AccCode' ];
    // const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    // const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp
    const CREATED_AT = null; //disable laravel timestamp
    const UPDATED_AT = null; //disable laravel creator stamp
    
    // public static function Balance($acccode) {
    //     $salesTot =  DB::table('invoice')->where('AccCode', $acccode)->where('Status',1)->sum('Total')''
    //     return $salesTot;
    // }

    


}
