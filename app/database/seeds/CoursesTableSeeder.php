<?php

class CoursesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('courses')->delete();

		$courses = [
			[
				'code' 			=> 'BSCS',
				'college_code'	=> 'CCS',
				'description'	=> 'Bachelor of Science in Computer Science',
			],
			[
				'code' 			=> 'BSIT',
				'college_code'	=> 'CCS',
				'description'	=> 'Bachelor of Science in Information Technology',
			],
			
		];

		DB::table('courses')->insert($courses);
	}

}