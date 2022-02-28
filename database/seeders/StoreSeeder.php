<?php

namespace Database\Seeders;

use App\Models\StoreWarehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_store  = new StoreWarehouse();
        $new_store->name = 'store1';
        $new_store->location = 'lawanson';
        $new_store->save();

        $new_store  = new StoreWarehouse();
        $new_store->name = 'store2';
        $new_store->location = 'ikeja';
        $new_store->save();

        $new_store  = new StoreWarehouse();
        $new_store->name = 'store3';
        $new_store->location = 'owerri';
        $new_store->state = 'imo state';
        $new_store->save();

        $new_store  = new StoreWarehouse();
        $new_store->name = 'store4';
        $new_store->location = 'asaba';
        $new_store->state = 'delta state';
        $new_store->save();
        //
    }
}
