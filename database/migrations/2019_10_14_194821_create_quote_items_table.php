<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_items', function (Blueprint $table) {
            // The quote ID is the only foreign key because this table needs
            // to store historical data that will be retained even if
            // the parent key object is deleted.
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quote_id');
            $table->foreign('quote_id')->references('id')->on('quotes');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('product_sub_category_id')->nullable();
            $table->integer('quantity');
            $table->string('sku');
            $table->decimal('price');
            $table->json('options');

            // Helpers for front-end
            $table->string('category_name')->nullable();
            $table->string('sub_category_name')->nullable();
            $table->string('plumbing_position')->nullable();
            $table->decimal('width')->nullable();
            $table->decimal('depth')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('tub_color_id')->nullable();
            $table->integer('drain_color_id')->nullable();
            $table->integer('fixture_color_id')->nullable();
            $table->integer('glass_color_id')->nullable();
            $table->integer('pan_color_id')->nullable();
            $table->string('door_type')->nullable();
            $table->string('wall_kit_available')->nullable();

            // Timestamps
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
        Schema::dropIfExists('quote_items');
    }
}
