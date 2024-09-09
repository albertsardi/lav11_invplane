<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentARAP extends Model
{
    use HasFactory;
        protected $table = 'transpaymentarap';
        //protected $primaryKey = 'AccCode';
        //protected $keyType = 'string';
        protected $fillable= [
                    'InvNo',
                    'AmountPaid',
                    'AmountAdj',
                    'TransNo',
                    'Memo'
        ];
        // const CREATED_AT = 'CreatedDate'; //change laravel timestamp
        // const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp
        const CREATED_AT = null; //disable laravel timestamp
        const UPDATED_AT = null; //disable laravel creator stamp
      
        
}
