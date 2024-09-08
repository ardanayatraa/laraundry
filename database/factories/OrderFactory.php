<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'customer_id' => \App\Models\Customer::factory(),
            'laundry_owner_id' => \App\Models\LaundryOwner::factory(),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'total_price' => $this->faker->randomFloat(2, 10, 100),
            'order_number'=>$this->faker->unique()->randomNumber(),
            'total_weight'=>$this->faker->randomFloat(2, 10, 100),
            'pickup_date'=>$this->faker->date(),
            'payment_status'=>$this->faker->randomElement(['pending', 'completed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
