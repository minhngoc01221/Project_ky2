<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Product::create([
        'category_id' => 1,
        'supplier_id' => 1,
        'name' => 'Gạch men cao cấp',
        'price' => 150000,
        'stock' => 100
    ]);
    }

}
