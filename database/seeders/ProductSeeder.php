<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0 ; $i < 500 ; $i++) {
            $product = new Product();
            $product->name = Str::random(10);
            $product->price = rand(1,5000);
            $product->save();
        }
    }
}
