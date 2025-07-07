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
            $table->string('purchase_lease')->nullable()->after('product_categories_id')->comment('購買租賃');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_infos', function (Blueprint $table) {
            //
            $table->dropColumn('purchase_lease');
        });
    }
};
