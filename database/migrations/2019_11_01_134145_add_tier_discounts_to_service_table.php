<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddTierDiscountsToServiceTable
 */
class AddTierDiscountsToServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->integer('tier_1')->nullable()->after('description');
            $table->integer('tier_2')->nullable()->after('description');
            $table->integer('tier_3')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['tier_1', 'tier_2', 'tier_3']);
        });
    }
}
