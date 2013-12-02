<?php

use Illuminate\Database\Migrations\Migration;

class CreateDomiciliosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domicilios', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('cliente_id');
			$table->string('sipdomicilioscid_id');
			$table->text('descripcion_domicilio',240);
			$table->text('notas_domicilio',240);
			$table->integer('valor');
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
		Schema::drop('domicilios');
	}

}