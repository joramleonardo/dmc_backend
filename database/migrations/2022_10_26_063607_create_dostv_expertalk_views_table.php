<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDostvExpertalkViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dostv_expertalk_views', function (Blueprint $table) {
            $table->id();
            $table->integer('expertalk_id');
            $table->integer('reach');
            $table->integer('views');
            $table->integer('engagement');
            $table->string('platform');
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
        Schema::dropIfExists('dostv_expertalk_views');
    }
}
