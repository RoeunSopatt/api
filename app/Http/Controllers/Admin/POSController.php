<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders\Order;
use App\Models\Products\Type;
use Illuminate\Http\Request;
use ProductType;
use Tymon\JWTAuth\Facades\JWTAuth;

class POSController extends Controller
{
    //
    public function getProducts(){
        $products = Type::select("id","name")->with([
            'products:id,name,image,type_id,unit_price'
        ])->get();
        return response()->json($products,Response::HTTP_OK);
    }

    private function _generateRecieptNumber(){
        $number = rand(1000000, 9999999);
        $data =Order::where('reciept_number',$number)->first();

        if($data){
            return $this->_generateRecieptNumber();
        }
        return $number;
    }
}
