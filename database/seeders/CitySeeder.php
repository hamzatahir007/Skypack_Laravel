<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [

            // 🇸🇦 Saudi Arabia (1)
            ['country_id' => 1, 'name' => 'Riyadh', 'image' => 'country/city/riyadh.png'],
            ['country_id' => 1, 'name' => 'Jeddah', 'image' => 'country/city/jeddah.png'],
            ['country_id' => 1, 'name' => 'Dammam', 'image' => 'country/city/dammam.png'],
            ['country_id' => 1, 'name' => 'Mecca', 'image' => 'country/city/mecca.png'],
            ['country_id' => 1, 'name' => 'Medina', 'image' => 'country/city/medina.png'],

            // 🇦🇪 UAE (2)
            ['country_id' => 2, 'name' => 'Dubai', 'image' => 'country/city/dubai.png'],
            ['country_id' => 2, 'name' => 'Abu Dhabi', 'image' => 'country/city/abudhabi.png'],
            ['country_id' => 2, 'name' => 'Sharjah', 'image' => 'country/city/sharjah.png'],
            ['country_id' => 2, 'name' => 'Ajman', 'image' => 'country/city/ajman.png'],
            ['country_id' => 2, 'name' => 'Ras Al Khaimah', 'image' => 'country/city/rak.png'],
            ['country_id' => 2, 'name' => 'Fujairah', 'image' => 'country/city/fujairah.png'],

            // 🇶🇦 Qatar (3)
            ['country_id' => 3, 'name' => 'Doha', 'image' => 'country/city/doha.png'],
            ['country_id' => 3, 'name' => 'Al Wakrah', 'image' => 'country/city/alwakrah.png'],
            ['country_id' => 3, 'name' => 'Al Khor', 'image' => 'country/city/alkhor.png'],
            ['country_id' => 3, 'name' => 'Umm Salal', 'image' => 'country/city/ummsalal.png'],

            // 🇵🇰 Pakistan (4)
            ['country_id' => 4, 'name' => 'Karachi', 'image' => 'country/city/karachi.png'],
            ['country_id' => 4, 'name' => 'Lahore', 'image' => 'country/city/lahore.png'],
            ['country_id' => 4, 'name' => 'Islamabad', 'image' => 'country/city/islamabad.png'],
            ['country_id' => 4, 'name' => 'Rawalpindi', 'image' => 'country/city/rawalpindi.png'],
            ['country_id' => 4, 'name' => 'Faisalabad', 'image' => 'country/city/faisalabad.png'],
            ['country_id' => 4, 'name' => 'Multan', 'image' => 'country/city/multan.png'],
            ['country_id' => 4, 'name' => 'Peshawar', 'image' => 'country/city/peshawar.png'],
            ['country_id' => 4, 'name' => 'Quetta', 'image' => 'country/city/quetta.png'],

            // 🇮🇳 India (5)
            ['country_id' => 5, 'name' => 'Mumbai', 'image' => 'country/city/mumbai.png'],
            ['country_id' => 5, 'name' => 'Delhi', 'image' => 'country/city/delhi.png'],
            ['country_id' => 5, 'name' => 'Bangalore', 'image' => 'country/city/bangalore.png'],
            ['country_id' => 5, 'name' => 'Chennai', 'image' => 'country/city/chennai.png'],
            ['country_id' => 5, 'name' => 'Hyderabad', 'image' => 'country/city/hyderabad.png'],
            ['country_id' => 5, 'name' => 'Kolkata', 'image' => 'country/city/kolkata.png'],

            // 🇺🇸 United States (6)
            ['country_id' => 6, 'name' => 'New York', 'image' => 'country/city/newyork.png'],
            ['country_id' => 6, 'name' => 'Los Angeles', 'image' => 'country/city/losangeles.png'],
            ['country_id' => 6, 'name' => 'Chicago', 'image' => 'country/city/chicago.png'],
            ['country_id' => 6, 'name' => 'Houston', 'image' => 'country/city/houston.png'],
            ['country_id' => 6, 'name' => 'Phoenix', 'image' => 'country/city/phoenix.png'],
            ['country_id' => 6, 'name' => 'San Francisco', 'image' => 'country/city/sanfrancisco.png'],
            ['country_id' => 6, 'name' => 'Miami', 'image' => 'country/city/miami.png'],
            ['country_id' => 6, 'name' => 'Dallas', 'image' => 'country/city/dallas.png'],

            // 🇬🇧 United Kingdom (7)
            ['country_id' => 7, 'name' => 'London', 'image' => 'country/city/london.png'],
            ['country_id' => 7, 'name' => 'Manchester', 'image' => 'country/city/manchester.png'],
            ['country_id' => 7, 'name' => 'Birmingham', 'image' => 'country/city/birmingham.png'],
            ['country_id' => 7, 'name' => 'Liverpool', 'image' => 'country/city/liverpool.png'],
            ['country_id' => 7, 'name' => 'Leeds', 'image' => 'country/city/leeds.png'],
            ['country_id' => 7, 'name' => 'Glasgow', 'image' => 'country/city/glasgow.png'],
            ['country_id' => 7, 'name' => 'Edinburgh', 'image' => 'country/city/edinburgh.png'],

            // 🇨🇦 Canada (8)
            ['country_id' => 8, 'name' => 'Toronto', 'image' => 'country/city/toronto.png'],
            ['country_id' => 8, 'name' => 'Vancouver', 'image' => 'country/city/vancouver.png'],
            ['country_id' => 8, 'name' => 'Montreal', 'image' => 'country/city/montreal.png'],
            ['country_id' => 8, 'name' => 'Calgary', 'image' => 'country/city/calgary.png'],

            // 🇩🇪 Germany (9)
            ['country_id' => 9, 'name' => 'Berlin', 'image' => 'country/city/berlin.png'],
            ['country_id' => 9, 'name' => 'Munich', 'image' => 'country/city/munich.png'],
            ['country_id' => 9, 'name' => 'Hamburg', 'image' => 'country/city/hamburg.png'],
            ['country_id' => 9, 'name' => 'Frankfurt', 'image' => 'country/city/frankfurt.png'],

            // 🇫🇷 France (10)
            ['country_id' => 10, 'name' => 'Paris', 'image' => 'country/city/paris.png'],
            ['country_id' => 10, 'name' => 'Lyon', 'image' => 'country/city/lyon.png'],
            ['country_id' => 10, 'name' => 'Marseille', 'image' => 'country/city/marseille.png'],
            ['country_id' => 10, 'name' => 'Nice', 'image' => 'country/city/nice.png'],

            // 🇹🇷 Turkey (11)
            ['country_id' => 11, 'name' => 'Istanbul', 'image' => 'country/city/istanbul.png'],
            ['country_id' => 11, 'name' => 'Ankara', 'image' => 'country/city/ankara.png'],
            ['country_id' => 11, 'name' => 'Izmir', 'image' => 'country/city/izmir.png'],
            ['country_id' => 11, 'name' => 'Antalya', 'image' => 'country/city/antalya.png'],
            ['country_id' => 11, 'name' => 'Bursa', 'image' => 'country/city/bursa.png'],

        ];

        DB::table('cities')->insert($cities);
    }
}
