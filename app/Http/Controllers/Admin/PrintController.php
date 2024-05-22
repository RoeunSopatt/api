<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MainController;
use App\Models\Orders\Order;
use Illuminate\Database\QueryException;

class PrintController extends MainController
{
    private $JS_BASE_URL;
    private $JS_USERNAME;
    private $JS_PASSWORD;
    private $JS_TEMPLATE;

    public function __construct()
    {
        $this->JS_BASE_URL   = env('JS_BASE_URL');
        $this->JS_USERNAME   = env('JS_USERNAME');
        $this->JS_PASSWORD   = env('JS_PASSWORD');
        $this->JS_TEMPLATE   = env('JS_TEMPLATE');
    }

    public function printInvoiceOrder($receiptNumber = 0)
    {
        try {

            // URL Preparation

            $url = "https://sopatt123.jsreportonline.net/api/report";
            // Debugging: Log the constructed URL
            info("Constructed URL: $url");

            // Get Data from DB
            $receipt = Order::select('id', 'receipt_number', 'cashier_id', 'total_price', 'ordered_at')
                ->with([
                    'cashier', // M:1
                    'details' // 1:M
                ])
                ->where('receipt_number', $receiptNumber)
                // ->orderBy('id', 'desc')
                ->first();

            // Find Total Price
            // $totalPrice = 0;
            // foreach ($receipt as $row) {
            //     $totalPrice += $row->total_price;
            // }

            // Prepare Payload for JS Report Service
            $payload = [
                "template" => [
                    "name" => 'main',
                ],
                // "data" => [
                //     'total' => $totalPrice,
                //     'data'  => $receipt,
                // ],
                'data'  => $receipt,
            ];

            // Send Request to JS Report Service
            $response = Http::withBasicAuth('dopaminegm@mail.com','Patt2004')
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post($url, $payload);

            // Success Response Back to Client
            return [
                'file_base64'   => base64_encode($response),
                'error'         => '',
            ];
        } catch (\Exception $e) {
            // Handle the exception
            return [
                'file_base64' => '',
                'error' => $e->getMessage(),
            ];
        }
    }

}