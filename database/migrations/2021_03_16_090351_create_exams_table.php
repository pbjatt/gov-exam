<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('visiable', ['true', 'false'])->default('true');
            $table->enum('post_type', ['exam', 'notification'])->default('exam');
            $table->string('age')->nullable();
            $table->string('category_id')->nullable();
            $table->string('qualification')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamp('exam_date')->nullable();
            $table->longText('description')->nullable();
            $table->string('seo_title', 90)->nullable();
            $table->string('seo_keywords', 255)->nullable();
            $table->longText('seo_description')->nullable();
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
        Schema::dropIfExists('exams');
    }
}
