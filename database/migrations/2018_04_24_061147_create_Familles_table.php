<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamillesTable extends Migration {

	public function up()
	{
		Schema::create('Familles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer(('orderId'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Familles');
	}
}