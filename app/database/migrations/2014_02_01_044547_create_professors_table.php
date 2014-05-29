<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfessorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('professors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('employee_id')->unique();
			$table->string('lastname');
			$table->string('firstname');
			$table->string('middlename');
			$table->date('birthday');
			$table->string('contact');
			$table->string('email');
			$table->text('address');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('professors');
	}

}