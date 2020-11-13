<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDocumentSignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_document_signers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lead_id');
            $table->unsignedBigInteger('quote_id');
            $table->unsignedBigInteger('sales_document_id');
            $table->string('template_id')->nullable();
            $table->text('document_type')->nullable();
            $table->string('email')->nullable();
            $table->string('signature_id')->nullable();
            $table->boolean('is_signed')->default(false);
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
        Schema::dropIfExists('sales_document_signers');
    }
}
