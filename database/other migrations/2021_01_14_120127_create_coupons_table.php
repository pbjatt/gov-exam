<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->longText('termcondition')->nullable();
            $table->enum('discount_type',['percent','flat'])->default('percent');
            $table->string('discount')->nullable();
            $table->string('valid_from')->nullable();
            $table->string('valid_upto')->nullable();
            $table->enum('never_end',['0','1'])->default('0');
            $table->string('total_coupon')->nullable();
            $table->string('min_cart_amount')->nullable();
            $table->string('limit_user')->nullable();
            $table->string('limit_per_user')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
