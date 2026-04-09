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
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();

            $table->date('date')->unique();

            $table->unsignedInteger('orders_count')->default(0);
            $table->unsignedInteger('bookings_count')->default(0);

            $table->unsignedInteger('orders_revenue')->default(0);
            $table->unsignedInteger('bookings_revenue')->default(0);

            $table->unsignedInteger('total_revenue')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_reports');
    }
};
