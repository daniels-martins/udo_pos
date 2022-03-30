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
        // $owner = User::where('username', 'webdev587')->get();
        $all_users = User::all();
        $locations = [
            'lagos' => 'ikeja', 'lagos_01' => 'lawanson',
            'lagos_02' => 'mushin', 'lagos_03' => 'orile',
            'delta' => 'asaba', 'delta_01' => 'ogwashi-uku',
            'imo' => 'owerri', 'anambra' => 'awka',
            'rivers' => 'portharcourt', 'ogun' => 'abeokuta'
        ];
        // a variable to uniquely identify each shop for every user
        $shopkey = 1;
        foreach ($locations as $state => $address) {
            foreach ($all_users as $key => $owner) {
                $new_store  = new StoreWarehouse();
                $new_store->name = "store$shopkey";
                $new_store->address = $address;
                // remove the part after the '_'
                $val_arr = explode('_', $state, 1);
                $formattedStateName = implode('', $val_arr);
                // use the part before the '_'
                $new_store->state = $formattedStateName;
                $new_store->save();
                $owner->stores()->save($new_store);
            }
            $shopkey++;

        }
    }
}
