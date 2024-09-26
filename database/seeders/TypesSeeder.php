<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
            [
                'name' => 'Makanan Ringan',
            ],[
                'name' => 'Makanan Berat',
            ],[
                'name' => 'Makanan Penutup',
            ],
        ];
        foreach($type as $key => $value){
        Type::create($value);
        }
    }
}
