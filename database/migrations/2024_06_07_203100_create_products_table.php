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
            $table->text('description');

            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('style_id');
            $table->unsignedBigInteger('shape_id');
            $table->unsignedBigInteger('brand_id');

            $table->foreign('origin_id')->references('id')->on('origins')->delete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->delete('cascade');
            $table->foreign('style_id')->references('id')->on('styles')->delete('cascade');
            $table->foreign('shape_id')->references('id')->on('shapes')->delete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->delete('cascade');

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
