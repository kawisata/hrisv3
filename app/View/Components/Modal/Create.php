<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class Create extends Component
{
	public $title;
	public $function;
	public $button;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($title, $function, $button)
	{
		$this->title = $title;
		$this->function = $function;
		$this->button = $button;
	}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.create');
    }
}
