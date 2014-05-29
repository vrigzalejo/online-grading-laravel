<?php

class Semgrade extends Basemodel {

	//public $timestamps = false;

	public function profSubject() {
		return $this->belongsToMany('Profsubject');
	}

	public function studSubject() {
		return $this->belongsToMany('Studsubject');
	}

	public function midtermGrade() {
		return $this->belongsToMany('Midtermgrade');
	}

	public function finalGrade() {
		return $this->belongsToMany('Finalgrade');
	}

	protected $fillable = [
		'studsubjects_id',
		'profsubjects_id',
		'midtermgrades',
		'finalgrades',
		'semgrade',
		'remarks',
		'created_at',
		'updated_at'
	];

	public static function gradeOfStudents($studsubjects_id, $profsubjects_id) {
		
		return static::select(
			'profsubjects.*', 
			'studsubjects.*',
			'yrsections.*', 
			'courses.*',
			'yrsections.*',
			'semgrades.*',
			'subjects.id as subid',
			'subjects.code as subcode',
			'subjects.description as subdes',
			'professors.id',
			'professors.employee_id',
			'professors.lastname as prof_lname',
			'professors.firstname as prof_fname',
			'professors.middlename as prof_mname'
			)
			->join('profsubjects', 'semgrades.profsubjects_id', '=', 'profsubjects_id')
			->join('studsubjects', 'semgrades.studsubjects_id', '=', 'studsubjects.id')
			->join('yrsections', 'yrsections.id', '=', 'profsubjects.yrsection_id')
			->join('courses', 'courses.id', '=', 'profsubjects.course_id')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->where('studsubjects.id', '=', $studsubjects_id)
			->where('profsubjects.id', '=', $profsubjects_id)
			->get();

	}


	public static function submittedGrades($employee_id) {
		
		return static::select(
			'professors.*',
			'profsubjects.*', 
			'studsubjects.*',
			'yrsections.*', 
			'courses.*',
			'students.*',
			'subjects.id as subid',
			'subjects.code as subcode',
			'subjects.description as subdes',
			'semgrades.id',
			'semgrades.studsubjects_id',
			'semgrades.profsubjects_id',
			'semgrades.midtermgrades',
			'semgrades.finalgrades',
			'semgrades.semgrade',
			'semgrades.remarks',
			'semgrades.created_at',
			'semgrades.updated_at as semgradeupdate'
			)
			->join('profsubjects', 'semgrades.profsubjects_id', '=', 'profsubjects_id')
			->join('studsubjects', 'semgrades.studsubjects_id', '=', 'studsubjects.id')
			->join('yrsections', 'yrsections.id', '=', 'profsubjects.yrsection_id')
			->join('courses', 'courses.id', '=', 'profsubjects.course_id')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('students', 'studsubjects.student_id', '=', 'students.id')
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->where('professors.employee_id', '=', $employee_id)
			->orderBy('semgrades.updated_at', 'desc')
			->paginate(5);
	}

	public static function getAllSubmittedGrades() {
		
		return static::select(
			'professors.id',
			'professors.employee_id',
			'professors.lastname as prof_lname',
			'professors.firstname as prof_fname',
			'professors.middlename as prof_mname',
			'profsubjects.*', 
			'studsubjects.*',
			'yrsections.*', 
			'courses.*',
			'students.*',
			'subjects.id as subid',
			'subjects.code as subcode',
			'subjects.description as subdes',
			'semgrades.id',
			'semgrades.studsubjects_id',
			'semgrades.profsubjects_id',
			'semgrades.midtermgrades',
			'semgrades.finalgrades',
			'semgrades.semgrade',
			'semgrades.remarks',
			'semgrades.created_at',
			'semgrades.updated_at as semgradeupdate'
			)
			->join('profsubjects', 'semgrades.profsubjects_id', '=', 'profsubjects_id')
			->join('studsubjects', 'semgrades.studsubjects_id', '=', 'studsubjects.id')
			->join('yrsections', 'yrsections.id', '=', 'profsubjects.yrsection_id')
			->join('courses', 'courses.id', '=', 'profsubjects.course_id')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('students', 'studsubjects.student_id', '=', 'students.id')
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->orderBy('semgrades.updated_at', 'desc')
			->paginate(5);

	}

	public static function viewMyGrades($student_id) {
		
		return static::select(
			'professors.id',
			'professors.employee_id',
			'professors.lastname as prof_lname',
			'professors.firstname as prof_fname',
			'professors.middlename as prof_mname',
			'profsubjects.*', 
			'studsubjects.*',
			'yrsections.*', 
			'courses.*',
			'subjects.id as subid',
			'subjects.code as subcode',
			'subjects.description as subdes',
			'students.id',
			'students.student_id as stdid',
			'students.lastname',
			'students.firstname',
			'students.middlename',
			'students.birthday',
			'students.contact',
			'students.course',
			'students.yrsection',
			'students.address',
			'students.created_at',
			'students.updated_at',
			'semgrades.id',
			'semgrades.studsubjects_id',
			'semgrades.profsubjects_id',
			'semgrades.midtermgrades',
			'semgrades.finalgrades',
			'semgrades.semgrade',
			'semgrades.remarks',
			'semgrades.created_at',
			'semgrades.updated_at as semgradeupdate'
			)
			->join('profsubjects', 'semgrades.profsubjects_id', '=', 'profsubjects_id')
			->join('studsubjects', 'semgrades.studsubjects_id', '=', 'studsubjects.id')
			->join('yrsections', 'yrsections.id', '=', 'profsubjects.yrsection_id')
			->join('courses', 'courses.id', '=', 'profsubjects.course_id')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('students', 'studsubjects.student_id', '=', 'students.id')
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->orderBy('semgrades.updated_at', 'desc')
			->where('students.student_id', '=', $student_id)
			->paginate(5);

	}

}

	