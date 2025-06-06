<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductSalesTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $headers;
    public $products;
    public $sort;

    public function __construct($headers = [], $products = [], $sort = null)
    {
        $this->headers = $headers;
        $this->products = collect($products);

        if ($sort === 'most_sold') {
            $this->products = $this->products->sortByDesc('sales');
        } elseif ($sort === 'least_sold') {
            $this->products = $this->products->sortBy('sales');
        } elseif ($sort === 'stock') {
            $this->products = $this->products->sortByDesc('stock');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.product-sales-table');
    }
}
