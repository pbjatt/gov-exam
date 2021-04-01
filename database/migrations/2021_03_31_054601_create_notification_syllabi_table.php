<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationSyllabiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_syllabi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examnotification_id');
            $table->foreign('examnotification_id')->references('id')->on('examnotifications');
            $table->unsignedBigInteger('syllabus_id');
            $table->foreign('syllabus_id')->references('id')->on('syllabi');
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
        Schema::dropIfExists('notification_syllabi');
    }
}
