<?php

namespace Database\Seeders;

use App\Models\MeasurementScale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasuringScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_measurement_scale  = new MeasurementScale();
        $new_measurement_scale->name = 'pieces';
        $new_measurement_scale->save();


        $new_measurement_scale  = new MeasurementScale();
        $new_measurement_scale->name = 'packets';
        $new_measurement_scale->save();


        $new_measurement_scale  = new MeasurementScale();
        $new_measurement_scale->name = 'cartons';
        $new_measurement_scale->save();


        $new_measurement_scale  = new MeasurementScale();
        $new_measurement_scale->name = 'bags';
        $new_measurement_scale->save();
    }
}
