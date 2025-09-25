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
class LoginController extends Controller
{
	public function show():View
	{
		if (Auth::check())
			header('Location: ' . route('home'));
		return view('auth.login');
	}
	
	public function store(Request $request)
	{
		$validator = $request->validate([
			'email' => ['bail', 'email', 'required'],
			'password' => ['bail', 'min:8', 'max:32', 'required'],
		]);
		
		if ($validator->count())
			return response(['errors' => $validator], 422);
		
		try {
			$user = User::where(['email' => $request->key('email')]);
			if ($user->count()) {
				$user = $user->first();
				if (password_verify($request->key('password'), $user->password) && Auth::login($user))
					return response(['message' => 'Logged in successfully. Please wait...', 'redirect' => route('home')], 308);
			}
		} catch (mysqli_sql_exception $exception) {
			return response(['message' => $exception->getMessage()], 500);
		}
		return response(['errors' => ['email' => 'Invalid Credentials']], 422);
	}
	
	public function destroy(Request $request)
	{
		if (Auth::check()) {
			Auth::destroy();
			header('Location: ' . route('login'));
		}
	}
}
