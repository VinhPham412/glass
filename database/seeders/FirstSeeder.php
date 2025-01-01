<?php

namespace Database\Seeders;

use App\Models\CatPost;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo các vai trò và quyền mặc định
        // Tạo vai trò "super_admin" nếu chưa tồn tại
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        
        // Tạo ra 2 user tên Vinh và Hiếu
        $admin_vinh = User::create([
            'name' => 'Vinh',
            'email' => 'vinh10@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin_hieu = User::create([
            'name' => 'Hiếu',
            'email' => 'tranmanhhieu10@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Gán vai trò "super_admin" cho user Vinh và Hiếu
        $admin_vinh->assignRole($superAdminRole);
        $admin_hieu->assignRole($superAdminRole);

        // Gán full quyền cho 2 admin Vinh và Hiếu
        

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

        // Tạo ra 3 page là: Chính sách, liên hệ, giới thiệu
        Page::create([
            'title' => 'Chính sách',
            'content' => 'Nội dung chính sách',
            'thumbnail' => 'https://picsum.photos/200/300',
            'user_id' => rand(1, 2),
        ]);

        Page::create([
            'title' => 'Liên hệ',
            'content' => 'Nội dung liên hệ',
            'thumbnail' => 'https://picsum.photos/200/300',
            'user_id' => rand(1, 2),
        ]);

        Page::create([
            'title' => 'Giới thiệu',
            'content' => 'Nội dung giới thiệu',
            'thumbnail' => 'https://picsum.photos/200/300',
            'user_id' => rand(1, 2),
        ]);

    }
}
