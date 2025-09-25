<?php

namespace App\Controllers;

use Hodos\Base\Request;
use Hodos\Stack\Template\View;

/**
 * Create a new hodos controller instance.
 */
class MessageController extends Controller
{
	public function store(Request $request):View
	{
		if ($request->message) {
			$message = $request->message;
			
			dd($message);
		}
	}
}
