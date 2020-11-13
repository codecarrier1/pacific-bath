<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('service_id');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->foreign('service_id')->references('id')->on('services');
            $table->integer('order_column')->nullable();
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
        Schema::dropIfExists('product_category_service');
    }
}
