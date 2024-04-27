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
        Schema::create('support_request_details', function (Blueprint $table) {
            $table->id("support_request_details_id");
            $table->unsignedBigInteger("request_id");
            $table->string("messages");
            $table->string("alici")->nullable();
            $table->string("gonderen")->nullable();
            $table->timestamps();
            $table->foreign('request_id')->references('request_id')->on('support_requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_request_details');
    }
};
