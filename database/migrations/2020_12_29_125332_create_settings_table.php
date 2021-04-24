<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191)->nullable();
            $table->string('tagline', 191)->nullable();
            $table->string('mobile', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('logo', 191)->nullable();
            $table->string('favicon', 191)->nullable();
            $table->string('home_seo_title', 90)->nullable();
            $table->string('home_seo_keywords', 255)->nullable();
            $table->longText('home_seo_description')->nullable();
            $table->string('exam_seo_title', 90)->nullable();
            $table->string('exam_seo_keywords', 255)->nullable();
            $table->longText('exam_seo_description')->nullable();
            $table->string('ca_seo_title', 90)->nullable();
            $table->string('ca_seo_keywords', 255)->nullable();
            $table->longText('ca_seo_description')->nullable();
            $table->string('notification_seo_title', 90)->nullable();
            $table->string('notification_seo_keywords', 255)->nullable();
            $table->longText('notification_seo_description')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
