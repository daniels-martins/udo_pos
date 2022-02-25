<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_contry  = new Country();
        $new_contry->name = 'United States of America';
        $new_contry->abbr = 'USA';
        $new_contry->zip = '10001';
        $new_contry->save();

        $new_contry  = new Country();
        $new_contry->name = 'Nigeria';
        $new_contry->abbr = 'NG';
        $new_contry->zip = '23401';
        $new_contry->save();

        
    }
}
