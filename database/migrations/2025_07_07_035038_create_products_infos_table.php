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
        Schema::create('products_infos', function (Blueprint $table) {
            $table->id();
            // 移除需要翻譯的欄位: name, piping, glue_block, introduction
            $table->unsignedBigInteger('application_categories_info_id');
            $table->unsignedBigInteger('brands_info_id');
            $table->unsignedBigInteger('product_categories_id');
            $table->string('version')->nullable()->comment('機型版本');
            $table->boolean('quick_bucket_changer')->nullable()->comment('快速換斗器');
            $table->boolean('operating_converter')->nullable()->comment('操作轉換器');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('application_categories_info_id')->references('id')->on('application_categories_infos');
            $table->foreign('brands_info_id')->references('id')->on('brands_infos');
            $table->foreign('product_categories_id')->references('id')->on('product_categories');
        });

        // 多國言支援
        Schema::create('products_info_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_info_id');
            $table->string('locale')->index();

            // 需要翻譯的欄位
            $table->string('name')->nullable()->comment('產品名稱');
            $table->text('piping')->nullable()->comment('配管');
            $table->text('glue_block')->nullable()->comment('膠塊');
            $table->longText('introduction')->nullable()->comment('產品詳細介紹');

            $table->timestamps();

            $table->unique(['products_info_id', 'locale'], 'prod_info_trans_unique');
            $table->foreign('products_info_id')->references('id')->on('products_infos')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_info_translations');
        Schema::dropIfExists('products_infos');
    }
};
