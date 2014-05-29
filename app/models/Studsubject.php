<?php

class Studsubject extends Basemodel {

	//public $timestamps = false;

	public static $rules = [
			'profsubjects_id'	=> 'required',
	];

	protected $fillable = [
		'student_id', 'profsubjects_id', 'created_at', 'updated_at'
	];


	public function profSubject() {
		return $this->belongsTo('Profsubject');
	}

	public function student() {
		return $this->belongsTo('Student');
	}

	public function midtermGrade() {
		return $this->hasMany('Midtermgrade');
	}

	public function finalGrade() {
		return $this->hasMany('Finalgrade');
	}

	public static function studentSubjects($id) {
		return static::select(
			'studsubjects.id as studsub_id',
			'studsubjects.student_id as studsub_studid',
			'studsubjects.profsubjects_id as studsub_profsubid',
			'studsubjects.created_at as studsub_created',
			'studsubjects.updated_at as studsub_updated',
			'studsubjects.deleted_at as studsub_deleted',
			'profsubjects.*',
			'students.*', 
			'professors.*', 
			'courses.id', 'courses.code', 
			'yrsections.*', 
			'rooms.*',
			'subjects.id', 
			'subjects.code as subjectcode', 
			'subjects.description as subjectdescription' )
			->join('profsubjects', 'studsubjects.profsubjects_id', '=', 'profsubjects.id')	
			->join('students', 'studsubjects.student_id', '=', 'students.id')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('courses', 'profsubjects.course_id', '=', 'courses.id')
			->join('yrsections', 'profsubjects.yrsection_id', '=', 'yrsections.id')
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->join('rooms', 'profsubjects.room_id', '=', 'rooms.id')	
			->where('students.id', '=', $id)
			->paginate(5);
	}

	public static function studentsByCourseSection($yrsectionid) {
		return static::select(
			'studsubjects.id as stdid',
			'studsubjects.student_id',
			'studsubjects.profsubjects_id',
			'subjects.id as subid',
			'subjects.code as subcode',
			'subjects.description as subdes',
			'students.id',
			'students.student_id as studid',
			'students.lastname', 'students.firstname',
			'students.middlename', 'students.course',
			'profsubjects.id as profid', 
			'profsubjects.professor_id',
			'yrsections.id as yrsecid',
			'yrsections.yrsection as yrsec')
			->join('students', 'studsubjects.student_id', '=', 'students.id')
			->join('profsubjects', 'studsubjects.profsubjects_id', '=', 'profsubjects.id')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('yrsections', 'profsubjects.yrsection_id', '=', 'yrsections.id')			
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->where('yrsections.id', '=', $yrsectionid)
			->paginate(5);
	}

}