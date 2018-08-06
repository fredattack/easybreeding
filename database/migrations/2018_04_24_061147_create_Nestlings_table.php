<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNestlingsTable extends Migration {

	public function up()
	{
		Schema::create('Nestlings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('species_id');
			$table->enum('sexe', array('male', 'female', 'unknow'));
			$table->string('sexingMethod');
			$table->string('idType');
			$table->string('idNum');
			$table->string('couple_id');
			$table->string('personal_id');
			$table->string('userId');
			$table->string('dateOfBirth');

			$table->integer('father_id')->unsigned()->nullable();
			$table->integer('mother_id')->unsigned();
			$table->string('mutation')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Nestlings');
	}
}