<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTable extends Migration {

	public function up()
	{
		Schema::create('Order', function(Blueprint $table) {
			$table->increments('id');
            $table->string('orderName')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Order');
	}
}