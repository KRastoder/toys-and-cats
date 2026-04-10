<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctor_procedures', function (Blueprint $table) {
            $table->id();

            $table->foreignId('doctor_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name'); //  "Teeth Cleaning", "Checkup"

            $table->text('description')->nullable();

            $table->unsignedInteger('price');

            $table->unsignedSmallInteger('duration_minutes')->default(30);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(['doctor_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor_procedures');
    }
};
