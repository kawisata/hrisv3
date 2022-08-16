<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class Indigo extends Component
{
	public $modal;
	public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modal, $title)
		{
		$this->modal = $modal;
				$this->title = $title;
		}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
<div>
	<button onclick="Livewire.emit('openModal', '{{ $modal }}')"
		class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg active:bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo">
		{{ $title }}
	</button>

</div>
blade;
    }
}
