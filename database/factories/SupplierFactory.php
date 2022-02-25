<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'billing_address' => $this->faker->unique()->streetAddress(),
            'shipping_address' => $this->faker->unique()->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'store' => $this->faker->randomNumber(1),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            
        ];
    }
}
