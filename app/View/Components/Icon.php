<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\File;

class Icon extends Component
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return function (array $data) {
            $path = resource_path("svg/icons/{$this->name}.svg");

            if (File::exists($path)) {
                $svg = File::get($path);

                
                $svg = preg_replace('/<\?xml.*?\?>/', '', $svg);

                // Return raw SVG (make sure to NOT escape)
                return $svg;
            }

            return 'Icon not found: ' . e($this->name) . '';
        };
    }
}
