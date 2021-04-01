<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products'); 
            $table->unsignedBigInteger('shop_id')->nullable();           
            $table->foreign('shop_id')->references('id')->on('shops');   
            $table->unsignedBigInteger('color_id')->nullable();         
            $table->foreign('color_id')->references('id')->on('colors');
            $table->unsignedBigInteger('size_id')->nullable();            
            $table->foreign('size_id')->references('id')->on('sizes'); 
            $table->unsignedBigInteger('image_id')->nullable();           
            $table->foreign('image_id')->references('id')->on('media');            
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
        Schema::dropIfExists('product_images');
    }
}
