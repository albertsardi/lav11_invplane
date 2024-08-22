<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [ 'FinishDate', 'Projectid' ];
    // const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    // const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp
    const CREATED_AT = null; //disable laravel timestamp
    const UPDATED_AT = null; //disable laravel creator stamp
    
    // public static function Balance($acccode) {
    //     $salesTot =  DB::table('invoice')->where('AccCode', $acccode)->where('Status',1)->sum('Total')''
    //     return $salesTot;
    // }

    public static function list() {
        // SELECT tasks.*,projects.Name AS ProjectName,projectid,ProjectId FROM tasks LEFT JOIN projects ON projects.id=tasks.Projectid
        $dat = DB::table('tasks')->select('tasks.*','projects.Name AS ProjectName','projects.id as ProjectId')
            ->leftJoin('projects','projects.id','=','tasks.Projectid')->get();
            return $dat;
    }
}
