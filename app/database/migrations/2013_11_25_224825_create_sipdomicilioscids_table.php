<?php

use Illuminate\Database\Migrations\Migration;

class CreateSipdomicilioscidsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sipdomicilioscids', function($table)
		{
			$table->increments('id');
			$table->string('unique_id',50);
			$table->string('cid',20);
			$table->string('linea',6);
			$table->smallInteger('estado_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sipdomicilioscids');
	}

}