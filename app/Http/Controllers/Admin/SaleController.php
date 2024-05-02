<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    //
    private function _isValidate($date){
        if(false===strtotime($date)){
            return false;
        }else{
            return true;
        }
    }
}
