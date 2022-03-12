<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->text(13),
            'price' => $this->faker->randomNumber(3)*5 ,
            'low_stock_alert_qty' => $this->faker->randomNumber(2),
            'critical_stock_alert_qty' => $this->faker->randomNumber(1),
            'desc' => $this->faker->realTextBetween(100),
            // 'store_warehouse_id' => $this->faker->randomNumber(1),
            'tax_method' => 'inclusive',
            'qty' => $this->faker->randomNumber(4),
            // 'supplier' => $this->faker->userName(), 
            // we want a supplsupplierier to be mapped to multiple products
        ];
    }
}
