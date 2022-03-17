<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StoreWarehouse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // all the products will belong to user_mr_izu
        $owner = User::where('username', 'webdev587')->get();

        $new_store  = new StoreWarehouse();
        $new_store->name = 'store5';
        $new_store->address = 'lawanson';
        $new_store->save();
        // $owner->storeWarehouse()->store($new_store);

        // $new_store  = new StoreWarehouse();
        // $new_store->name = 'store6';
        // $new_store->address = 'ikeja';
        // $owner->storeWarehouse()->store($new_store);

        // $new_store  = new StoreWarehouse();
        // $new_store->name = 'store7';
        // $new_store->address = 'owerri';
        // $new_store->state = 'imo state';
        // $owner->storeWarehouses()->store($new_store);

        // $new_store  = new StoreWarehouse();
        // $new_store->name = 'store8';
        // $new_store->address = 'asaba';
        // $new_store->state = 'delta state';
        // $owner->storeWarehouse()->store($new_store);
        //
    }
}
