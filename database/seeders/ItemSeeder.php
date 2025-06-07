<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolCategoryId = DB::table('categories')->where('name', 'School Supplies')->value('id');
        $officeCategoryId = DB::table('categories')->where('name', 'Office Supplies')->value('id');

        DB::table('items')->insert([
            ['category_id' => $schoolCategoryId, 'name' => 'Notebooks', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => $schoolCategoryId, 'name' => 'Pens', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => $officeCategoryId, 'name' => 'Staplers', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => $officeCategoryId, 'name' => 'Folders', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
