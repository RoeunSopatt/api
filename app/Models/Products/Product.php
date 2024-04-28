<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Orders\Detail;
class Product extends Model
{
    use HasFactory;
    protected $table="products";

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class,'type_id','id')->select('id','name');

    }
    public function orderDetails(): HasMany
    {
        return $this->hasMany(Detail::class,'product_id');
    }
}   