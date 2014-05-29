<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSemgradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('semgrades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('studsubjects_id')->unsigned();
			$table->integer('profsubjects_id')->unsigned();
			$table->decimal('midtermgrades', 5, 2);
			$table->decimal('finalgrades', 5, 2);
			$table->string('semgrade');
			$table->string('remarks');
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
		Schema::drop('semgrades');
	}

}