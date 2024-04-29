<?php

namespace App\Http\Controllers\Admin;

// ============================================================================>> Core Library
use App\Models\Orders\Order;
use Illuminate\Http\Response; // For Responsing data back to Client

// ============================================================================>> Custom Library
// Controller
use App\Http\Controllers\MainController;

// Model


class DashboardController extends MainController
{
    public function getDashboardInfo()
    {
        //Get order data from db and sum total_price using funtion sum
        $totalSaleToday = Order::sum('total_price');
        //Prepare respone
        $data =[
            'total_sale_today'  => $totalSaleToday,
        ];


        // respone to client
        return response()->json($data, Response::HTTP_OK);
    }
}
