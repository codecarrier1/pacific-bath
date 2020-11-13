<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('opening_width')->nullable();
            $table->decimal('tub_width')->nullable();
            $table->decimal('right_side_wall')->nullable();
            $table->decimal('right_surround_width')->nullable();
            $table->decimal('room_height')->nullable();
            $table->decimal('left_side_wall')->nullable();
            $table->decimal('left_surround_width')->nullable();
            $table->decimal('ceiling_panel')->nullable();
            $table->decimal('soffit')->nullable();
            $table->decimal('pan_width')->nullable();
            $table->decimal('pan_height')->nullable();
            $table->unsignedBigInteger('lead_id');
            $table->foreign('lead_id')->references('id')->on('leads');
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
        Schema::dropIfExists('measurements');
    }
}
