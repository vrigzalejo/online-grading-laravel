<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

<<<<<<< HEAD
	protected function getAllFromDb() {
		$get_all_from_db = [
			'users'			=> User::all(),
			'admins'		=> Admin::all(),
			'rooms'			=> Room::all(),
			'subjects'		=> Subject::all(),
			'courses' 		=> Course::all(),
			'gradings'		=> Grading::all(),
			'professors'	=> Professor::all(),
			'yrsections'	=> Yrsection::all(),
			'students'		=> Student::all()
		];
		return $get_all_from_db;
	}

	protected function getAllFromDbPaginated() {
		$get_all_from_db_paginated = [
			'users'			=> User::paginate(5),
			'admins'		=> Admin::paginate(5),
			'rooms'			=> Room::paginate(5),
			'subjects'		=> Subject::paginate(5),
			'courses' 		=> Course::paginate(5),
			'gradings'		=> Grading::paginate(5),
			'professors'	=> Professor::paginate(5),
			'yrsections'	=> Yrsection::paginate(5),
			'students'		=> Student::paginate(5),
			'locks'			=> Lock::all()
		];
		return $get_all_from_db_paginated;
	}

	protected function getAllFromDbPaginatedExceptAdminProf() {
		$get_all_from_db_paginated_except_adminprof = [
			'users'			=> User::paginate(5),
			'admins'		=> Admin::all(),
			'rooms'			=> Room::paginate(5),
			'subjects'		=> Subject::paginate(5),
			'courses' 		=> Course::paginate(5),
			'gradings'		=> Grading::paginate(5),
			'professors'	=> Professor::all(),
			'yrsections'	=> Yrsection::paginate(5),
			'students'		=> Student::paginate(5)
		];
		return $get_all_from_db_paginated_except_adminprof;
	}

	protected function getRoomSubCourseGradingYrsecAdminStuds() {
		$get_room_sub_course_grade_yrsec_admin_studs = [
			'rooms'			=> Room::all(),
			'subjects'		=> Subject::all(),
			'courses' 		=> Course::all(),
			'gradings'		=> Grading::all(),
			'yrsections'	=> Yrsection::all(),
			'admins'		=> Admin::all(),
			'students'		=> Student::all()
		];
		return $get_room_sub_course_grade_yrsec_admin_studs;
	}

	protected function getRoomSubCourseGradingYrsecProfStuds() {
		$get_room_sub_course_grade_yrsec_prof_studs = [
			'rooms'			=> Room::all(),
			'subjects'		=> Subject::all(),
			'courses' 		=> Course::all(),
			'gradings'		=> Grading::all(),
			'yrsections'	=> Yrsection::all(),
			'professors'	=> Professor::all(),
			'students'		=> Student::all(),
		];
		return $get_room_sub_course_grade_yrsec_prof_studs;
	}

	protected function getRoomSubCourseGradingYrsecStudsProfIdProfsubId($id) {
		$get_room_sub_course_grade_yrsec_studs_profid_profsubid = [
			'rooms'			=> Room::all(),
			'subjects'		=> Subject::all(),
			'courses' 		=> Course::all(),
			'gradings'		=> Grading::all(),
			'yrsections'	=> Yrsection::all(),
			'students'		=> Student::all(),
			'professors'	=> Professor::professorIndividual($id),
			'profsubjects'	=> Profsubject::profSubjects($id),
		];
		return $get_room_sub_course_grade_yrsec_studs_profid_profsubid;
	}

	protected function getRoomSubCourseGradingYrsec() {
		$get_room_sub_course_grade_yrsec = [
			'rooms'			=> Room::all(),
			'subjects'		=> Subject::all(),
			'courses' 		=> Course::all(),
			'gradings'		=> Grading::all(),
			'yrsections'	=> Yrsection::all()
		];
		return $get_room_sub_course_grade_yrsec;
	}

	protected function getRoomSubCourseGrading() {
		$get_room_sub_course_grade = [
			'rooms'			=> Room::all(),
			'subjects'		=> Subject::all(),
			'courses' 		=> Course::all(),
			'gradings'		=> Grading::all(),
		];
		return $get_room_sub_course_grade;
	}

	protected function encodeGetYrsecProfsubStudsubGrades($yrsection_id) {
		$encode_get_yrsec_profsub_studsub = [
			'yrsections'				=> Profsubject::distinctSections(Auth::user()->employee_id),
			'profsubjects'  			=> Profsubject::profSubjectsByEmpId(Auth::user()->employee_id),
			'studsubjects'  			=> Studsubject::studentsByCourseSection($yrsection_id),
			'gradeequivs'				=> Gradeequiv::all(),
			'gradings'					=> Grading::all(),
			'rooms'			=> Room::all(),
			'subjects'		=> Subject::all(),
			'courses' 		=> Course::all(),
		];
		return $encode_get_yrsec_profsub_studsub;
	}

	protected function submittedGrades() {
		$submitted_grades = [
			'submittedgrades'	=> Semgrade::submittedGrades(Auth::user()->employee_id),
		];
		return $submitted_grades;
	}

	protected function getAllSubmittedGradesByProfs() {
		$get_all_submitted_grades = [
			'submittedgrades'	=> Semgrade::getAllSubmittedGrades(),
		];
		return $get_all_submitted_grades;
	}

	
}
=======
}
>>>>>>> fae01dbdbaf20d289f5c99ac9fc94a8540e9f109
