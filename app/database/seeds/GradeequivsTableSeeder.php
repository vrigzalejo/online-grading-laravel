<?php

class GradeequivsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('gradeequivs')->delete();

		$gradeequivs = [
			[
				'grading_id' => '1',
				'gradeequiv' => '100'
			],
			[
				'grading_id' => '1',
				'gradeequiv' => '99'
			],
			[
				'grading_id' => '2',
				'gradeequiv' => '98'
			],
			[
				'grading_id' => '2',
				'gradeequiv' => '97'
			],
			[
				'grading_id' => '2',
				'gradeequiv' => '96'
			],
			[
				'grading_id' => '2',
				'gradeequiv' => '95'
			],
			[
				'grading_id' => '3',
				'gradeequiv' => '94'
			],
			[
				'grading_id' => '3',
				'gradeequiv' => '93'
			],
			[
				'grading_id' => '3',
				'gradeequiv' => '92'
			],
			[
				'grading_id' => '3',
				'gradeequiv' => '91'
			],
			[
				'grading_id' => '4',
				'gradeequiv' => '90'
			],
			[
				'grading_id' => '4',
				'gradeequiv' => '89'
			],
			[
				'grading_id' => '4',
				'gradeequiv' => '88'
			],
			[
				'grading_id' => '5',
				'gradeequiv' => '87'
			],
			[
				'grading_id' => '5',
				'gradeequiv' => '86'
			],
			[
				'grading_id' => '5',
				'gradeequiv' => '85'
			],
			[
				'grading_id' => '6',
				'gradeequiv' => '84'
			],
			[
				'grading_id' => '6',
				'gradeequiv' => '83'
			],
			[
				'grading_id' => '7',
				'gradeequiv' => '82'
			],
			[
				'grading_id' => '7',
				'gradeequiv' => '81'
			],
			[
				'grading_id' => '8',
				'gradeequiv' => '79'
			],
			[
				'grading_id' => '8',
				'gradeequiv' => '78'
			],
			[
				'grading_id' => '8',
				'gradeequiv' => '77'
			],
			[
				'grading_id' => '9',
				'gradeequiv' => '76'
			],
			[
				'grading_id' => '9',
				'gradeequiv' => '75'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '74'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '73'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '72'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '71'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '70'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '69'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '68'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '67'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '66'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '65'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '64'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '63'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '62'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '61'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '60'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '59'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '58'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '57'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '56'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '55'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '54'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '53'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '52'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '51'
			],
			[
				'grading_id' => '11',
				'gradeequiv' => '50'
			]
			
		];

		DB::table('gradeequivs')->insert($gradeequivs);
	}

}