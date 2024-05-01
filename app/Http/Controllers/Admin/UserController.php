<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Type;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getUserType(){

        $data=Type::get();

        return response()->json($data,Responese::HTTP_OK);
    }
}
