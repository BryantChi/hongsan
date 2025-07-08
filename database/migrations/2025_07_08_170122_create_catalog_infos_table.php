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
        Schema::create('catalog_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('型錄表單姓名');
            $table->string('phone')->nullable()->comment('型錄表單聯絡電話');
            $table->string('loaction')->nullable()->comment('型錄表單所在縣市');
            $table->bigInteger('product_id')->unsigned()->nullable()->comment('型錄表單產品ID');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->references('id')->on('products_infos')->onDelete('set null')->comment('外鍵，指向產品表的ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_infos');
    }
};
