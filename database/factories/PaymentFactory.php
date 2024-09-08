<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;
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
            'payment_method' => $this->faker->randomElement(['cash', 'transfer', 'e-wallet']),
            'payment_amount' => $this->faker->randomFloat(2, 10, 500),
            'payment_date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
