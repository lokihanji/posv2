<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;

class MiniCards extends Component
{
    public $activeCount;
    public $totalCount;
    public $activePercentage;
    public $totalItems;
    public $activeItems;
    public $activePercentageItems;
    public $totalProducts;
    public $activeProducts;
    public $activePercentageProducts;
    public $totalStocks;

    public function mount()
    {
        $this->activeCount = Category::where('status', 'active')->count();
        $this->totalCount = Category::count();
        $this->activePercentage = $this->totalCount > 0
            ? round(($this->activeCount / $this->totalCount) * 100, 2)
            : 0;

        $this->totalItems = Item::count();
        $this->activeItems = Item::where('status', 'active')->count();
        $this->activePercentageItems = $this->totalItems > 0
            ? round(($this->activeItems / $this->totalItems) * 100, 2)
            : 0;

        $this->totalProducts = Product::count();
        $this->activeProducts = Product::where('status', 'active')->count();
        $this->activePercentageProducts = $this->totalProducts > 0
            ? round(($this->activeProducts / $this->totalProducts) * 100, 2)
            : 0;

        // $this->totalStocks = Stock::count();
    }

    public function render()
    {
        return view('livewire.products.mini-cards');
    }
}
