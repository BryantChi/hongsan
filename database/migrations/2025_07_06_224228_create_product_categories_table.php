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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_categories_info_id')
                ->nullable()
                ->constrained('application_categories_infos')
                ->nullOnDelete();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_category_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unsignedBigInteger('product_categories_id');
            $table->string('name');

            $table->unique(['product_categories_id', 'locale'], 'prod_cat_trans_unique');
            $table->foreign('product_categories_id')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category_translations');
        Schema::dropIfExists('product_categories');
    }
};
