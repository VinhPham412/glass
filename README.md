# Để khởi chạy dự án

* Xóa storage trong public 
* Sau đó chạy lại lệnh
* `php artisan storage:link `
* Cập nhật lại permission chạy lệnh
* `php artisan shield:generate --all`  
* Tối ưu cache filament chạy 2 lệnh 
```powershell
php artisan icons:cache  
php artisan filament:cache-components  
```

# Clone dự án vào cơ sở dữ liệu
* Dùng tinker shell
* `php artisan tinker`
* trong tinker chạy các lệnh 
```tinker 
$tableName = 'glass';
$data = DB::table($tableName)->get();
file_put_contents(database_path("seeders/{$tableName}_seeder.json"), $data->toJson());
```    
* Tạo seeder cho bảng glass
* Mở file seeder tại database/seeders/GlassSeeder.php và chỉnh sửa:
```php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GlassSeeder extends Seeder
{
    public function run()
    {
        // Đọc dữ liệu từ file JSON
        $data = json_decode(file_get_contents(database_path('seeders/glass_seeder.json')), true);

        // Insert dữ liệu vào bảng glass
        DB::table('glass')->insert($data);
    }
}
```
* Mở file DatabaseSeeder.php trong thư mục database/seeders và thêm dòng sau:
* `$this->call(GlassSeeder::class);`
* Khởi chạy bằng lệnh
* `php artisan migrate:refresh --seed`
