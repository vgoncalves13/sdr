<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnValueOpServTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunity_service', function (Blueprint $table) {
            $table->decimal('value',10)->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumns('opportunity_service', ['value'])) {
            Schema::table('opportunity_service', function (Blueprint $table) {
                $table->dropColumn(['value']);
            });
        }
    }
}
