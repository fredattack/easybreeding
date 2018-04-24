<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZonesTable extends Migration {

	public function up()
	{
		Schema::create('Zones', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nom')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Zones');
	}
}