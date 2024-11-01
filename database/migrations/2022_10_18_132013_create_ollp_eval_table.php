<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOllpEvalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ollp_eval', function (Blueprint $table) {
            $table->id();
            $table->integer('ollp_id');
            $table->integer('eval1');
            $table->integer('eval2');
            $table->integer('eval3');
            $table->integer('eval4');
            $table->integer('eval5');
            $table->integer('eval6');
            $table->integer('eval7');
            $table->integer('eval8');
            $table->integer('eval9');
            $table->integer('eval10');
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
        Schema::dropIfExists('ollp_eval');
    }
}
