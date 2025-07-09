<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->text('link')->nullable()->comment('連結');
            $table->boolean('status')->nullable()->default(0); // 狀態
            $table->integer('sort_order')->nullable()->default(0)->comment('排序');
            $table->timestamps();
        });

        Schema::create('hero_slide_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hero_slide_id');
            $table->string('locale')->index();
            $table->string('title')->nullable()->comment('標題');
            $table->text('image_624')->nullable()->comment('圖片');
            $table->text('image_1024')->nullable()->comment('圖片');
            $table->text('image_1280')->nullable()->comment('圖片');
            $table->text('image_1920')->nullable()->comment('圖片');
            $table->unique(['hero_slide_id', 'locale']);
            $table->foreign('hero_slide_id')->references('id')->on('hero_slides')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hero_slide_translations');
        Schema::dropIfExists('hero_slides');
    }
};
