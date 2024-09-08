<?php

namespace Database\Factories;

use App\Models\LaundryOwner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaundryOwner>
 */
class LaundryOwnerFactory extends Factory
{
    protected $model = LaundryOwner::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'user_id' => \App\Models\User::factory(),
            'laundry_name' => $this->faker->company,
            'laundry_address' => $this->faker->address,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
