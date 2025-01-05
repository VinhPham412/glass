<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'stock',
        'product_id',
        'color',
        'size'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }


    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
