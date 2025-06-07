<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $label;
    public $name;
    public $rows;
    public $value;
    public $class;

    public function __construct(
        $id = null,
        $label = null,
        $name = null,
        $rows = 3,
        $value = '',
        $class = ''
    ) {
        $this->id = $id ?? $name;
        $this->label = $label;
        $this->name = $name;
        $this->rows = $rows;
        $this->value = $value;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea');
    }
}
