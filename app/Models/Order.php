<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
	    'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
	
	public function versions()
	{
		return $this->hasManyThrough(
			Version::class,        // Model Version
			OrderItem::class,      // Model trung gian
			'order_id',            // Khóa ngoại ở OrderItem tham chiếu tới Order
			'id',                  // Khóa chính trong Version
			'id',                  // Khóa chính trong Order
			'version_id'           // Khóa ngoại ở OrderItem tham chiếu tới Version
		);
	}
}
