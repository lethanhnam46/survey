<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrototypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prototype', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('survey_id')->unsigned();
            $table->string('prototype_name');
            $table->bigInteger('properties_id')->references('id')->on('properties');
            $table->tinyInteger('del_flag')->default(0);

            $table->foreign('survey_id')->references('id')->on('survey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prototype');
    }
}
