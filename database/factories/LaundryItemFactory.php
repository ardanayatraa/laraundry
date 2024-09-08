<?php

namespace Database\Factories;

use App\Models\LaundryItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class LaundryItemFactory extends Factory
{
    protected $model = LaundryItem::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'order_id' => \App\Models\Order::factory(),
            'item_type' => $this->faker->randomElement(['Shirt', 'Pants', 'Jacket', 'Blanket']),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price_per_item' => $this->faker->randomFloat(2, 5, 50),
            'subtotal' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['price_per_item'];
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
