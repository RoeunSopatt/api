<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products\Type;
use Illuminate\Http\Request;
use ProductType;

class POSController extends Controller
{
    //
    public function getProducts(){
        $products = Type::select("id","name")->with([
            'products:id,name,image,type_id,unit_price'
        ])->get();
        return response()->json($products,Response::HTTP_OK);
    }
}
