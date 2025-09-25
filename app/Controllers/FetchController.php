<?php

namespace App\Controllers;

use App\Components\Views\NewChatResult;
use App\Models\User;
use Hodos\Base\Auth;
use Hodos\Base\Request;
use Hodos\Stack\Template\View;

/**
 * Create a new hodos controller instance.
 */
class FetchController extends Controller
{
	public function getUsers(Request $request):object|array|string|null
	{
		$search = [];
		if (!empty($request->query))
			$search = User::whereLike(['first_name' => "'%$request->query%'"])->orWhereLike(['last_name' => "'%$request->query%'"])->whereNot(['id' => Auth::user()->id])->get();
		$results = new NewChatResult($search);
		return response(['data' => $results->output()]);
	}
}
