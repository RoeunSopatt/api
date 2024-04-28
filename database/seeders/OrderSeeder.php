<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //create Order 100 Record
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'receipt_number' => $this->generateReceiptNumber(),
                'cashier_id'     => rand(1,10),
                'total_price'    => 0,
                'ordered_at'     => Date('Y-m-d H:i:s')
            ];
            //insert data
            DB::table('order')->insert($data);

            $orders = Order::get();
            foreach ($orders as $order) {

                $details        = [];
                $totalPrice     = 0;
                $nOfDetails     = rand(1,10);
                for ($j = 0; $j < $nOfDetails; $j++) {

                    $product   = DB::table('product')->find(rand(1,10));
                    $qty       = rand(1,10);
                    $totalPrice += $product-> unit_price * $qty;

                    $details[] = [
                        'order_id'    => $order->id,
                        'product_id'  => $product->id,
                        'qty'         => $qty,
                        'unit_price'  => $product-> unit_price
                    ];
                }
                DB::table('order_details')->insert($details);

                $order->$totalPrice   = $totalPrice;
                $order-> save();
            }
        }
    }

    public function generateReceiptNumber(){


        $number = rand(100000,999999);
        $check  = DB::table('order')->where('receipt_number', $number)->first();

        if($check){
            return $this->generateReceiptNumber();
        }else{
            return $number;
        }
    }
}
