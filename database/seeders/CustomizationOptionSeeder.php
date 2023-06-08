<?php

namespace Database\Seeders;

use App\Models\Customization;
use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomizationOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $lookup = [
            'Milk' => ['skim', 'semi', 'whole',],
            'Size' => ['small', 'medium', 'large',],
            'Shots' => ['single', 'double', 'triple',],
            'Kind' => ['chocolate chip', 'ginger',],
            'Consume location' => ['take away', 'in shop',],
        ];
        foreach ($lookup as $key => $item) {
            $customizationId = Customization::active()->whereTitle($key)->first()->id;
            foreach($item as $option){
                $optionId = Option::active()->whereTitle($option)->first()->id;
                DB::table('customization_option')->insert([
                    'customization_id' => $customizationId,
                    'option_id' => $optionId,
                ]);
            }
        }
    }
}
