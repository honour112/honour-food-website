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
            $table->string('customer_name');
            $table->string('phone');
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('payment_method');
            $table->enum('ordertype', ['delivery', 'inhouse'])->default('delivery');
            $table->decimal('total', 10, 2);
            $table->enum('order_status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            
            // New column to assign delivery agent
            $table->unsignedBigInteger('delivery_agent_id')->nullable();
            $table->foreign('delivery_agent_id')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['delivery_agent_id']);
            $table->dropColumn('delivery_agent_id');
        });

        Schema::dropIfExists('orders');
    }
};
