<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products_infos', function (Blueprint $table) {
            // 先移除外鍵約束
            $table->dropForeign(['product_categories_id']);

            // 再移除欄位
            $table->dropColumn('product_categories_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_infos', function (Blueprint $table) {
            // 恢復欄位
            $table->unsignedBigInteger('product_categories_id')->after('brands_info_id')->nullable();

            // 恢復外鍵約束
            $table->foreign('product_categories_id')->references('id')->on('product_categories');
        });
    }
};
