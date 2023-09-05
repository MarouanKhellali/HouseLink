<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_orders_table.php

public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('buyer_id');
        $table->unsignedBigInteger('seller_id');
        $table->unsignedBigInteger('property_id');
        $table->boolean('is_accepted')->default(false);
        $table->timestamps();

        $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('cascade');
        $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
        $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
