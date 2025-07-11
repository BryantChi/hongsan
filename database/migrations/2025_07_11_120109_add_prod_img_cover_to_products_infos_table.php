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
            //
            $table->longText('prod_img_cover')->nullable()->after('id')->comment('產品封面圖片');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_infos', function (Blueprint $table) {
            //
            $table->dropColumn('prod_img_cover');
        });
    }
};
