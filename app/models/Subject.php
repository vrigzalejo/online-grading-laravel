<?php

class Subject extends Basemodel {

	public $timestamps = false;

	public static $rules = [
			'code'	=> 'required|between:2,8',
			'description'		=> 'required|between:4,50'	
	];

	protected $fillable = [
		'code', 'description'
	];

	public function profSubject() {
		return $this->hasMany('Profsubject');
	}

}