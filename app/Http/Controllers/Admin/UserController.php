<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Type;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getUserType(){

        $data=Type::get();

        return response()->json($data,Responese::HTTP_OK);
    }
    public function getData(Request $request){

        $data = User::select('id', 'name', 'phone', 'email', 'type_id', 'avatar', 'create_at', 'is_active')
        ->with(['type']);
        if($request->key && $request->key != ''){
            $data = $data->where('name','LIKE','%' . $request->key .'%')->Orwhere('phone', 'LIKE', '%' .$request->key .'%');

        }
        $data = $data->orderBy('id','desc')->paginate($request->limit? $request->limit: 10,);
        return response()->json($data,Responese::HTTP_OK);
    }

    public function view($id=0){

        $data =User::select('id','name','phone', 'phone', 'email', 'type_id', 'avatar', 'create_at', 'is_active')->with(['type'])->find( $id );

        if($data){
            return response()->json($data,Responese::HTTP_OK);
        }else{

            return response()->json([
                'status'=>'fail',
                'message'=> 'រកទិន្នន័យមិនឃើញក្នុងប្រព័ន្ធ'
            ],Responese::HTTP_OK);
        }
    }
}
