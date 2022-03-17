<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\Customer::factory(100)->create();
        // \App\Models\Product::factory(100)->create();
        // \App\Models\Supplier::factory(5)->create();
        
        // $this->call(ProdTypeSeeder::class);
        // $this->call(CountrySeeder::class);
        $this->call(StoreWarehouseSeeder::class);
        // $this->call(MeasuringScaleSeeder::class);
        // $this->call(CriticalQtyMeasurementScaleSeeder::class);
        // $this->call(LowQtyMeasurementScaleSeeder::class);
    }
}
