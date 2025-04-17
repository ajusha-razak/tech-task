<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = array(
            array('name' => 'Afghanistan'),
            array('name' => 'Albania'),
            array('name' => 'United Kingdom'),
            array('name' => 'United States of America'),
        );

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
