<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examnotification_id');
            $table->foreign('examnotification_id')->references('id')->on('examnotifications');
            $table->unsignedBigInteger('info_type_id');
            $table->foreign('info_type_id')->references('id')->on('info_types');
            $table->string('image')->nullable();
            $table->string('attachment')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('notification_infos');
    }
}
