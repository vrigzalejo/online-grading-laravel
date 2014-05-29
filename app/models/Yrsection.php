<?php

class Yrsection extends Basemodel {

	public $timestamps = false;

	public static $rules = [
		'yrsection'	=> 'required|between:2,16',
	];

	protected $fillable = [
		'yrsection'
	];

	public function profSubject() {
		return $this->hasMany('Profsubject');
	}



}