<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Birds', function(Blueprint $table) {
			$table->foreign('species_id')->references('id')->on('Species')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Birds', function(Blueprint $table) {
			$table->foreign('father_id')->references('id')->on('Birds')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Birds', function(Blueprint $table) {
			$table->foreign('mother_id')->references('id')->on('Birds')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Couples', function(Blueprint $table) {
			$table->foreign('maleId')->references('id')->on('Birds')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Couples', function(Blueprint $table) {
			$table->foreign('felmaleId')->references('id')->on('Birds')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Couples', function(Blueprint $table) {
			$table->foreign('cage_id')->references('id')->on('Couples')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Hatchings', function(Blueprint $table) {
			$table->foreign('couple_id')->references('id')->on('Couples')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Eggs', function(Blueprint $table) {
			$table->foreign('idHatching')->references('id')->on('Hatchings')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Cages', function(Blueprint $table) {
			$table->foreign('idZone')->references('id')->on('Zones')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Cages', function(Blueprint $table) {
			$table->foreign('idBird')->references('id')->on('Birds')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Species', function(Blueprint $table) {
			$table->foreign('Order')->references('id')->on('Order')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('Species', function(Blueprint $table) {
			$table->foreign('Id_famillie')->references('id')->on('Familles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
//		Schema::table('Birds', function(Blueprint $table) {
//			$table->dropForeign('Birds_species_id_foreign');
//		});
		Schema::table('Birds', function(Blueprint $table) {
			$table->dropForeign('Birds_father_id_foreign');
		});
		Schema::table('Birds', function(Blueprint $table) {
			$table->dropForeign('Birds_mother_id_foreign');
		});
		Schema::table('Couples', function(Blueprint $table) {
			$table->dropForeign('Couples_maleId_foreign');
		});
		Schema::table('Couples', function(Blueprint $table) {
			$table->dropForeign('Couples_felmaleId_foreign');
		});
//		Schema::table('Couples', function(Blueprint $table) {
//			$table->dropForeign('Couples_cage_id_foreign');
//		});
		Schema::table('Hatchings', function(Blueprint $table) {
			$table->dropForeign('Hatchings_couple_id_foreign');
		});
		Schema::table('Eggs', function(Blueprint $table) {
			$table->dropForeign('Eggs_idHatching_foreign');
		});
		Schema::table('Cages', function(Blueprint $table) {
			$table->dropForeign('Cages_idZone_foreign');
		});
		Schema::table('Cages', function(Blueprint $table) {
			$table->dropForeign('Cages_idBird_foreign');
		});
		Schema::table('Species', function(Blueprint $table) {
			$table->dropForeign('Species_Order_foreign');
		});
		Schema::table('Species', function(Blueprint $table) {
			$table->dropForeign('Species_Id_famillie_foreign');
		});
	}
}