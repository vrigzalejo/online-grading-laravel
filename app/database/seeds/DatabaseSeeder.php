<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('AdminsTableSeeder');
		$this->call('ProfessorsTableSeeder');
		$this->call('YrsectionsTableSeeder');
		$this->call('CoursesTableSeeder');
		$this->call('GradingsTableSeeder');
		$this->call('SubjectsTableSeeder');
		$this->call('RoomsTableSeeder');
		$this->call('GradeequivsTableSeeder');
		$this->call('LocksTableSeeder');
	}

}
