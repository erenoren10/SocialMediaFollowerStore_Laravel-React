<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id("order_details_id");
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("product_id");
            $table->integer("quantity");
            $table->string("platform_username")->nullable();
            $table->string("adSoyad")->nullable();
            $table->string("mail")->nullable();
            $table->string("telefon")->nullable();
            $table->string("vergiNo")->nullable();
            $table->string("vergiDaire")->nullable();
            $table->string("FaturaAdresi")->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
