<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MeasurementScale;
use App\Models\CriticalQtyMeasurementScale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CriticalQtyMeasurementScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (MeasurementScale::all() as $measureScale)
            CriticalQtyMeasurementScale::create([
                'name' => $measureScale->name
            ]);
    }
}
