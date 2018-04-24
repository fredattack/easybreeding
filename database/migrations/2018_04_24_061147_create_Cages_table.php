<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCagesTable extends Migration {

	public function up()
	{
		Schema::create('Cages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('idZone')->unsigned();
			$table->integer('idBird')->unsigned()->nullable();
			$table->integer('long')->nullable();
			$table->integer('large');
			$table->integer('hight');
		});
	}

	public function down()
	{
		Schema::drop('Cages');
	}
}