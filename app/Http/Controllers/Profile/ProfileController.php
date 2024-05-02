<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProfileController extends Controller
{
    //
    public function view(){
        $auth =JWTAuth::parseToken()->authenticate();

        $user=User::select("id","name","phone","email","avatar")->where('id',$auth->id)->first();
        return response()->json($user,Response::HTTP_OK);
    }
}
