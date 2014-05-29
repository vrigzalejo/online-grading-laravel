<?php

class AdminController extends BaseController {



public function __construct() {
		$this->beforeFilter('csrf', ['on' => ['post','put','delete']]);
		$this->beforeFilter('auth', ['only' => 'getGrades', 
			'getSearch', 'getSubjects', 'getUsers', 'getStudents',
			'getRooms', 'getYrSections', 'getAdminsCreate', 'getCourses',
			'getStudentsEnroll', 'getAdminsTasks', 'getStudentsCreate',
			'getAdmins', 'getProfessors', 'getProfessorsTasks',
			'getProfessorsCreate','getUsers'

		]);
	}

	public function getGrades() {
		return View::make('admin.grades')
			->with(BaseController::getAllSubmittedGradesByProfs());
	}

	public function getSearch() {
		return View::make('admin.search')
			->with(BaseController::getAllFromDbPaginated());

	}

	public function deleteUser($id) {

			$delete_user = User::find($id);
			$delete_user->delete();
			return Redirect::back();
	}

	public function deleteCourse($id) {

			$delete_course = Course::find($id);
			$delete_course->delete();
			return Redirect::back();
	}

	public function deleteRoom($id) {

			$delete_room = Room::find($id);
			$delete_room->delete();
			return Redirect::back();
	}

	public function deleteYrSection($id) {

			$delete_yr_section = Yrsection::find($id);
			$delete_yr_section->delete();
			return Redirect::back();
	}

	public function deleteAdmin($id) {
			$delete_admin = Admin::find($id);
			$delete_admin->delete();
			return Redirect::back();
	}

	public function deleteSubject($id) {

			$delete_subject = Subject::find($id);
			$delete_subject->delete();
			return Redirect::back();
	}

	public function deleteStudent($id) {
			$delete_student = Student::find($id);
			$delete_student->delete();
			return Redirect::back();
	}

	public function deleteStudentsEnroll($id) {

			$delete_studenroll = Studsubject::find($id);
			$delete_studenroll->delete();
			return Redirect::back();
	}

	public function deleteProf($id) {

			$delete_prof = Professor::find($id);
			$delete_prof->delete();
			return Redirect::back();
	}

	public function deleteProfTasks($id) {
			$delete_proftasks = Profsubject::find($id);
			$delete_proftasks->delete();
			return Redirect::back();
	}

	public function updateCourse($id) {

			$course_code = Input::get('course_code');
			$course_collegecode = Input::get('course_collegecode');
			$course_description = Input::get('course_description');
			$update_course = Course::find($id);
			$update_course->code = $course_code;
			$update_course->college_code = $course_collegecode;
			$update_course->description = $course_description;
			$update_course->save();
			return Redirect::back();
	}

	public function updateRoom($id) {

			$room_room = Input::get('room_room');
			$update_room = Room::find($id);
			$update_room->room = $room_room;
			$update_room->save();
			return Redirect::back();
	}

	public function updateYrSection($id) {

			$yrsection_yrsection = Input::get('yrsection_yrsection');
			$update_yrsection = Yrsection::find($id);
			$update_yrsection->yrsection = $yrsection_yrsection;
			$update_yrsection->save();
			return Redirect::back();
	}

	public function updateSubject($id) {

			$subject_code = Input::get('subject_code');
			$subject_description = Input::get('subject_description');
			$update_subject = Subject::find($id);
			$update_subject->code = $subject_code;
			$update_subject->description = $subject_description;
			$update_subject->save();
			return Redirect::back();
	}

	public function updateLock($id) {

		$lock = Input::get('lock');
		$update_lock = Lock::find($id);
		$update_lock->lock = $lock;
		$update_lock->save();
		return Redirect::back();
	}

	public function updateProf($id) {

		$update_employeeid = Input::get('employee_id');
		$update_lastname = Input::get('lastname');
		$update_firstname = Input::get('firstname');
		$update_mi = Input::get('mi');
		$update_birthday = Input::get('birthday');
		$update_contact = Input::get('contact');
		$update_email = Input::get('email');
		$update_address = Input::get('address');

		$update_prof = Professor::find($id);
		$update_prof->employee_id = $update_employeeid;
		$update_prof->lastname = $update_lastname;
		$update_prof->firstname = $update_firstname;
		$update_prof->middlename = $update_mi;
		$update_prof->birthday = $update_birthday;
		$update_prof->contact = $update_contact;
		$update_prof->email = $update_email;
		$update_prof->address = $update_address;
		$update_prof->save();
		return Redirect::back();
 	}

 	public function updateAdmin($id) {

		$update_employeeid = Input::get('employee_id');
		$update_lastname = Input::get('lastname');
		$update_firstname = Input::get('firstname');
		$update_mi = Input::get('mi');
		$update_birthday = Input::get('birthday');
		$update_contact = Input::get('contact');
		$update_email = Input::get('email');
		$update_address = Input::get('address');

		$update_admin = Admin::find($id);
		$update_admin->employee_id = $update_employeeid;
		$update_admin->lastname = $update_lastname;
		$update_admin->firstname = $update_firstname;
		$update_admin->middlename = $update_mi;
		$update_admin->birthday = $update_birthday;
		$update_admin->contact = $update_contact;
		$update_admin->email = $update_email;
		$update_admin->address = $update_address;
		$update_admin->save();
		return Redirect::back();
 	}


 	public function updateStudent($id) {

		$update_studentid = Input::get('student_id');
		$update_lastname = Input::get('lastname');
		$update_firstname = Input::get('firstname');
		$update_mi = Input::get('mi');
		$update_birthday = Input::get('birthday');
		$update_contact = Input::get('contact');
		$update_course = Input::get('course');
		$update_yrsection = Input::get('yrsection');
		$update_address = Input::get('address');

		$update_stud = Student::find($id);
		$update_stud->student_id = $update_studentid;
		$update_stud->lastname = $update_lastname;
		$update_stud->firstname = $update_firstname;
		$update_stud->middlename = $update_mi;
		$update_stud->birthday = $update_birthday;
		$update_stud->contact = $update_contact;
		$update_stud->course = $update_course;
		$update_stud->yrsection = $update_yrsection;
		$update_stud->address = $update_address;
		$update_stud->save();
		return Redirect::back();
 	}

	public function postSearch() {
		
		$keyword = Input::get('keyword');
		$filter = Input::get('filter_by');

		if(empty($keyword)) {
			return Redirect::route('asearch');
		}
		
		if($filter == 'admins') {
			$results = Admin::where('employee_id', 'LIKE', "%$keyword%")
						->orWhere('lastname', 'LIKE', "%$keyword%")
						->orWhere('firstname', 'LIKE', "%$keyword%")
						->get();
		} elseif($filter == 'professors') {
			$results = Professor::where('employee_id', 'LIKE', "%$keyword%")
						->orWhere('lastname', 'LIKE', "%$keyword%")
						->orWhere('firstname', 'LIKE', "%$keyword%")
						->get();			
		} elseif($filter == 'students') {
			$results = Student::where('student_id', 'LIKE', "%$keyword%")
						->orWhere('lastname', 'LIKE', "%$keyword%")
						->orWhere('firstname', 'LIKE', "%$keyword%")
						->get();
		}


		return View::make('admin.search')
				->with([
					'results' => $results,
				]);
		
	}
		

	
	public function getSubjects() {
		return View::make('admin.subjects')
			->with(BaseController::getAllFromDbPaginated());
	}



	public function getStudents() {
		return View::make('admin.students')
			->with(BaseController::getAllFromDbPaginated());
	}

	public function getStudentsEnroll($id) {

		

		return View::make('admin.studentsenroll')
			->with([
				
				'students'		=> Student::studentIndividual($id),
				'studsubjects'  => Studsubject::studentSubjects($id),
				'profsubjects'	=> Profsubject::profSubjectsAll(),
				'courses' 		=> Course::all(),
				'yrsections'	=> Yrsection::all(),
			
			]);
	}

	public function getAdminsTasks($id) {

		return View::make('admin.adminstasks')
			->with([
				'admins'		=> Admin::adminIndividual($id),
				BaseController::getRoomSubCourseGradingYrsecProfStuds()
			]);
	}

	public function getStudentsCreate() {
		return View::make('admin.studentcreate')
			->with(BaseController::getAllFromDb());
	}


	public function getAdmins() {
		return View::make('admin.admins')
			->with(BaseController::getAllFromDbPaginated());
	}

	public function getRooms() {
		return View::make('admin.rooms')
			->with(BaseController::getAllFromDbPaginated());
	}

	public function getYrSections() {
		return View::make('admin.yrsections')
			->with(BaseController::getAllFromDbPaginated());
	}



	public function getAdminsCreate() {
		return View::make('admin.admincreate')
			->with(BaseController::getAllFromDb());
	}

	public function getProfessors() {
		return View::make('admin.professors')
			->with(BaseController::getAllFromDbPaginated());
	}

	public function getProfessorsTasks($id) {

		
		return View::make('admin.professorstasks')
			->with(BaseController::getRoomSubCourseGradingYrsecStudsProfIdProfsubId($id));
	}

	public function getProfessorsCreate() {
		return View::make('admin.profcreate')
			->with(BaseController::getAllFromDb());
	}

	public function getUsers() {
		return View::make('admin.users')
			->with(BaseController::getAllFromDbPaginatedExceptAdminProf());
	}

	public function getCourses() {
		return View::make('admin.courses')
			->with(BaseController::getAllFromDbPaginated());
	}

	public function postAddCourse() {

		$course = [
			'code'			=> Input::get('code'),
			'college_code'	=> Input::get('college_code'),
			'description'	=> Input::get('description')
		];

		$validation = Course::validate($course);

		if($validation->passes()) {
			Course::firstOrCreate([
			'code'			=> Input::get('code'),
			'college_code'	=> Input::get('college_code'),
			'description'	=> Input::get('description')
		]);
			return Redirect::back()
				->with('message', 'New course added');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}

	public function postAddSubject() {

		$subject = [
			'code'			=> Input::get('add_code'),
			'description'	=> Input::get('add_description')
		];

		$validation = Subject::validate($subject);

		if($validation->passes()) {
			Subject::create([
			'code'			=> Input::get('add_code'),
			'description'	=> Input::get('add_description')
		]);
			return Redirect::back()
				->with('message', 'New subject added');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}

	public function postAddRoom() {

		$room = [
			'room'			=> Input::get('addroom'),
		];

		$validation = Room::validate($room);

		if($validation->passes()) {
			Room::create([
				'room'		=> Input::get('addroom')
		]);
			return Redirect::back()
				->with('message', 'New room added');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}

	public function postAddYrSection() {

		$yrsection = [
			'yrsection'		=> Input::get('addyrsection')		
		];

		$validation = Yrsection::validate($yrsection);

		if($validation->passes()) {
			Yrsection::create([
				'yrsection'		=> Input::get('addyrsection')	
		]);
			return Redirect::back()
				->with('message', 'New Yr/Section added');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}




	public function postAddUser() {

		$user = [
			'employee_id'			=> Input::get('employee_id'),
			'username'				=> Input::get('username'),
			'password'				=> Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation')
		];

		$rules = [
			'employee_id'			=> 'Required',
			'username'				=> 'Required|AlphaNum|Min:4',
			'password'				=> 'Required|AlphaNum|Between:4,32|Confirmed',
			'password_confirmation'	=> 'Required|AlphaNum|Between:4,32'
			];

		$validation = User::validate($user, $rules);

		if($validation->passes()) {

			$addtoadmin = Admin::where('employee_id', '=', Input::get('employee_id'))->first();

			$createadmin = [
			'employee_id'	=> Input::get('employee_id'),
			'username'		=> Input::get('username'),
			'password'		=> Hash::make(Input::get('password')),
			'type'			=> ($addtoadmin) ? '1' : '2',
			];

			if($addtoadmin) {

			User::create($createadmin);
			} else {
			User::create($createadmin);
			}
		
			return Redirect::back()
				->with('message', 'New user added');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}

	public function postAddStudents() {

		$student = [
			'student_id'		=> Input::get('student_id'),
			'lastname'			=> Input::get('lastname'),
			'firstname'			=> Input::get('firstname'),
			'middlename' 		=> Input::get('middlename'),
			'contact'			=> Input::get('contact'),
			'birthday'			=> Input::get('birthday'),
			'address' 			=> Input::get('address'),
			'course' 			=> Input::get('course'),
			'yrsection' 		=> Input::get('yrsection')
		];

		

		$validation = Student::validate($student);

		if($validation->passes()) {
			Student::create($student);
			return Redirect::back()
				->with('message', 'New student added');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}

	private function adminProfInput() {
		$get_admin_prof_input = [
			'employee_id'		=> Input::get('employee_id'),
			'lastname'			=> Input::get('lastname'),
			'firstname'			=> Input::get('firstname'),
			'middlename' 		=> Input::get('middlename'),
			'contact'			=> Input::get('contact'),
			'email'				=> Input::get('email'),
			'birthday'			=> Input::get('birthday'),
			'address' 			=> Input::get('address'),
		];
		return $get_admin_prof_input;
	}

	public function postAddAdmins() {

	
		$validation = Admin::validate($this->adminProfInput());

		if($validation->passes()) {
			Admin::create($this->adminProfInput());
			return Redirect::back()
				->with('message', 'New admin added');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}

	public function postAddProfessors() {


		$validation = Professor::validate($this->adminProfInput());

		if($validation->passes()) {
			Professor::create($this->adminProfInput());
			return Redirect::back()
				->with('message', 'New professor added');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}

	public function postAddProfessorsTasks($id) {

		$tasks = [
			'course_id' 	=> Input::get('course'),
			'yrsection_id' 	=> Input::get('yrsection'),
			'subject_id' 	=> Input::get('subject'),
			'room_id' 		=> Input::get('room'),
			'timestarts_at' => Input::get('timestart'),
			'timeends_at'	=> Input::get('timeends'),
		];

		$validation = Profsubject::validate($tasks);

		if($validation->passes()) {
			Profsubject::create([
				'professor_id'  => $id,
				'course_id'		=> Input::get('course'),
				'yrsection_id'	=> Input::get('yrsection'),
				'subject_id'	=> Input::get('subject'),
				'room_id'		=> Input::get('room'),
				'timestarts_at' => date('H:i:s',strtotime(Input::get('timestart'))),
				'timeends_at'	=> date('H:i:s',strtotime(Input::get('timeends')))
			]);
			return Redirect::back()
				->with('message', 'New task added');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}

	public function postAddStudentEnroll($id) {

		$studentenroll = [
			'profsubjects_id' 	=> Input::get('studentenroll'),
		];

		$validation = Studsubject::validate($studentenroll);

		if($validation->passes()) {
			Studsubject::create([
				'student_id'   		 => $id,
				'profsubjects_id'	 => Input::get('studentenroll'),
			]);
			return Redirect::back()
				->with('message', 'New subject enrolled');
		} else {
			return Redirect::back()
				->withErrors($validation);
		}
	}

}