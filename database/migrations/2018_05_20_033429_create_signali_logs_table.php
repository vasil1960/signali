<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignaliLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signali_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('action');
            $table->string('username', 50);
            $table->string('ip', 30);
            $table->string('name', 100);
            $table->string('podelenie', 100);
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
        Schema::drop('signali_logs');
    }
}
