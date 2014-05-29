<?php

class Course extends Basemodel {

	public $timestamps = false;

	public function profSubject() {
		return $this->hasMany('Profsubject');
	}

	public static $rules = [
			'code'					=> 'required',
			'college_code'			=> 'required',
			'description'			=> 'required',
	];

	protected $fillable = [
		'code', 
		'college_code',
		'description',
	];

}