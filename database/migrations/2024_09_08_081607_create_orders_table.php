<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->uuid('laundry_owner_id');
            $table->string('order_number')->unique();
            $table->decimal('total_weight', 8, 2);
            $table->string('status'); // pending, in_process, completed, delivered, canceled
            $table->date('pickup_date');
            $table->date('delivery_date')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->string('payment_status'); // paid, unpaid, partially_paid
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
