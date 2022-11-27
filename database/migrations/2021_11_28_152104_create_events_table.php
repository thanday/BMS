<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('event_name');
            $table->string('refnum');
            $table->string('venue')->nullable();
            $table->enum('type', ['Live', 'Recording', 'Live Link only'])->nullable();
            $table->string('qouted_type')->nullable();
            $table->string('client')->nullable();
            $table->string('focalname')->nullable();
            $table->integer('focalnum')->nullable();
            $table->date('requestdate')->nullable();
            $table->date('event_date')->nullable();
            $table->time('event_stime')->nullable();
            $table->time('event_etime')->nullable();
            $table->unsignedBigInteger('psmchannel_id')->nullable();
            $table->foreign('psmchannel_id')->references('id')->on('channels')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('localchannel_id')->nullable();
            $table->foreign('localchannel_id')->references('id')->on('channels')->onDelete('restrict')->onUpdate('cascade');
            $table->string('local_qtype')->nullable();

            $table->unsignedBigInteger('techs_id')->nullable();
            $table->foreign('techs_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->date('live_set_date')->nullable();
            $table->time('live_set_time')->nullable();
            $table->string('link_medium')->nullable();
            $table->unsignedBigInteger('techl_id')->nullable();
            $table->foreign('techl_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->date('live_attend_date')->nullable();
            $table->time('live_attend_time')->nullable();

            $table->time('live_start_time')->nullable();
            $table->time('live_end_time')->nullable();
            $table->unsignedBigInteger('sincharge_id')->nullable();
            $table->foreign('sincharge_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('feed_tested_user_id')->nullable();
            $table->foreign('feed_tested_user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
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
