<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManuscriptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuscripts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('researcher_id')->unsigned();
            $table->foreign('researcher_id')->references('id')->on('researchers')->onDelete('cascade');
            $table->string('title');
            $table->string('area');
            $table->string('location');
            $table->string('discipline');
            $table->string('otherDiscipline');
            $table->date('dateReceived');
            $table->string('status');
            $table->integer('issueNo');
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
        Schema::dropIfExists('manuscripts');
    }
}
