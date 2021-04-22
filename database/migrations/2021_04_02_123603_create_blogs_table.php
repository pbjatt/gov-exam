<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title', 255);
            $table->string('blog_slug', 255);
            $table->longText('blog_desc')->nullable();
            $table->longText('blog_short_desc')->nullable();
            $table->string('blog_image', 255);
            $table->string('blog_attachment')->nullable();
            $table->enum('post_type', ['blog'])->default('blog');
            $table->foreignId('category_id')->constrained('exam_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['pending', 'veified', 'rejected']);
            $table->string('blog_seotitle', 90)->nullable();
            $table->string('blog_seokeyword', 255)->nullable();
            $table->longText('blog_seodesc')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
