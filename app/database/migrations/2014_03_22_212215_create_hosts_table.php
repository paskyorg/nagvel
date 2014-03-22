<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hosts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('host_name');
			$table->string('alias');
			$table->string('address');
			$table->integer('max_check_attempts');
			$table->integer('check_period')->unsigned();
			$table->integer('notification_interval');
			$table->integer('notification_period')->unsigned();
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
		Schema::drop('hosts');
	}

}
