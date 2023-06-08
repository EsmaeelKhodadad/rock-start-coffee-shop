<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $lookup = [
            User::TYPE_ADMIN => 'admin.sample@gmail.com',
            User::TYPE_USER => 'user.sample@gmail.com',
        ];

        foreach ($lookup as $key => $item) {
            User::create([
                'user_type' => $key,
                'name' => 'Fake name',
                'email' => $item,
                'password' => bcrypt(123456),
            ]);
        }
    }
}
