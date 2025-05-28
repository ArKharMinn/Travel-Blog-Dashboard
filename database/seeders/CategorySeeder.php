<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Beaches',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mountains',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'City Life',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Food & Drink',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cultural Sites',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adventure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budget Travel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
