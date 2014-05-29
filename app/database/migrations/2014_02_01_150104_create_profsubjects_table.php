<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfsubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profsubjects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('professor_id')->unsigned();
			$table->integer('course_id')->unsigned();
			$table->integer('yrsection_id')->unsigned();
			$table->integer('subject_id')->unsigned();
			$table->integer('room_id')->unsigned();
			$table->time('timestarts_at');
			$table->time('timeends_at');
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
		Schema::drop('profsubjects');
	}

}
