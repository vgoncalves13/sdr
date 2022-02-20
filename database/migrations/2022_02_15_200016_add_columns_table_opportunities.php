<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsTableOpportunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->string('contact_tel')->after('contact_name');
            $table->string('contact_email')->after('contact_tel');
            $table->integer('temperature')->after('contact_email');
            $table->foreignId('user_id')->after('temperature')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumns('opportunities', ['contact_tel', 'contact_email'])) {
            Schema::table('opportunities', function (Blueprint $table) {
                $table->dropColumn(['contact_tel', 'contact_email','temperature']);
                $table->dropConstrainedForeignId('user_id');
            });
        }
    }
}
