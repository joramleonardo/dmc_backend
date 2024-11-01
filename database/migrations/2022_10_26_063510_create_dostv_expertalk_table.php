<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDostvExpertalkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dostv_expertalk', function (Blueprint $table) {
            $table->id();
            $table->date('dateAired');
            $table->string('topic');
            $table->string('description');
            $table->string('links');
            $table->string('socAgenda');
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
        Schema::dropIfExists('dostv_expertalk');
    }
}
