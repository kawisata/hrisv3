<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class Edit extends Component
{
	public $modal, $variable, $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modal, $variable, $data)
    {
        $this->modal = $modal;
				$this->variable = $variable;
				$this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.edit');
    }
}
