<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventChannelPivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_channel', function (Blueprint $table) {
            // $table->foreignId('events_id')->references('id')->on('events')->cascadeOnDelete();
            // $table->foreignId('channels_id')->references('id')->on('channels')->cascadeOnDelete();

            $table->integer('events_id');
            $table->integer('channels_id');
            $table->primary(['events_id', 'channels_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_channel');
    }
}
