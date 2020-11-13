<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePaymentsTable
 */
class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lead_id');
            $table->unsignedBigInteger('quote_id');
            $table->string('type')->nullable(); // We allow nullable as the user may fill out final before type
            $table->string('final_type')->nullable(); // We allow nullable as the user may fill out type before final
            $table->decimal('deposit')->nullable();
            $table->decimal('discounted_total')->nullable();
            $table->decimal('total')->nullable();
            $table->json('details')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
