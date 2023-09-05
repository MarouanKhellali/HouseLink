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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->enum('type', ['company', 'Individual']);
            $table->string('card_id');
            $table->integer('phone');
            $table->string('city');
            $table->string('address');
            $table->string('commercial_register')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('accepted')->default(false);
            $table->double('rating')->default(0.0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
