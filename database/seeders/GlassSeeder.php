<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GlassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = File::get(database_path('phpmyadmin/glass.sql'));
        
        // Split the SQL file into individual statements
        $statements = array_filter(array_map('trim', explode(';', $sql)));
        
        foreach ($statements as $statement) {
            if (!empty($statement)) {
                try {
                    DB::unprepared($statement);
                } catch (\Exception $e) {
                    // Log the error and continue with the next statement
                    \Log::error("Error executing SQL statement: " . $e->getMessage());
                    \Log::error("Statement: " . $statement);
                }
            }
        }
    }
}