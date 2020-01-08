<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('member_type');
            $table->string('name');
            $table->string('session');
            $table->string('study');
            $table->string('mobile');
            $table->string('email');
            $table->string('payment_type')->nullable();
            $table->string('payment_number')->nullable();
            $table->string('txid')->nullable();
            $table->string('payment_time')->nullable();
            $table->string('payment_Fee')->nullable();
            $table->string('spouse')->nullable();
            $table->string('kids')->nullable();
            $table->string('tshart_size_spouse')->nullable();
            $table->string('tshart_size')->nullable();
            $table->string('Comment')->nullable();
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
        Schema::dropIfExists('reunions');
    }
}
