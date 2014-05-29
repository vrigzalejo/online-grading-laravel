<?php

class AdminsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('admins')->delete();

		$admins = [
			[
				'employee_id' => '1234567',
				'lastname'	  => 'Magalona',
				'firstname'	  => 'Aljon',
				'middlename'  => 'G',
				'birthday' 	  => '1994-03-05',
				'contact'	  => '09081515337',
				'email'		  => 'admin@admin.com',
				'address'	  => 'Manggahan, Pasig City',
				'created_at'  => new DateTime,
				'updated_at'  => new DateTime
			],
			
		];

		DB::table('admins')->insert($admins);
	}

}