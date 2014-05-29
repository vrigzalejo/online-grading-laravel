<?php

class Gradeequiv extends Basemodel {

	public $timestamps = false;

	public function grading() {
		return $this->belongsTo('Grading');
	}


}