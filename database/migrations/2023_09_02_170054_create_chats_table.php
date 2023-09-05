<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_chats_table.php

public function up()
{
    Schema::create('chats', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('buyer_id');
        $table->unsignedBigInteger('seller_id');
        $table->boolean('hasfile')->default(false);
        $table->string('file')->nullable();
        $table->boolean('seen')->default(false);
        $table->timestamps();

        $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('cascade');
        $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
