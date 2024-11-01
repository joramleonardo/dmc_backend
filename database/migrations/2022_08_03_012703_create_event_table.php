<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('speaker_id')->unsigned();
            // $table->foreign('speaker_id')->references('id')->on('speaker')->onDelete('cascade');
            $table->string('topic');
            $table->string('title');
            $table->date('eventDate');
            $table->string('eventPlace');
            $table->string('eventHost');
            $table->string('targetParticipants');
            $table->string('requested_initiated');
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
