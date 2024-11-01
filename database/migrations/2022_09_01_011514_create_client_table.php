<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('clientType');
            $table->string('profType');
            $table->string('yearLevel');
            $table->string('schoolCategory');
            $table->string('sex');
            $table->string('ageRange');
            $table->string('office_school');
            $table->date('dateVisited');
            $table->time('timeIn');
            $table->time('timeOut');
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
        Schema::dropIfExists('client');
    }
}
