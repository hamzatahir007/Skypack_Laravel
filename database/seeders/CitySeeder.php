<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['country_id' => 1, 'name' => 'Riyadh', 'image' => 'country/city/riyadh.png'],
            ['country_id' => 1, 'name' => 'Jeddah', 'image' => 'country/city/jeddah.png'],
            ['country_id' => 1, 'name' => 'Dammam', 'image' => 'country/city/dammam.png'],

            ['country_id' => 2, 'name' => 'Dubai', 'image' => 'country/city/dubai.png'],
            ['country_id' => 2, 'name' => 'Abu Dhabi', 'image' => 'country/city/abudhabi.png'],
            ['country_id' => 2, 'name' => 'Sharjah', 'image' => 'country/city/sharjah.png'],

            ['country_id' => 3, 'name' => 'Karachi', 'image' => 'country/city/karachi.png'],
            ['country_id' => 3, 'name' => 'Lahore', 'image' => 'country/city/lahore.png'],
            ['country_id' => 3, 'name' => 'Islamabad', 'image' => 'country/city/islamabad.png'],

            ['country_id' => 4, 'name' => 'Mumbai', 'image' => 'country/city/mumbai.png'],
            ['country_id' => 4, 'name' => 'Delhi', 'image' => 'country/city/delhi.png'],
            ['country_id' => 4, 'name' => 'Bangalore', 'image' => 'country/city/bangalore.png'],
        ];

        DB::table('cities')->insert($cities);
    }
}
