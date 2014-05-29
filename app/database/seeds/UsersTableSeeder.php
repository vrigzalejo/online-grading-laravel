<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		$users = [
			[
				'employee_id' => '1234567',
				'username'	  => 'admin1',
				'password'	  => Hash::make('admin1'),
				'type'		  => 1,
				'created_at'  => new DateTime,
				'updated_at'  => new DateTime
			],
			[
				'employee_id' => '123456789',
				'username'	  => 'prof1',
				'password'	  => Hash::make('prof1'),
				'type'		  => 2,
				'created_at'  => new DateTime,
				'updated_at'  => new DateTime
			],
			
		];

		DB::table('users')->insert($users);
	}

}