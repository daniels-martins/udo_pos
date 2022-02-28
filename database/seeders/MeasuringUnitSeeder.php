<?php

namespace Database\Seeders;

use App\Models\MeasurementScale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasuringUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_measurement_scale  = new MeasurementScale();
        $new_measurement_scale->identity = 'pieces';
        $new_measurement_scale->save();


        $new_measurement_scale  = new MeasurementScale();
        $new_measurement_scale->identity = 'packets';
        $new_measurement_scale->save();


        $new_measurement_scale  = new MeasurementScale();
        $new_measurement_scale->identity = 'cartons';
        $new_measurement_scale->save();


        $new_measurement_scale  = new MeasurementScale();
        $new_measurement_scale->identity = 'bags';
        $new_measurement_scale->save();
    }
}
