<?php

namespace App\View\Components\surat;

use Illuminate\View\Component;

class inputletter extends Component
{
    public $title;
    public $modal;
    public $letter;
    public $error;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $modal, $letter, $error)
    {
        $this->title = $title;
        $this->modal = $modal;
        $this->letter = $letter;
        $this->error = $error;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.surat.inputletter');
    }
}
