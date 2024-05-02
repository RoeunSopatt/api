<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders\Order;
use App\Models\Products\Type;
use App\Services\TelegramService;
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
    private function _senNotification($orderData){
        $htmlMessage ="<b> ការបញ្ជាទិញទទួលបានជោគជ័យ!</b>\n";
        $htmlMessage ="<b> -លេខវិកយប័ត្រ៖" .$orderData->reciept_number . "\n";
        $htmlMessage ="<b> -អ្នកគិតលុយ->" .$orderData->cashier->name;

        $productList= '';
        $totalProducts =0;

        foreach($orderData->details as $detail){
            $productList .=sprintf(
                "%-20s | %-15s | %-10s | %s\n",
                $detail->product->name,
                $detail->unit_price,
                $detail->qty,
                PHP_EOL
            );
            $totalProducts += $detail->qty;
        }


        $htmlMessage .= "\n--------------------------------------\n";
        $htmlMessage .= "ផលិតផល​​​​​​                 | តម្លៃដើម(៛)       |បរិមាណ\n";
        $htmlMessage .= $productList . "\n";
        $htmlMessage .= "<b>* សរុបទាំងអស់៖</b> $totalProducts ទំនិញ $orderData->total_price ៛\n";
        $htmlMessage .= "- កាលបរិច្ឆេទៈ​ ".$orderData->ordered_at;

        TelegramService::sendMessage($htmlMessage);
    }
}
