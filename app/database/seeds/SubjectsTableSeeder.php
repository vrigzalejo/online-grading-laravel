<?php

class SubjectsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('subjects')->delete();

		$subjects = [
			[
				'code' 			=> 'CHE101',
				'description'	=> 'General Chemistry 1'
			],
			[
				'code' 			=> 'CIT111',
				'description'	=> 'Computer Fundamentals'
			],
			[
				'code' 			=> 'CIT112',
				'description'	=> 'Fundamentals of Programming'
			],
			[
				'code' 			=> 'CIT121',
				'description'	=> 'Ethics in ICT Professional'
			],
			[
				'code' 			=> 'CIT211',
				'description'	=> 'Multimedia Systems'
			]
			
		];

		DB::table('subjects')->insert($subjects);
	}

}