<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamreleteddatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examreleteddates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examnotification_id');
            $table->foreign('examnotification_id')->references('id')->on('examnotifications');
            $table->date('form_start_date')->nullable();
            $table->date('form_end_date')->nullable();
            $table->date('exam_date')->nullable();
            $table->date('vacancy_date')->nullable();
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
        Schema::dropIfExists('examreleteddates');
    }
}
