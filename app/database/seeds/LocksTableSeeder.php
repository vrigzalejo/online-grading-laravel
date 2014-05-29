<?php

class LocksTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('locks')->delete();

		$locks = [
			[
				'lock' 			=> 0,
				'created_at'	=> new DateTime,
				'updated_at'	=> new DateTime,
			]
			
		];

		DB::table('locks')->insert($locks);
	}

}