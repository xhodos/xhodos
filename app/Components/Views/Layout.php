<?php

namespace App\Components\Views;

use Hodos\Stack\Template\Component;
use Hodos\Stack\Template\View;

/**
* Create a new hodos component instance.
*/
class Layout extends Component {
	public function __construct() {}

	public function render():View
	{
		return view('components.layout');
	}
}