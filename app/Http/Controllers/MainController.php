<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Model\Common;
use App\Http\Model\User;
use App\Http\Model\Parameter;
use App\Http\Model\Company;
use Session;
use HTML;

//use App\Http\Requests;

class MainController extends Controller
{
    function array_value($arr) {
      $out = [];
      foreach($arr as $r) {
        $out[] = array_values((array)$r);
      }
      return $out;
  }


}
