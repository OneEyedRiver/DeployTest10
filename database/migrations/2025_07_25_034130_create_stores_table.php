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
        
  Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('store_name');
            $table->unsignedBigInteger('seller_id');
            $table->string('phone_number')->nullable();
            $table->string('store_address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('state');
            $table->string('email')->unique();

            // New fields for geolocation and status
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->boolean('is_approved')->default(false);
            $table->boolean('store_open')->default(true);

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('seller_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
