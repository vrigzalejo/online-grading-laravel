<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMidtermgradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('midtermgrades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('studsubjects_id')->unsigned();
			$table->integer('profsubjects_id')->unsigned();
			//$table->decimal('quiz', 4, 2);
			//$table->decimal('recitation', 4, 2);
			//$table->decimal('project', 4, 2);
			//$table->decimal('standing', 4, 2);
			//$table->decimal('exam', 4, 2);
			$table->decimal('grade', 5, 2);
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
		Schema::drop('midtermgrades');
	}

}