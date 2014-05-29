<?php

class Basemodel extends Eloquent {

	protected $softDelete = true;

	public static function validate($data = NULL, $rules = NULL) {
		if(!$rules) {
			return Validator::make($data, static::$rules);
		// $data = inputs
		} else {
			return Validator::make($data, $rules);
		// $data = inputs, $rules = validate other inputs
		}
	}

	// Relationships to other models
	// hasMany = 1 to many, belongsTo = many to 1
}