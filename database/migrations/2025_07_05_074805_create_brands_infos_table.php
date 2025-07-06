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
        Schema::create('brands_infos', function (Blueprint $table) {
            $table->id();
            // foreign key to application_categories_infos
            $table->foreignId('application_categories_info_id')
                ->nullable()
                ->constrained('application_categories_infos')
                ->nullOnDelete();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('brands_info_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unsignedBigInteger('brands_info_id');
            $table->string('name');

            $table->unique(['brands_info_id', 'locale']);
            $table->foreign('brands_info_id')->references('id')->on('brands_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands_info_translations');
        Schema::dropIfExists('brands_infos');
    }
};
