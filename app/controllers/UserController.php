<?php

class UserController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', ['on' => 'post']);
		$this->beforeFilter('auth', ['only' => ['getMain', 'getMyProfile', 'getAdmins', 'getProfessors']]);
	}

	public function getLogin() {
		if(Auth::check()) {
			if(Auth::user()->type == 1)
				return Redirect::route('amain');
		  	else
		  		return Redirect::route('pmain');
	  	}

		return View::make('user.login')
			->with('employees', User::all());
	}

	public function getStudentLogin() {
		return View::make('student.login')
			->with('students', Student::all());
	}

	public function postStudentLogin() {
		$student_id = Input::get('student_id');

		$results = Semgrade::viewMyGrades($student_id);

		if(empty($results)) {
			return Redirect::back();
		}
		

		return View::make('student.search')
			->with([
				'results'  => $results,
				'students' => Student::where('student_id','=',$student_id)->get()
			]);
	}

	public function postLogin() {

		$user = [
			'employee_id'	=> Input::get('employee_id'),
			'username'		=> Input::get('username'),
			'password'		=> Input::get('password')
		];

		$validation = User::validate($user);

		if(!Auth::check()) {
			if($validation->passes() && Auth::attempt($user, true)) {
				if(Auth::user()->type == 1) {
					Sms::send([
							'to' 	=> '+639081515337',
							'text'	=> 'Admin: ' . Input::get('username') . ' has been logged in at.'
						]);
					return Redirect::route('amain');
				} else {
			  		Sms::send([
							'to' 	=> '+639081515337',
							'text'	=> 'Professor: ' . Input::get('username') . ' has been logged in.'
						]);
			  		return Redirect::route('pmain');
			  	}
			} else {
				return Redirect::back()
					->with('message', 'Incorrect login credentials.')
					->withErrors($validation)
					->withInput(Input::except('password'));
			}
		} else {
			if(Auth::check()) {
				Auth::logout();
				Session::flush();				
			}
				return Redirect::back();
		}
	}

	public function getMain() {
		return View::make('user.main');
	}

	public function getLogout() {			
			Auth::logout();
			Session::flush();
			return Redirect::route('login')
				->with('message', 'You are now logged out.');
	}

}