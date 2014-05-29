<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradeequivsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gradeequivs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('grading_id')->unsigned();
			$table->integer('gradeequiv')->unsigned();
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
		Schema::drop('gradeequivs');
	}

}