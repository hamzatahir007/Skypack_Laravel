<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['name' => 'Saudi Arabia', 'image' => 'country/saudi.png'],
            ['name' => 'United Arab Emirates', 'image' => 'country/uae.png'],
            ['name' => 'Pakistan', 'image' => 'country/pakistan.png'],
            ['name' => 'India', 'image' => 'country/india.png'],
            ['name' => 'United States', 'image' => 'country/usa.png'],
            ['name' => 'United Kingdom', 'image' => 'country/uk.png'],
            ['name' => 'Canada', 'image' => 'country/canada.png'],
            ['name' => 'Germany', 'image' => 'country/germany.png'],
            ['name' => 'France', 'image' => 'country/france.png'],
            ['name' => 'Turkey', 'image' => 'country/turkey.png'],
        ];

        DB::table('countries')->insert($countries);
    }
}
