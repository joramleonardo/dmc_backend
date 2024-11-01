<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequesttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestt', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_ID')->unsigned();
            $table->date('transactionDate');
            $table->string('status');
            $table->string('callNumber');
            $table->string('source');
            $table->string('title');
            $table->string('volIssueNo');
            $table->string('numPages');
            $table->time('timeIssued');
            $table->time('timeReceived');
            $table->time('timeReturned');
            $table->string('remarks');
            $table->string('assiswtedBy');
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
        Schema::dropIfExists('requestt');
    }
}
