<?php

namespace App\Models\Orders;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public function cashier()
    {
        return $this->belongsTo(User::class,'cashier_id')->select('id', 'name');
    }

    public function details()
    {
        return $this-> hasMany(Detail::class, 'order_id')->select('id','order_id','qty','product_id','unit_price')->with([
            'product:id,name,image'
        ]);
    }
}
