<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddSalesDocumentServiceTable
 */
class AddSalesDocumentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_document_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_id')
                ->unsigned();
            $table->integer('sales_document_id')
                ->unsigned();
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
        Schema::dropIfExists('sales_document_service');
    }
}
