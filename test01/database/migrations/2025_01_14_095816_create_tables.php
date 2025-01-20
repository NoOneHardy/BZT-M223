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
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->float('price');
            $table->string('fuel_type');
            $table->integer('color')->nullable();
            $table->string('type')->nullable();
            $table->float('tank')->nullable();
            $table->date('manufacturing_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_active')->default(true);
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name');
            $table->string('address')->nullable();
            $table->integer('zip')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_active')->default(true);
        });

        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('customer')->nullOnDelete();
            $table->foreignId('car_id')->nullable()->constrained('car')->nullOnDelete();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
        Schema::dropIfExists('car');
        Schema::dropIfExists('customer');
    }
};
