<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearcherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchers', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('employee_id')->unsigned();
            // $table->id('employee_id');
            $table->string('name');
            $table->string('sex');
            $table->string('location');
            $table->string('countryName');
            $table->string('affiliation');
            $table->string('affiliationType');
            $table->string('otherAffiliationType');
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
        Schema::dropIfExists('researchers');
    }
}
