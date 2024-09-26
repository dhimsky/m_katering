<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location = [
            [
                'name' => 'Jakarta',
            ],[
                'name' => 'Bandung',
            ],[
                'name' => 'Semarang',
            ],
        ];
        foreach($location as $key => $value){
        Location::create($value);
        }
    }
}
