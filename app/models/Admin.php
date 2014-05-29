<?php

class Admin extends Basemodel {


	public static $rules = [
			'employee_id'			=> 'required',
			'lastname'				=> 'required',
			'firstname'				=> 'required',
			'middlename'			=> 'required',
			'contact'				=> 'required|numeric',
			'email'					=> 'required|email',
			'address'				=> 'required',
			'birthday'				=> 'required',
	];

	protected $fillable = [
		'employee_id', 
		'lastname',
		'firstname',
		'middlename',
		'birthday',
		'contact',
		'email',
		'address',
	];

	public static function search($keyword) {
		return static::where('employee_id', 'LIKE', '%$keyword%')
			->orWhere('lastname', 'LIKE', '%$keyword%')
			->orWhere('firstname', 'LIKE', '%$keyword%')
			->orWhere('middlename', 'LIKE', '%$keyword%')
			->get();
	}

	public static function adminIndividual($id) {
		return static::where('id','=', $id)->get();
	}


}