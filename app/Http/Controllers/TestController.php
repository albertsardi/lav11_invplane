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

class TestController extends MainController
{
  public function view($formtype, $id='') {
    // return 'test grid';
    $data =[];
    return view('test_grid', $data);
  }

  


}
