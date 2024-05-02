<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders\Order;
use Http;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    //
    public $JS_BASE_URL;
    public $JS_USERNAME;
    public $JS_PASSWORD;
    public $JS_TEMPLATE;
    public function __construct(){
        $this->JS_BASE_URL = env('JS_BASE_URL');
        $this->JS_USERNAME = env('JS_USERNAME');
        $this->JS_PASSWORD = env('JS_PASSWORD');
        $this->JS_TEMPLATE = env('JS_TEMPLATE');
    }
    public function printfInvioceOrder($receiptNumber=0){
        try {
            //code...
            $url =$this->JS_BASE_URL."/api/report";
            info("Constructed URL: $url");
            $receipt = Order::select('id','receipt_number','cashier_id','total_price','ordered_at')
            ->with([
                'cashier',
                'details'
            ])
            ->where('receipt_number',$receiptNumber)
            ->orderBy('id','desc')
            ->get();
            $totalPrice = 0;
            foreach ($receipt as $row) {
                $totalPrice += $row->total_price;
            }

            // Prepare Payload for JS Report Service
            $payload = [
                "template" => [
                    "name" => $this->JS_TEMPLATE,
                ],
                "data" => [
                    'total' => $totalPrice,
                    'data'  => $receipt,
                ],
            ];

            // Send Request to JS Report Service
            $response = Http::withBasicAuth($this->JS_USERNAME, $this->JS_PASSWORD)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post($url, $payload);

            // Success Response Back to Client
            return [
                'file_base64'   => base64_encode($response),
                'error'         => '',
            ];
        } catch (\Throwable $th) {
            //throw $th;
            return [
                'file_base64' => '',
                'error' => $th->getMessage(),
            ];
        }
    }
}
