<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpeciesTable extends Migration {

	public function up()
	{
		Schema::create('Species', function(Blueprint $table) {
			$table->increments('id');
            $table->string('commonName')->nullable();
            $table->string('scientificName')->nullable();
            $table->integer('Id_famillie')->unsigned();
            $table->string('subspecies')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('incubation')->unsigned()->nullable();
            $table->integer('fertilityControl')->unsigned()->nullable();
            $table->timestamp('girdleDate')->nullable();
            $table->integer('outOfNest')->unsigned()->nullable();
            $table->integer('weaning')->nullable();
            $table->string('sexualMaturity')->nullable();
            $table->integer('spawningInterval')->nullable();

            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('Species');
	}
}