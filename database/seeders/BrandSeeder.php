<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use App\Models\StoreWarehouse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allStores = StoreWarehouse::all();
        $allproducts_id  = Product::get('id');
        $allproducts  = Product::get();
        $all_bosses = User::all();
        $clients_id = Customer::get('id');
            
        // sweetest algo : let's attach products ramdomly to user
            // foreach ($users as $key => $boss) {
            //     $boss->products()->attach($allproducts_id->shuffle()->take(50));
            // }
        
        // sweetest algo : let's attach products ramdomly to stores
            // foreach ($allStores as $key => $store) {
            //     $store->products()->attach($allproducts_id->shuffle()->take(50));
            // }
            // sweetest algo : let's attach clients ramdomly to users
            // foreach ($all_bosses as $key => $boss) {
            //        $boss->clients()->saveMany($clients_id->shuffle()->take(5));
        // }

        // try code here
            // foreach ($all_bosses as $oga) {
            //     // dd($oga->stores()->first()->products);
            //     $oga->stores()->first()->products()->create([
            //         'name' => Factory::create()->unique()->text(13),
            //         'name' => 'zenwada',
            //         'price' => Factory::create()->randomNumber(3) * 5,
            //         'low_stock_alert_qty' => Factory::create()->randomNumber(2),
            //         'critical_stock_alert_qty' => Factory::create()->randomNumber(1),
            //         'desc' => Factory::create()->realTextBetween(100),
            //         'status' => 1,
            //         // 'store_warehouse_id' => Factory::create()->randomNumber(1),
            //         'tax_method' => 'inclusive',
            //         'qty' => Factory::create()->randomNumber(4),
            //         // 'supplier' => Factory::create()->userName(), 
            //         // we want a supplsupplierier to be mapped to multiple products
            //     ]);
            // }   
    }
}
