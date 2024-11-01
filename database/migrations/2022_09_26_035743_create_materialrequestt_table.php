<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialrequesttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialrequestt', function (Blueprint $table) {
            $table->id();
            $table->string('assistedBy');
            $table->string('clientType');
            $table->integer('responsiveness');
            $table->integer('reliability');
            $table->integer('accessAndFacilities');
            $table->integer('communication');
            $table->integer('costs');
            $table->integer('integrity');
            $table->integer('assurance');
            $table->integer('outcome');
            $table->string('sex');
            $table->string('category');
            $table->string('ageBracket');
            $table->string('region');
            $table->string('researchInterests');
            $table->string('topic');
            $table->string('suggestion');
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
        Schema::dropIfExists('materialrequestt');
    }
}
