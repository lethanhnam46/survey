<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrototypePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prototypes_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('prototype_id')->unsigned()->index();
            $table->foreign('prototype_id')->references('id')->on('prototypes')->onDelete('cascade');
            $table->bigInteger('properties_id')->unsigned()->index();
            $table->foreign('properties_id')->references('id')->on('properties')->onDelete('cascade');
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
        Schema::dropIfExists('prototypes_properties');
    }
}
