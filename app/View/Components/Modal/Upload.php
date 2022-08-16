<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class Upload extends Component
{
	public $title;
	public $function;
	public $model;
	public $iteration;
	public $button;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $function, $model, $iteration, $button)
		{
				$this->title = $title;
				$this->function = $function;
				$this->model = $model;
				$this->iteration = $iteration;
				$this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.upload');
    }
}
