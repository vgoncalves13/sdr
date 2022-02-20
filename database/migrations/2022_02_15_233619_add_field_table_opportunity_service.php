<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldTableOpportunityService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunity_service', function (Blueprint $table) {
            $table->integer('quantity')->after('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumns('opportunity_service', ['quantity'])) {
            Schema::table('opportunity_service', function (Blueprint $table) {
                $table->dropColumn(['quantity']);
            });
        }
    }
}
