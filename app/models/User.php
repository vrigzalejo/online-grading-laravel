<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Basemodel implements UserInterface, RemindableInterface {


	public static $rules = [
			'employee_id'	=> 'required|between:7,16',
			'username'		=> 'required|alpha_num|between:4,32',
			'password'		=> 'required|between:4,32'		
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

<<<<<<< HEAD

	public function admin() {
		return $this->belongsTo('Admin');
	}

	public function professor() {
		return $this->belongsTo('Professor');
	}


	protected $fillable = [
		'employee_id', 'username', 
		'password', 'type',
		'created_at', 'updated_at'
	];

}
=======
}
>>>>>>> fae01dbdbaf20d289f5c99ac9fc94a8540e9f109