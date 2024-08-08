<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
   
    public $checked;
    public $value;
    public $name;
    public $label;

    public function __construct($checked = false, $value, $name, $label)
    {
       $this->checked = $checked;
        $this->value = $value;
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkbox');
    }
}
