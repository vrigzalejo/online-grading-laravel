<?php

class Midtermgrade extends Basemodel {

	//public $timestamps = false;

	public function profSubject() {
		return $this->belongsToMany('Profsubject');
	}

	public function studSubject() {
		return $this->belongsToMany('Studsubject');
	}

	
	protected $fillable = [
		'id', 
		'studsubjects_id',
		'profsubjects_id',
		'grade',
		'created_at',
		'updated_at'
	];

}