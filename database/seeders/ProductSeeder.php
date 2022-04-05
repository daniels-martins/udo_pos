<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use PhpParser\Node\Stmt\Foreach_;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $all_bosses = User::all();
        foreach ($all_bosses as $oga) {

            foreach ($oga->stores as $store) {

                $store->products()->attach([

                    'name' => $faker->unique()->text(13),
    
                    'price' =>$faker->randomNumber(3) * 5,
    
                    'low_stock_alert_qty' =>$faker->randomNumber(2),
    
                    'critical_stock_alert_qty' =>$faker->randomNumber(1),
    
                    'desc' =>$faker->realTextBetween(100),
    
                    // 'store_warehouse_id' =>$faker->randomNumber(1),
    
                    'tax_method' => 'inclusive',
    
                    'qty' => $faker->randomNumber(4),
    
                    // 'supplier' => ,
                    // we want a supplsupplier to be mapped to multiple products
                ]);
            }

           
        }
    }
}


 // $oga->stores->product()->create([

            //     'name' => $this->faker->unique()->text(13),

            //     'price' => $this->faker->randomNumber(3) * 5,

            //     'low_stock_alert_qty' => $this->faker->randomNumber(2),

            //     'critical_stock_alert_qty' => $this->faker->randomNumber(1),

            //     'desc' => $this->faker->realTextBetween(100),

            //     // 'store_warehouse_id' => $this->faker->randomNumber(1),

            //     'tax_method' => 'inclusive',

            //     'qty' => $this->faker->randomNumber(4),

            //     // 'supplier' => ,
            //     // we want a supplsupplier to be mapped to multiple products
            // ]);