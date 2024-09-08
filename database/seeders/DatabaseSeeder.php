<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory(10)->create();
        \App\Models\Customer::factory(10)->create();
        \App\Models\LaundryOwner::factory(5)->create();
        \App\Models\Order::factory(20)->create();
        \App\Models\LaundryItem::factory(50)->create();
        \App\Models\Delivery::factory(15)->create();
        \App\Models\Notification::factory(30)->create();
        \App\Models\Payment::factory(20)->create();
        \App\Models\Review::factory(10)->create();
        User::factory()->create([
            'name' => 'Ardana Yatra',
            'email' => 'imadeardanayatra@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
