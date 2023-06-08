<?php

namespace Database\Seeders;

use App\Models\Customization;
use Illuminate\Database\Seeder;

class CustomizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $sampleCustomizations = [
            'Milk',
            'Size',
            'Shots',
            'Kind',
            'Consume location',
        ];

        foreach($sampleCustomizations as $sampleCustomization){
            Customization::create([
                'title' => $sampleCustomization,
            ]);
        }
    }
}
