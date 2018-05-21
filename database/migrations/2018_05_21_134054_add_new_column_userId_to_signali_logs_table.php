<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnUserIdToSignaliLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signali_logs', function (Blueprint $table) {
            //
            $table->string('userId', 10);
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
            //
            $table->string('userId', 10);
        });
    }
}
