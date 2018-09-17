<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSmsLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sms_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('phone', 20);
			$table->text('msg', 65535);
			$table->integer('status');
			$table->integer('created_by');
			$table->dateTime('created_at');
			$table->dateTime('updated_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sms_log');
	}

}
