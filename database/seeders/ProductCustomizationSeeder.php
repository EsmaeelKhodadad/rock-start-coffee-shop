<?php

namespace Database\Seeders;

use App\Models\Customization;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCustomizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $lookup = [
            'Latte' => 'Milk',
            'Cappuccino' => 'Size',
            'Espresso' => 'Shots',
            'Hot chocolate' => 'Size',
            'Cookie' => 'Kind',
            'All' => 'Consume location',
        ];
        foreach ($lookup as $key => $item) {
            $productId = Product::active()->whereTitle($key)->first()->id;
            $customizationId = Customization::active()->whereTitle($item)->first()->id;
            DB::table('customization_product')->insert([
                'product_id' => $productId,
                'customization_id' => $customizationId,
            ]);
        }
    }
}
