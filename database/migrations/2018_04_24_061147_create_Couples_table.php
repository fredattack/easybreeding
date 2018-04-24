<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouplesTable extends Migration {

	public function up()
	{
		Schema::create('Couples', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('maleId')->unsigned();
			$table->integer('felmaleId')->unsigned();
			$table->integer('cage_id');
		});
	}

	public function down()
	{
		Schema::drop('Couples');
	}
}