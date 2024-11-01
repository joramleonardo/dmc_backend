<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOllpQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ollp_quiz', function (Blueprint $table) {
            $table->id();
            $table->integer('ollp_id');
            $table->integer('quiz1');
            $table->integer('quiz2');
            $table->integer('quiz3');
            $table->integer('quiz4');
            $table->integer('quiz5');
            $table->integer('quiz6');
            $table->integer('quiz7');
            $table->integer('quiz8');
            $table->integer('quiz9');
            $table->integer('quiz10');
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
        Schema::dropIfExists('ollp_quiz');
    }
}
