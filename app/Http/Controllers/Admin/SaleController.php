<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders\Order;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

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

    public function getData(Request $request){

        $data=Order::select('*')->with([
            'cashier',
            'details',
        ]);

        if($request->from && $request->to && $this->_isValidate($request->from)&&$this->_isValidate($request->to)){
            $data= $data->where('create_at',[$request->from . "00:00:00", $request->to ."23:59:59"]);
        }
        if($request->reciept_number){
            $data->$data->where('receipt_number',$request->reciept_number);
        }
        if($request->reciept_number){
            $data->$data->where('receipt_number',$request->reciept_number);
        }

        $user =JWTAuth::parseToken()->authenticate();
        if($user->type_id ==2){
            $data=$data->where('cashier_id',$user->id);
        }
        $data =$data->orderBy('id','desc')->paginate($request->limit ? $request->limit :10);
        return response()->json($data,Response::HTTP_OK);
    }
    public function delete($id =0){
        $data =Order::find($id);

        if($data){
            $data->delete();
            return response()->json([
                'status' => 'ជោគជ័យ',
                'message'=> 'ទិន្នន័យត្រូវបានលុប'
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'status'=> 'បរាជ័យ',
                'message'=> 'ទិន្នន័យមិនត្រឹមត្រូវ'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
