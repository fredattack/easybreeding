<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *todo updates all migrations
     * @return void
     */
    public function up()
    {
        Schema::create('CustomSpecies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idReferedSpecies')->nullable();
            $table->string('commonName')->nullable();
            $table->string('scientificName')->nullable();
            $table->integer('id_famillie')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->integer('incubation')->nullable();
            $table->integer('fertilityControl')->nullable();
            $table->timestamp('girdleDate')->nullable();
            $table->integer('outOfNest')->nullable();
            $table->integer('weaning')->nullable();
            $table->string('sexualMaturity')->nullable();
            $table->integer('spawningInterval')->nullable();

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
        Schema::dropIfExists('CustomSpecies');
    }
}