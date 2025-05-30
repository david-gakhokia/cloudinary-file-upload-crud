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
            $table->string('name');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('rank')->default(0);
            $table->decimal('price', 10, 2);
            $table->integer('sku')->unique();
            $table->integer('quantity')->default(0);
            $table->text('description')->nullable();
            $table->string('image_filename')->nullable();
            $table->string('image_url')->nullable();
            $table->string('public_id')->nullable();
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
