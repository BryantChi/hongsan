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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('聯絡人姓名');
            $table->string('machine_type')->nullable()->comment('車型');
            $table->string('phone')->nullable()->comment('聯絡電話');
            $table->string('email')->nullable()->comment('聯絡電子郵件');
            $table->string('location')->nullable()->comment('聯絡地址');
            $table->string('country')->nullable()->default('台灣');
            $table->text('message')->nullable()->comment('聯絡訊息');
            $table->timestamps();
            $table->softDeletes()->comment('軟刪除時間戳記');
            $table->comment('聯絡資訊表，存儲用戶提交的聯絡表單數據');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_infos');
    }
};
