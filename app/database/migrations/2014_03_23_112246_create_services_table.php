<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('host_name')->unsigned();
			$table->string('service_description');
			$table->integer('check_command')->unsigned();
			$table->integer('max_check_attempts');
			$table->integer('check_interval');
			$table->integer('retry_interval');
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
		Schema::drop('services');
	}

}
