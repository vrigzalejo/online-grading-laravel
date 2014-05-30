<?php

class Room extends Basemodel {

	public $timestamps = false;

	public static $rules = [
			'room'	=> 'required|between:3,5',
	];


	protected $fillable = [
		'room'
	];

	public function profSubject() {
		return $this->hasMany('Profsubject');
	}

}