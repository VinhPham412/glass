<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'version_id'
    ];

    public function version()
    {
        return $this->belongsTo(Version::class);
    }
}
