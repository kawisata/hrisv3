<?php

namespace App\View\Components\Surat;

use Illuminate\View\Component;

class InputText extends Component
{
	public $title;
	public $modal;
	public $error;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($title, $modal, $error)
	{
		$this->title = $title;
		$this->modal = $modal;
		$this->error = $error;
	}


	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.surat.input-text');
	}
}
