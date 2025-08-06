<?php

namespace App\Components\Views;

use Hodos\Stack\Template\Component;
use Hodos\Stack\Template\View;

class Nav extends Component
{
	public function __construct(public string $tag = 'boss')
	{
	}
	
	public function render():View
	{
		return view('components.nav');
	}
}
