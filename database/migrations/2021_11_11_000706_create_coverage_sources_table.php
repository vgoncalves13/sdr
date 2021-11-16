<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverageSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coverage_sources', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');
            $table->string('postal_code_field');
            $table->string('number_field');
            $table->unsignedBigInteger('carrier_id');
            $table->foreign('carrier_id')->references('id')->on('carriers')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('coverage_sources');
    }
}
