<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateFinancingOptionsTable
 */
class CreateFinancingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financing_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('default_monthly_payment_factor', 11, 10)->nullable();
            $table->decimal('default_interest_rate')->nullable();
            $table->integer('number_of_months')->nullable();
            $table->string('institution');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('financing_options');
    }
}
