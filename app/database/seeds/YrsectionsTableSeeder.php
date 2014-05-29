<?php

class YrsectionsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('yrsections')->delete();

		$yrsections = [
			[
				'yrsection' => '1A',
			],
			[
				'yrsection' => '1B',
			],
			[
				'yrsection' => '1C',
			],
			[
				'yrsection' => '1D',
			],
			[
				'yrsection' => '2A',
			],
			[
				'yrsection' => '2B',
			],
			[
				'yrsection' => '2C',
			],
			[
				'yrsection' => '2D',
			],
			[
				'yrsection' => '3A',
			],
			[
				'yrsection' => '3B',
			],
			[
				'yrsection' => '3C',
			],
			[
				'yrsection' => '3D',
			],
			[
				'yrsection' => '4A',
			],
			[
				'yrsection' => '4B',
			],
			[
				'yrsection' => '4C',
			],
			[
				'yrsection' => '4D',
			],

			
		];

		DB::table('yrsections')->insert($yrsections);
	}

}