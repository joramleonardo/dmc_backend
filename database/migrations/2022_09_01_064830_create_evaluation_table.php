<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_ID')->unsigned();
            $table->date('transactionDate');
            $table->string('eval_1');
            $table->string('eval_2');
            $table->string('eval_3');
            $table->string('eval_4');
            $table->string('materialNotFound');
            $table->string('suggestions');
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
        Schema::dropIfExists('evaluation');
    }
}
