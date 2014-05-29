<?php

class ProfessorsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('professors')->delete();

		$professors = [
			[
				'employee_id' => '123456789',
				'lastname'	  => 'Aljon',
				'firstname'	  => 'Biboy',
				'middlename'  => 'A',
				'birthday' 	  => '1994-02-01',
				'contact'	  => '09081515337',
				'email'		  => 'prof1@prof1.com',
				'address'	  => 'Manggahan, Pasig City',
				'created_at'  => new DateTime,
				'updated_at'  => new DateTime
			],
			
		];

		DB::table('professors')->insert($professors);
	}

}