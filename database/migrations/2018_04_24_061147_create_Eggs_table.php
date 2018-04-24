<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEggsTable extends Migration {

	public function up()
	{
		Schema::create('Eggs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('layingDate');
			$table->integer('position');
			$table->string('type');
			$table->string('state')->nullable();
			$table->longText('remarque')->nullable();
			$table->integer('idHatching')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Eggs');
	}
}