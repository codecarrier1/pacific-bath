<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->unsignedBigInteger('installation_manager_id')->nullable();
            $table->unsignedBigInteger('director_of_ops_id')->nullable();
            $table->unsignedBigInteger('director_of_sales_id')->nullable();

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
        Schema::dropIfExists('locations');
    }
}
