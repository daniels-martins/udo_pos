<?php

namespace Database\Seeders;

use App\Models\LowQtyMeasurementScale;
use App\Models\MeasurementScale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LowQtyMeasurementScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (MeasurementScale::all() as $measureScale)
            LowQtyMeasurementScale::create([
                'name' => $measureScale->name
            ]);
    }
}
