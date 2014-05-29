<?php

class RoomsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('rooms')->delete();

		$rooms = [
			[
				'room' 			=> '701',
			],
			[
				'room' 			=> '702',
			],
			[
				'room' 			=> '703',
			],
			[
				'room' 			=> '704',
			],
			[
				'room' 			=> '705',
			],
	
			
		];

		DB::table('rooms')->insert($rooms);
	}

}