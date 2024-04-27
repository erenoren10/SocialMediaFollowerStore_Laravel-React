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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_category_id')->nullable();
            $table->string('product_title')->nullable();
            $table->string('product_desc1')->nullable();
            $table->string('product_desc2')->nullable();
            $table->string('product_desc3')->nullable();
            $table->string('product_desc4')->nullable();
            $table->string('product_desc5')->nullable();
            $table->string('product_desc6')->nullable();
            $table->string('product_desc7')->nullable();
            $table->string('product_desc8')->nullable();
            $table->decimal('product_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
