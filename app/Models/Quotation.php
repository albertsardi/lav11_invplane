<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Quotation extends Model
{
  protected $table = 'quotation';
  protected $primaryKey = 'TransNo';
  protected $keyType = 'string';
  protected $fillable= [
              'TransNo',
              'TransDate',
              'AccCode',
              'AccnName',
              'DeliveryCode',
              'Warehouse',
              'Salesman',
              'DueDate',
              'TaxAmount',
              'FreightPercent',
              'FreightAmount',
  ];
  // const CREATED_AT = 'CreatedDate'; //change laravel timestamp
  // const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp
  const CREATED_AT = null; //disable laravel timestamp
  const UPDATED_AT = null; //disable laravel creator stamp

  
}
