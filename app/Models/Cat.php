<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'promotion_id',
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    // quan hệ nhiều nhiều với product thông qua bảng cat_product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cat_products');
    }
}
