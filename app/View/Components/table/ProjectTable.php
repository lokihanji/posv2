<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $headers;
    public $projects;

    public function __construct($headers = [], $projects = [])
    {
        $this->headers = $headers;
        $this->projects = $projects;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.project-table');
    }
}
