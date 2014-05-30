<?php

class ProfessorController extends BaseController {

public function __construct() {
		$this->beforeFilter('csrf', ['on' => 'post']);
		$this->beforeFilter('auth', ['only' => ['getEncode', 'getSubmit', 'getScheds']]);
	}

	public function getEncode($yrsection = NULL) {
		return View::make('prof.encode')
			->with(BaseController::encodeGetYrsecProfsubStudsubGrades($yrsection));

		//$yrsection = NULL;
	}

	public function postEncode() {
		$yrsection = Xss::clean(Input::get('courseyrsection'));

		return View::make('prof.encode')
			->with(BaseController::encodeGetYrsecProfsubStudsubGrades($yrsection));
	}

	public function getScheds() {
		return View::make('prof.scheds')
			->with([
				BaseController::getRoomSubCourseGradingYrsec(),
				'professors'	=> Professor::professorIndividualByEmpId(Auth::user()->employee_id),			
				'students'		=> Student::all(),
				'profsubjects'	=> Profsubject::profSubjectsByEmpId(Auth::user()->employee_id),
			]);
	}

	public function getSubmit() {
		return View::make('prof.submit')
			->with(BaseController::submittedGrades());
	}

	public function postStudentGrade($profsubjects_id) {
		//Redirect::action('ProfessorController@getScheds');

		$student_grade = [
			'studsubjects_id' => Xss::clean(Input::get('stdid')),
			'midterm_grade' => Xss::clean(Input::get('midterm')),
			'final_grade'	=> Xss::clean(Input::get('finals')),
			'semgrade'		=> Xss::clean(Input::get('semgrade')),
			'remarks'		=> Xss::clean(Input::get('remarks'))
		];

		if( Input::get('midterm') != "N/A") {
			Midtermgrade::create([
				'profsubjects_id' => $profsubjects_id,
				'studsubjects_id' => Xss::clean(Input::get('stdid')),
				'grade'			  => Xss::clean(Input::get('midterm')),
				'created_at'  => new DateTime,
				'updated_at'  => new DateTime
			]);

		}
		
		if( Input::get('midterm') != "N/A" 
			&& Input::get('finals') != "N/A") {

			Finalgrade::create([
				'profsubjects_id' => $profsubjects_id,
				'studsubjects_id' => Xss::clean(Input::get('stdid')),
				'grade'		      => Xss::clean(Input::get('finals')),
				'created_at'  => new DateTime,
				'updated_at'  => new DateTime
			]);

		}
			

		if(Input::get('midterm') != "N/A" 
			&& Input::get('finals') != "N/A" 
			&& Input::get('semgrade') != "N/A" 
			&& Input::get('remarks') != "N/A" ) {

			Semgrade::create([
				'studsubjects_id' => Xss::clean(Input::get('stdid')),
				'profsubjects_id' => $profsubjects_id,			
				'midtermgrades' => Xss::clean(Input::get('midterm')),
				'finalgrades'   => Xss::clean(Input::get('finals')),
				'semgrade'		=> Xss::clean(Input::get('semgrade'),
				'remarks'		=> Xss::clean(Input::get('remarks')),
				'created_at'  => new DateTime,
				'updated_at'  => new DateTime
			]);


		}

		$forsms = Semgrade::gradeOfStudents(Input::get('stdid'), $profsubjects_id)->first();
             

		Sms::send([
			'to' 	=> '+639081515337',
			'text'	=> 'Prof. ' . $forsms->prof_lname . ', ' 
				. $forsms->prof_fname . ' ' 
				. $forsms->prof_mname 
				. ' has submitted grade in ' 
				. $forsms->subcode
				. '( '
				. $forsms->code . ' - '
				. $forsms->yrsection
				. ' )'
		]);
		
		return Redirect::route('pencode');


	}
}