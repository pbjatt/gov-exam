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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at');
            $table->string('otp_token');
            $table->string('password');
            $table->boolean('verified')->default(0);
            $table->enum('mobile_verify', ['true', 'false'])->default('false');
            $table->string('otp')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->enum('device_type', ['ios', 'android'])->nullable();
            $table->string('device_id')->nullable();
            $table->string('fcm_id')->nullable();
            $table->string('accept_code')->nullable();
            $table->string('referal_code')->nullable();
            $table->enum('termcondition', ['true', 'false'])->default('true');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
