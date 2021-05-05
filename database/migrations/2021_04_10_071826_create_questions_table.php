<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->string('option_1', 255);
            $table->string('option_2', 255);
            $table->string('option_3', 255)->nullable();
            $table->string('option_4', 255)->nullable();
            $table->string('option_5', 255)->nullable();
            $table->string('slug', 255);
            $table->longText('description')->nullable();
            $table->foreignId('category_id')->constrained('exam_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('correct_answer', 255);
            $table->enum('difficulty', ['Easy', 'Medium', 'Hard']);
            $table->enum('status', ['Pending', 'Approved', 'Rejected']);
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
        Schema::dropIfExists('questions');
    }
}
