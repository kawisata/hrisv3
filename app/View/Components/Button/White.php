<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class White extends Component
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
		class="text-indigo-700 hover:text-white border border-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:border-indigo-500 dark:text-indigo-500 dark:hover:text-white dark:hover:bg-indigo-600 dark:focus:ring-indigo-800">
		{{ $title }}
	</button>

</div>
blade;
    }
}
