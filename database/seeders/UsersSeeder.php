<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Merchant',
                'email' => 'merchant@gmail.com',
                'password' => bcrypt('abcd1234'),
                'role' => 'merchant',
                'company_name' => 'PT Transindo Data Perkasa',
                'address' => 'Jl. Melati No. 3, Jakarta',
                'contact' => '08912345678',
                'description' => 'Perusahaan yang bergerak dalam bidang Katering Makanan',
            ],[
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('abcd1234'),
                'role' => 'customer',
            ]
        ];
        foreach($user as $key => $value){
        User::create($value);
        }
    }
}
