<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'user_id' => 1,
                'type_id' => 1,
                'location_id' => 1,
                'name' => 'Seblak Neraka',
                'image' => '',
                'price' => 10000,
                'description' => 'Seblak pedas tiada tanding',
            ],[
                'user_id' => 1,
                'type_id' => 2,
                'location_id' => 2,
                'name' => 'Bakso Neraka',
                'image' => '',
                'price' => 10000,
                'description' => 'Bakso pedas tiada tanding',
            ],[
                'user_id' => 1,
                'type_id' => 3,
                'location_id' => 3,
                'name' => 'Mie Ayam Neraka',
                'image' => '',
                'price' => 10000,
                'description' => 'Mie Ayam pedas tiada tanding',
            ],
        ];
        foreach($user as $key => $value){
        Menu::create($value);
        }
    }
}
