<?php

class Student extends Basemodel {


	public static $rules = [
			'student_id'			=> 'required',
			'lastname'				=> 'required',
			'firstname'				=> 'required',
			'middlename'			=> 'required',
			'contact'				=> 'required|numeric',
			'birthday'				=> 'required',
			'address'				=> 'required',
			'course'				=> 'required',
			'yrsection'				=> 'required',
		];

	protected $fillable = [
		'student_id', 
		'lastname',
		'firstname',
		'middlename',
		'birthday',
		'contact',
		'course',
		'yrsection',
		'address'
	];

	public function studSubject() {
		return $this->hasMany('Studsubject');
	}

	public static function search($keyword) {
		return static::where('student_id', 'LIKE', '%$keyword%')
			->orWhere('lastname', 'LIKE', '%$keyword%')
			->orWhere('firstname', 'LIKE', '%$keyword%')
			->orWhere('middlename', 'LIKE', '%$keyword%')
			->get();
	}

	public static function studentIndividual($id) {
		return static::where('id', '=', $id)->get();
	}

}