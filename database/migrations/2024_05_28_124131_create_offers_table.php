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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('slug')->nullable();

            $table->unsignedBigInteger('offer_category_id')->nullable();
            $table->foreign('offer_category_id')->references('id')->on('offer_categories')->onDelete('cascade');

            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('discount_percentage')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('offer_image')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
