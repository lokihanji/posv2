<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notebookItemId = DB::table('items')->where('name', 'Notebooks')->value('id');
        $penItemId = DB::table('items')->where('name', 'Pens')->value('id');
        $staplerItemId = DB::table('items')->where('name', 'Staplers')->value('id');
        $folderItemId = DB::table('items')->where('name', 'Folders')->value('id');

        DB::table('products')->insert([
            [
                'item_id' => $notebookItemId,
                'name' => 'A5 Lined Notebook',
                'description' => 'A5 size lined notebook for school use.',
                'price' => 50.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_id' => $penItemId,
                'name' => 'Blue Ballpoint Pen',
                'description' => 'Standard blue ballpoint pen for writing.',
                'price' => 10.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_id' => $staplerItemId,
                'name' => 'Standard Stapler',
                'description' => 'Office stapler for everyday use.',
                'price' => 150.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_id' => $folderItemId,
                'name' => 'Plastic Document Folder',
                'description' => 'Durable plastic folder for document storage.',
                'price' => 30.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
