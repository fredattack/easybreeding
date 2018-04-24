<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHatchingsTable extends Migration {

	public function up()
	{
		Schema::create('Hatchings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('couple_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Hatchings');
	}
}