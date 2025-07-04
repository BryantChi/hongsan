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
        Schema::create('translations_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key', 255)->unique()->comment('翻譯鍵，使用小寫英文，不含數字和特殊符號');
            $table->json('translations');
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
        Schema::dropIfExists('translations_infos');
    }
};
