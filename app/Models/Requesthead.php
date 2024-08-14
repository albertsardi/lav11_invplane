<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Requesthead extends Model
{
  protected $table = 'requsthead';
  protected $primaryKey = 'TransNo';
  protected $keyType = 'string';
}
