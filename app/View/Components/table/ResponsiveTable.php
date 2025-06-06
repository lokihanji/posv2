<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResponsiveTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $headers;
    public $rows;

    public function __construct($headers = [], $rows = [])
    {
        $this->headers = $headers;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.responsive-table');
    }
}
