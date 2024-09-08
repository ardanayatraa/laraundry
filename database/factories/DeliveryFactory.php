<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'order_id' => Order::factory(), // Relasi ke tabel Order
            'delivery_status' => $this->faker->randomElement(['pending', 'on_the_way', 'delivered']),
            'courier_name' => $this->faker->name(),
            'courier_phone' => $this->faker->phoneNumber(),
            'pickup_address' => $this->faker->address(),
            'delivery_address' => $this->faker->address(),
            'estimated_delivery_time' => $this->faker->dateTimeBetween('+1 days', '+5 days'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
