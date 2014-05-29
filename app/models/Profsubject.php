<?php

class Profsubject extends Basemodel {

	//public $timestamps = false;

	public static $rules = [
			'yrsection_id'			=> 'required',
			'subject_id'			=> 'required',
			'room_id'				=> 'required',
			'timestarts_at'			=> 'required',
			'timeends_at'			=> 'required',
	];

	protected $fillable = [
		'professor_id', 'course_id', 'yrsection_id', 'subject_id', 'room_id', 'timestarts_at', 'timeends_at'
	];

	public function professor() {
		return $this->belongsToMany('Professor');
	}

	public function course() {
		return $this->belongsToMany('Course');
	}

	public function yrSection() {
		return $this->belongsToMany('Yrsection');
	}

	public function subject() {
		return $this->belongsToMany('Subject');
	}

	public function room() {
		return $this->belongsToMany('Room');
	}

	public function studSubject() {
		return $this->hasMany('Studsubject');
	}

	public function midtermGrade() {
		return $this->hasMany('Midtermgrade');
	}

	public function finalGrade() {
		return $this->hasMany('Finalgrade');
	}

	public static function profSubjects($id) {
		return static::select(
			'profsubjects.id as profsub_id',
			'profsubjects.professor_id as profsub_profid',
			'profsubjects.course_id as profsub_courseid',
			'profsubjects.yrsection_id as profsub_yrsecid',
			'profsubjects.subject_id as profsub_subid', 
			'profsubjects.room_id as profsub_roomid',
			'profsubjects.timestarts_at',
			'profsubjects.timeends_at',
			'profsubjects.created_at as profsub_created',
			'profsubjects.updated_at as profsub_updated',
			'profsubjects.deleted_at',
			'courses.id', 'courses.code', 
			'yrsections.*', 'rooms.*', 'subjects.id', 'professors.*',
			'subjects.code as subjectcode', 
			'subjects.description as subjectdescription')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('courses', 'profsubjects.course_id', '=', 'courses.id')
			->join('yrsections', 'profsubjects.yrsection_id', '=', 'yrsections.id')
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->join('rooms', 'profsubjects.room_id', '=', 'rooms.id')
			->where('profsubjects.professor_id', '=', $id)
			->paginate(5);
	}

	public static function profSubjectsAll() {
		return static::select(
			'profsubjects.id as profid',
			'profsubjects.professor_id',
			'profsubjects.course_id',
			'profsubjects.yrsection_id',
			'profsubjects.subject_id',
			'profsubjects.room_id',
			'profsubjects.timestarts_at',
			'profsubjects.timeends_at',
		 	'courses.id', 'courses.code', 
			'yrsections.*', 'rooms.*', 'professors.*',
			'subjects.id', 
			'subjects.code as subjectcode', 
			'subjects.description as subjectdescription')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('courses', 'profsubjects.course_id', '=', 'courses.id')
			->join('yrsections', 'profsubjects.yrsection_id', '=', 'yrsections.id')
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->join('rooms', 'profsubjects.room_id', '=', 'rooms.id')
			->paginate(5);
	}


	public static function profSubjectsByEmpId($employee_id) {
		return static::select('profsubjects.*', 'courses.id', 'courses.code', 
			'yrsections.*', 'rooms.*', 'subjects.id', 
			'professors.*',
			'subjects.code as subjectcode', 
			'subjects.description as subjectdescription')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('courses', 'profsubjects.course_id', '=', 'courses.id')
			->join('yrsections', 'profsubjects.yrsection_id', '=', 'yrsections.id')
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->join('rooms', 'profsubjects.room_id', '=', 'rooms.id')
			->where('professors.employee_id', '=', $employee_id)
			->paginate(5);
	}

	public static function distinctSections($employee_id) {
		
		return static::select('profsubjects.*', 'courses.*',
			'yrsections.*', 'rooms.*', 'subjects.id', 
			'professors.*',
			'subjects.code as subjectcode', 
			'subjects.description as subjectdescription')
			->join('professors', 'profsubjects.professor_id', '=', 'professors.id')
			->join('courses', 'profsubjects.course_id', '=', 'courses.id')
			->join('yrsections', 'profsubjects.yrsection_id', '=', 'yrsections.id')
			->join('subjects', 'profsubjects.subject_id', '=', 'subjects.id')
			->join('rooms', 'profsubjects.room_id', '=', 'rooms.id')
			->groupBy('profsubjects.yrsection_id')
			->where('professors.employee_id', '=', $employee_id)			
			->get();

	}
}