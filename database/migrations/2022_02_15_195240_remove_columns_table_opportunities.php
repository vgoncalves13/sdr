<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsTableOpportunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumns('opportunities',
            [
                'customer_base',
                'customer_competition',
                'lines',
                'current_product'
            ])) {
            Schema::table('opportunities', function (Blueprint $table) {
                $table->dropColumn( [
                    'customer_base',
                    'customer_competition',
                    'lines',
                    'current_product'
                ]);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->string('customer_base');
            $table->string('customer_competition');
            $table->string('lines');
            $table->string('current_product');
        });
    }
}
