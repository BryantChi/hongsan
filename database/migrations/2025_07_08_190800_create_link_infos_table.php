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
        Schema::create('link_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('友情連結名稱');
            $table->text('url')->nullable()->comment('友情連結 URL');
            $table->longText('image')->nullable()->comment('友情連結圖片路徑');
            $table->integer('sort_order')->default(0)->comment('排序，數字越小越靠前');
            $table->boolean('status')->default(0)->comment('是否啟用');
            $table->timestamps();
            $table->softDeletes()->comment('軟刪除時間戳記');
            $table->unique(['name', 'url'], 'link_info_unique_name_url')->comment('友情連結名稱和 URL 唯一索引');
            $table->index('sort_order', 'link_info_sort_order_index')->comment('排序索引');
            $table->index('status', 'link_info_status_index')->comment('狀態索引');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('link_infos');
    }
};
