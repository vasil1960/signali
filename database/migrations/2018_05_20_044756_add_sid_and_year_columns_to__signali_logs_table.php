<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSidAndYearColumnsToSignaliLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signali_logs', function (Blueprint $table) {
            $table->string('sid', 50);
            $table->string('selyear', 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signali_logs', function (Blueprint $table) {
            $table->string('sid', 50);
            $table->string('selyear', 4);
        });
    }
}
