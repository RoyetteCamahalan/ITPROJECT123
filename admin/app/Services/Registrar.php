<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'fname' => 'required|max:255',
			'lname' => 'required|max:50',
			'position' => 'required|max:50',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$access=1;
		if($data['position']=='SVS'){
			$access=2;
		}
		return User::create([
			'fname' => $data['fname'],
			'mname' => $data['mname'],
			'lname' => $data['lname'],
			'position' =>$data['position'],
			'access_level' =>$access,
			'branch_id' =>1,
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
