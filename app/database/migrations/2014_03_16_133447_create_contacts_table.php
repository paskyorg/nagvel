<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
    			$table->increments('id');
			$table->string('contact_name');
			$table->string('alias');
			$table->boolean('host_notifications_enabled');
			$table->boolean('service_notifications_enabled');
			$table->integer('host_notification_period')->unsigned();
                        $table->foreign('host_notification_period')->references('id')
                                ->on('timeperiods')->onDelete('cascade');
			$table->integer('service_notification_period')->unsigned();
                        $table->foreign('service_notification_period')->references('id')
                                ->on('timeperiods')->onDelete('cascade');
			$table->string('host_notification_options');
			$table->string('service_notification_options');
			$table->integer('host_notification_commands')->unsigned();
                        $table->foreign('host_notification_commands')->references('id')
                                ->on('commands')->onDelete('cascade');
			$table->integer('service_notification_commands')->unsigned();
                        $table->foreign('service_notification_commands')->references('id')
                                ->on('commands')->onDelete('cascade');
			$table->string('email');
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
		Schema::drop('contacts');
	}

}
