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
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->string('trans_id')->unique();
            $table->string('coupon')->nullable();
            $table->string('payment_method');
            $table->float('sub_total', 8, 2)->default(0);
            $table->float('delivery_charge', 8, 2)->default(0);
            $table->float('discount', 8, 2)->default(0);
            $table->float('discountable', 8, 2)->default(0);
            $table->float('payable', 8, 2)->default(0);
            $table->foreignId('deliver_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('payment', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->enum('status', ['Ordered', 'Delivered'])->default('Ordered');
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
