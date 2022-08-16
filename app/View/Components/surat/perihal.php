<?php

namespace App\View\Components\surat;

use Illuminate\View\Component;

class perihal extends Component
{
	public $title, $vtitle;
	public $error;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($title, $vtitle, $error)
	{
		$this->title = $title;
		$this->vtitle = $vtitle;
		$this->error = $error;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.surat.perihal');
	}
}
