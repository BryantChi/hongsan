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
            $table->text('pdf')->nullable()->after('operating_converter')->comment('產品PDF檔案');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_infos', function (Blueprint $table) {
            //
            $table->dropColumn('pdf');
        });
    }
};
