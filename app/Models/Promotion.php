<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'code',
        'type',
        'value',
        'status',
        'start_date',
        'end_date'
    ];

    public function cats() {
        return $this->hasMany(Cat::class);
    }
}
