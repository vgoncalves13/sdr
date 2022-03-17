<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectorIdFieldTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->foreignId('sector_id')->after('description')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumns('teams', ['sector_id'])) {
            Schema::table('teams', function (Blueprint $table) {
                $table->dropColumn(['sector_id']);
                $table->dropConstrainedForeignId('sector_id');
            });
        }
    }
}
