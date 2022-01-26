<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('date');
            $table->integer('client_id')->unsigned();
            $table->integer('history_id')->unsigned();
        });

        Schema::table('events', function($table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('history_id')->references('id')->on('history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
