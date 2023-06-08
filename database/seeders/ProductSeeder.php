<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $sampleProducts = [
            'Latte',
            'Cappuccino',
            'Espresso',
            'Tea',
            'Hot chocolate',
            'Cookie',
            'All',
        ];

        $creatorId = User::active()->where('user_type', User::TYPE_ADMIN)->first()->id;
        foreach($sampleProducts as $sampleProduct){
            Product::create([
                'creator_id' => $creatorId,
                'title' => $sampleProduct,
            ]);
        }
    }
}
