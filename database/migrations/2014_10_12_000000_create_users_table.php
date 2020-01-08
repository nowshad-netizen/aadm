<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->default('3');
            $table->string('bname');
            $table->string('username')->unique();
            $table->string('image')->default('avater.png');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('dob');
            $table->string('religion');
            $table->string('blood')->nullable();
            $table->string('passed');
            $table->string('hon_session')->nullable();
            $table->string('masters_session')->nullable();
            $table->string('about_job')->nullable();
            $table->string('number');
            $table->string('fblink');
            $table->string('spous_name')->nullable();
            $table->string('occupation')->nullable();
            $table->string('number_of_kids')->nullable();
            $table->text('interest')->nullable();
            $table->string('fee_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('payment_date')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
