<?php

namespace App\Models\Orders;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';


    public function order() //M:1
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product() //M:1
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
