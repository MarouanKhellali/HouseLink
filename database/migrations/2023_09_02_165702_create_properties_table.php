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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->string('images');
            $table->string('title');
            $table->text('description');
            $table->integer('bedrooms');
            $table->integer('property_type');
            $table->string('action_type');
            $table->string('city');
            $table->string('area');
            $table->boolean('is_active')->default(true);
            $table->double('rating')->default(0.0);
            $table->unsignedBigInteger('review_id')->nullable();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
