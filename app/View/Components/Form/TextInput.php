<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextInput extends Component
{
	public $model;
	public $placeholder;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($model, $placeholder)
	{
		$this->model = $model;
		$this->placeholder = $placeholder;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.form.text-input');
	}
}
