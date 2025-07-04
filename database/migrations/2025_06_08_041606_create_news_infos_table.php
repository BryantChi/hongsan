<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsInfosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 主表 - 存放非語系相關資料
        Schema::create('news_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cover_front_image')->nullable()->comment('封面圖');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // 翻譯表 - 存放多語系資料
        Schema::create('news_info_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('news_info_id')->comment('關聯主表ID');
            $table->string('locale')->index()->comment('語系代碼');
            $table->string('title')->comment('標題');
            $table->longText('content')->nullable()->comment('內容');

            // 外鍵約束
            $table->unique(['news_info_id', 'locale']);
            $table->foreign('news_info_id')->references('id')->on('news_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_info_translations');
        Schema::drop('news_infos');
    }
}
