<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header');
            $table->string('information', 1000);
            $table->integer('total_count');
            $table->integer('free_count');
            $table->double('cost', 8, 2);
            $table->dateTime('date_time_start');
            $table->dateTime('date_time_end');
            $table->string('url')->nullable();
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('address');
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
        Schema::dropIfExists('events');
    }
}
