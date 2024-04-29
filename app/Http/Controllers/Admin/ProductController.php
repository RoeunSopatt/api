<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class ProductController extends MainController
{
    //
    public function getData(Request $request){
        
        //declare variable
        $data = Product::select('*')->with(['type']);

        if($request->key && $request->Key != ''){

            $data = $data->where('code', 'LIKE', '%' . $request->Key . '%')->OrWhere('name', 'LIKE', '%' . $request->Key .'%');

        }

        if($request->type && $request->type != 0){

            $data = $data->where('type_id', $request->type);
        }

        $data = $data->orderBy('id','desc')->paginate($request->limit ? $request->limit :10,'per_page');

        return response()->json($data,Response::HTTP_OK);

    }
}
