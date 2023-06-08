<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $sampleOptions = [
            'skim',
            'semi',
            'whole',
            'small',
            'medium',
            'large',
            'single',
            'double',
            'triple',
            'chocolate chip',
            'ginger',
            'take away',
            'in shop',
        ];

        foreach ($sampleOptions as $sampleOption) {
            Option::create([
                'title' => $sampleOption,
            ]);
        }
    }
}
