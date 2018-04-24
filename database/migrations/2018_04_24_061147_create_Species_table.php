<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpeciesTable extends Migration {

	public function up()
	{
		Schema::create('Species', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('commonName_en')->nullable();
			$table->string('scientificName')->nullable();
			$table->integer('Order')->unsigned()->nullable();
			$table->integer('Id_famillie')->unsigned();
			$table->string('subspecies')->nullable();
			$table->decimal('price')->nullable();
			$table->integer('incubation')->unsigned()->nullable();
			$table->integer('fertilityControl')->unsigned()->nullable();
			$table->timestamp('girdleDate')->nullable();
			$table->integer('outOfNest')->unsigned();
			$table->integer('weaning')->nullable();
			$table->string('sexualMaturity');
			$table->integer('spawningInterval');
			$table->string('commonName_fr')->nullable();
			$table->string('commonName_nl')->nullable();
			$table->string('commonName_de')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Species');
	}
}