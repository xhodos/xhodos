<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use Hodos\Base\Auth;
use Hodos\Base\Request;
use Hodos\Stack\Template\View;
use mysqli_sql_exception;

/**
 * Create a new hodos controller instance.
 */
class RegisterController extends Controller
{
	public function show():View
	{
		if (Auth::check())
			header('Location: ' . route('home'));
		return view('auth.register');
	}
	
	public function store(Request $request)
	{
		$validator = $request->validate([
			'first_name' => ['bail', /*'exists:users',*/ 'string', 'min:2', 'max:255', 'required'],
			'last_name' => ['bail', 'string', 'min:2', 'max:255', 'required'],
			'phone' => ['bail', 'string', 'min:10', 'max:15', 'required'],
			'gender' => ['bail', 'string', 'min:2', 'max:255', 'required'],
			'email' => ['bail', 'email', 'required'],
			'password' => ['bail', 'min:8', 'max:32', 'required'],
		]);
		
		if ($validator->count())
			return response(['errors' => $validator], 422);
		try {
			$user_exists = User::where(['email' => $request->key('email')])->count();
			if (!$user_exists) {
				$password = password_hash($request->key('password'), PASSWORD_DEFAULT);
				$request->remove(['csrf_token', 'password']);
				$request->add(['password' => $password]);
				$user = User::insert($request->toArray());
				
				if (Auth::login($user))
					return response(['message' => 'Registration successful. Please wait...', 'redirect' => route('home')], 308);
			} else
				return response(['errors' => ['email' => 'User already exists.']], 422);
		} catch (mysqli_sql_exception $exception) {
			return response(['message' => $exception->getMessage()], 500);
		}
		return response(['errors' => ['email' => 'Invalid Credentials.']], 422);
	}
}
