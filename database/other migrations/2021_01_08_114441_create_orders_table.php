<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('billingAddress_id')->nullable();
            $table->foreign('billingAddress_id')->references('id')->on('addresses');
            $table->string('shipping_name')->nullable();
            $table->string('shipping_mobile')->nullable();
            $table->string('shipping_email')->nullable();
            $table->unsignedBigInteger('shippingAddress_id')->nullable();
            $table->foreign('shippingAddress_id')->references('id')->on('addresses');
            $table->enum('payment_type',['COD','Online'])->default('COD');
            $table->enum('payment_status',['Paid','Due'])->default('Due');
            $table->enum('status',['inqueue','accepted','preparing','on the way','delivered','canceled'])->default('inqueue');
            // $table->string('total_amount')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('discount')->nullable();
            $table->string('txn_id')->nullable();
            $table->longText('notes')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
