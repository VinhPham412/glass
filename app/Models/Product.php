<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'brand_id',
        'origin_id',
        'material_id',
        'style_id',
        'shape_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    public function shape()
    {
        return $this->belongsTo(Shape::class);
    }

    public function cats()
    {
        return $this->belongsToMany(Cat::class, 'cat_products');
    }

    public function versions()
    {
        return $this->hasMany(Version::class);
    }

    public function review_pros()
    {
        return $this->hasMany(ReviewPro::class);
    }
	
	public function getFirstImage()
	{
		return $this->versions()
			->whereHas('images') // Chỉ lấy các version có ảnh
			->with(['images' => function ($query) {
				$query->orderBy('id', 'asc'); // Sắp xếp ảnh theo thứ tự
			}])
			->orderBy('id', 'asc')
			->first()?->images->first()?->link;
	}
    
}
