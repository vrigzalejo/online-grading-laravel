<?php

class Grading extends Basemodel {

	public function gredeequiv() {
		return $this->hasMany('Gradeequiv');
	}

}