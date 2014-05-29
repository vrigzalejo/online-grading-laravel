<?php

class Lock extends Basemodel {

	protected $fillable = [
		'id', 
		'lock',
		'created_at',
		'updated_at',
		'deleted_at'
	];

}