<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'masteraccount';
  protected $primaryKey = 'AccCode';
  protected $keyType = 'string';
}
