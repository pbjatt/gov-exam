<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamnotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examnotifications', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->string('url')->nullable();
            $table->string('posts')->nullable();
            $table->date('date')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->date('form_start_date')->nullable();
            $table->date('form_end_date')->nullable();
            $table->date('exam_date')->nullable();
            $table->date('vacancy_date')->nullable();
            $table->enum('type', ['true', 'false'])->default('true');
            $table->enum('visiable', ['true', 'false'])->default('true');
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
        Schema::dropIfExists('examnotifications');
    }
}
