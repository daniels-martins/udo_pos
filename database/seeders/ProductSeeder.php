<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $all_bosses = User::all();
     foreach ($all_bosses as $oga) {
         $oga->stores->product()->create([
                'name' => $this->faker->unique()->text(13),
                'price' => $this->faker->randomNumber(3) * 5,
                'low_stock_alert_qty' => $this->faker->randomNumber(2),
                'critical_stock_alert_qty' => $this->faker->randomNumber(1),
                'desc' => $this->faker->realTextBetween(100),
                // 'store_warehouse_id' => $this->faker->randomNumber(1),
                'tax_method' => 'inclusive',
                'qty' => $this->faker->randomNumber(4),
            // 'supplier' => $this->faker->userName(), 
            // we want a supplsupplierier to be mapped to multiple products
            
         ]);
     }   

            'name' => ,
            'price' => ,
            'low_stock_alert_qty' => ,
            'critical_stock_alert_qty' => ,
            'desc' => ,
            // 'store_warehouse_id' => ,
            'tax_method' => 'inclusive',
            'qty' => ,
            // 'supplier' => ,
            // we want a supplsupplierier to be mapped to multiple products

        //
    }
}
