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
      

  Schema::create('products', function (Blueprint $table) {
            $table->id();
                          $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');

            $table->string('product_name');
             $table->string('product_category');
            $table->decimal('product_qty', 8, 2)->default(0); // Used for both kg & pcs
  
            $table->enum('product_unit', ['kg', 'pcs']); 
    
            $table->enum('product_freshness',['fresh', 'frozen', 'day-old']);
            $table->decimal('product_price', 8, 2)->default(0); 

           $table->date('harvest_date')->nullable();
           $table->string('product_image');
           $table->boolean('deliver_availability')->default(true);
           $table->boolean('pick_up_availability')->default(true);

           
          $table->boolean('is_available')->default(true);
          $table->string('product_description')->nullable();
          $table->timestamps();





        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
