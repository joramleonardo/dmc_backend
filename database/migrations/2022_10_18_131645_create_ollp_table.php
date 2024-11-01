<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOllpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ollp', function (Blueprint $table) {
            $table->id();
            $table->date('startTime');
            $table->date('completionTime');
            $table->string('email');
            $table->string('name');
            $table->string('sex');
            $table->string('category');
            $table->string('comments');
            $table->string('howLikely');
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
        Schema::dropIfExists('ollp');
    }
}
