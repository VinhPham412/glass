<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'version_id',
        'quantity',
        'price',
        'image',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function version()
    {
        return $this->belongsTo(Version::class);
    }
}
