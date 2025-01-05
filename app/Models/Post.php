<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'content',
        'thumbnail',
        'user_id',
        'catpost_id'
    ];

    // Xoá ảnh liên quan khi xoá bài viết
    protected static function booted()
    {
        static::deleting(function ($post) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
        });

        static::saved(function ($post) {
            // Tìm tất cả các ảnh trong nội dung bài viết
            preg_match_all('/uploads\/[a-zA-Z0-9\-_]+\.(jpg|jpeg|png|gif|webp)/', $post->content, $matches);
            $imagePaths = $matches[0] ?? [];


        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function catpost()
    {
        return $this->belongsTo(Catpost::class);
    }
}
