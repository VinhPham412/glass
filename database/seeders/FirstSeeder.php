<?php

namespace Database\Seeders;

use App\Models\CatPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo ra 2 user tên Vinh và Hiếu
        User::create([
            'name' => 'Vinh',
            'email' => 'vinh10@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Hiếu',
            'email' => 'tranmanhhieu10@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Tạo ra ra 3 danh mục bài viết
        CatPost::create([
            'title' => 'Thể thao',
        ]);


        CatPost::create([
            'title' => 'Du lịch',
        ]);

        CatPost::create([
            'title' => 'Thời trang',
        ]);

        // Tạo ra 10 bài viết
        for ($i = 0; $i <= 100; $i++) {
            Post::create([
            'title' => 'Bài viết số ' . $i,
            'content' => 'Nội dung bài viết số ' . $i,
            'thumbnail' => 'https://picsum.photos/200/300',
            'catpost_id' => rand(1, 3),
            'user_id' => rand(1, 2),
            'updated_at' => now()->setDate(2024, rand(11, 12), rand(1, 30))->setTime(rand(0, 23), rand(0, 59), rand(0, 59)),
            ]);
        }

    }
}
