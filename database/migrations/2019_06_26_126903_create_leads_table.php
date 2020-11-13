<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('salesforce_appointment_id');
            $table->string('salesforce_prospect_id');
            $table->string('salesforce_lead_source')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('email')->nullable();
            $table->unsignedInteger('amount')->nullable();
            $table->dateTime('appointment_time');
            $table->unsignedBigInteger('processor_id')->nullable();
            $table->foreign('processor_id')->references('id')->on('users');
            $table->unsignedBigInteger('sales_disposition_id');
            $table->foreign('sales_disposition_id')->references('id')->on('sales_dispositions');
            $table->unsignedBigInteger('processor_status_id')->nullable();
            $table->foreign('processor_status_id')->references('id')->on('processor_statuses');
            $table->unsignedBigInteger('installation_status_id')->nullable();
            $table->foreign('installation_status_id')->references('id')->on('installation_statuses');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('is_acknowledged')->default(false);
            $table->unsignedBigInteger('conversion_type_id')->nullable();
            $table->foreign('conversion_type_id')->references('id')->on('conversion_types');
            $table->unsignedBigInteger('property_type_id')->nullable();
            $table->foreign('property_type_id')->references('id')->on('property_types');
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
        Schema::dropIfExists('leads');
    }
}
