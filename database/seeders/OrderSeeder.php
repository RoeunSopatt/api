<?php

namespace Database\Seeders;

use App\Models\Orders\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ============ Order Status ============ \\
        // DB::table('order_status')->insert([
        //     ['name' => 'paid', 'color' => '#00FF00'], // Green color for 'paid' status
        //     ['name' => 'pending', 'color' => '#FFFF00'], // Yellow color for 'pending' status
        //     ['name' => 'cancelled', 'color' => '#FF0000'], // Red color for 'cancelled' status
        // ]);

        // ===>> Create Order Records
        $data = [];
        for ($i = 1; $i <= 1000; $i++) {

            $data[] = [
                'receipt_number'    => $this->generateReceiptNumber(),
                'cashier_id'        => rand(1, 2),
                'total_price'       => 0,
                'ordered_at'        => Date('Y-m-d H:i:s')
            ];
        }

        // ===>> Create Order Records
        DB::table('order')->insert($data);

        // ===>> Create Order Order Detail
        $orders = Order::get();
        foreach ($orders as $order) {

            $details        = [];
            $totalPrice     = 0; // To Save in table order
            $nOfDetails     = rand(1, 6); //ចំនួនផលិតផលនៅក្នុងបុង

            for ($i = 1; $i <= $nOfDetails; $i++) {

                $product    = DB::table('product')->find(rand(1, 20));
                $qty        = rand(1, 10);
                $totalPrice += $product->unit_price * $qty;

                $details[] = [
                    'order_id'      => $order->id,
                    'product_id'    => $product->id,
                    'qty'           => $qty,
                    'unit_price'    => $product->unit_price
                ];
            }

            DB::table('order_details')->insert($details);


            // ==>> Update table order for total price.
            $order->total_price     = $totalPrice;
            $order->save();
        }
    }

    public function generateReceiptNumber()
    {

        $number     = rand(100000, 999999);
        $check      = DB::table('order')->where('receipt_number', $number)->first();

        if ($check) {
            return $this->generateReceiptNumber();
        } else {
            return $number;
        }
    }
}
