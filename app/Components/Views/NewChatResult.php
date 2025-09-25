<?php

namespace App\Components\Views;

use Hodos\Stack\Template\Component;
use Hodos\Stack\Template\View;

/**
 * Create a new hodos component instance.
 */
class NewChatResult extends Component
{
	public function __construct(public ?array $users)
	{
	}
	
	public function render():View
	{
		return view('components.new-chat-result');
	}
}
