<?php

class GradingsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('gradings')->delete();

		$gradings = [
			[
				'grade' 		=> '1.00',
			],
			[
				'grade' 		=> '1.25',
			],
			[
				'grade' 		=> '1.50',
			],
			[
				'grade' 		=> '1.75',
			],
			[
				'grade' 		=> '2.00',
			],
			[
				'grade' 		=> '2.25',
			],
			[
				'grade' 		=> '2.50',
			],
			[
				'grade' 		=> '2.75',
			],
			[
				'grade' 		=> '3.00',
			],
			[
				'grade' 		=> '4.00',
			],
			[
				'grade' 		=> '5.00',
			]		
		];

		DB::table('gradings')->insert($gradings);
	}

}