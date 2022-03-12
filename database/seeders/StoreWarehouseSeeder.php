<?php

namespace Database\Seeders;

use App\Models\StoreWarehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreWarehouseSeeder extends Seeder
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
        $new_store->address = 'lawanson';
        $new_store->save();

        $new_store  = new StoreWarehouse();
        $new_store->name = 'store2';
        $new_store->address = 'ikeja';
        $new_store->save();

        $new_store  = new StoreWarehouse();
        $new_store->name = 'store3';
        $new_store->address = 'owerri';
        $new_store->state = 'imo state';
        $new_store->save();

        $new_store  = new StoreWarehouse();
        $new_store->name = 'store4';
        $new_store->address = 'asaba';
        $new_store->state = 'delta state';
        $new_store->save();
        //
    }
}
