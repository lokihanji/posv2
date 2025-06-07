<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductManagement extends Component
{
   
    public $categoryName;
    public $categoryStatus ;
    public $closeCategoryModal =false;

    public $itemName;
    public $itemCategoryId;
    public $itemUnit;
    public $itemStatus;
    public $itemDescription;

    public $productName;
    public $productSku;
    public $productItemId;
    public $productPrice;
    public $productQuantity;
    public $productStatus;
    public $productDescription;

    public $editProductName;
    public $editProductSku;
    public $editProductItemId;
    public $editProductPrice;
    public $editProductQuantity;
    public $editProductStatus;
    public $editProductDescription;
    
    public $item = [
        'name' => '',
        'category_id' => '',
        'unit' => '',
        'status' => 'active',
        'description' => '',
    ];
    
    public $product = [
        'name' => '',
        'sku' => '',
        'item_id' => '',
        'price' => 0,
        'quantity' => 0,
        'status' => 'active',
        'description' => '',
    ];
    
    public $categories;
    public $items = [];
    
    public function mount()
    {
        $this->categories = Category::select('id', 'name')
        ->where('status', 'active')
                ->get()
                ->map(fn ($category) => [
                    'label' => $category->name,
                    'value' => $category->id
                ])
                ->toArray();
        
            $this->items = Item::select('id', 'name')
                ->where('status', 'active')
                ->get()
                ->map(fn ($item) => [
                    'label' => $item->name,
                    'value' => $item->id
                ])
                ->toArray();
    }
    
    public function render()
    {
        $headers = [
            ['label' => 'Product'],
            ['label' => 'Sales'],
            ['label' => 'Stock'],
            ['label' => 'Sold'],
            ['label' => 'Status'],
            ['label' => 'Action'],
        ];

        $products = Product::with('item') // optional if you want item name
            ->select('id', 'name', 'sales', 'stock', 'sold', 'status')
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => asset('assets/img/product-sample/default.png'), // Optional: you can add an `image` field later
                    'sales' => $product->sales,
                    'stock' => $product->stock,
                    'sold' => $product->sold,
                    'status' => $product->stock > 0 ? 'available' : 'out of stock',
                ];
            });

        return view('livewire.products.product-management', compact('headers', 'products'));
    
    }

// ========================Start Save Data========================//
    public function saveCategory()
    {
        try {
            logger()->debug('Category Input Data:', [
                'name' => $this->categoryName,
                'status' => $this->categoryStatus,
            ]);

            $this->categoryStatus = (string) $this->categoryStatus;

            $this->validate([
                'categoryName' => ['required', 'string', 'max:255'],
                'categoryStatus' => ['required', 'string', 'max:255'],
            ]);

            logger()->debug('Validation passed, attempting to create category');

            Category::create([
                'name' => $this->categoryName,
                'status' => $this->categoryStatus,
            ]);

            $this->categoryName = '';
            $this->categoryStatus = 'active';
            
            $this->mount(); // Refresh data
            session()->flash('message', 'Category created successfully!');
            session()->flash('type', 'success');

        } catch (\Exception $e) {
            logger()->error('Error saving category:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            session()->flash('message', 'Error saving category: ' . $e->getMessage());
            session()->flash('type', 'danger');
        }
    }
    
    public function saveItem(){
        try {
            logger()->debug('Item Input Data:', [
                'name' => $this->itemName,
                'category_id' => $this->itemCategoryId,
                'unit' => $this->itemUnit,
                'status' => $this->itemStatus,
                'description' => $this->itemDescription,
            ]);

            $this->validate([
                'itemName' => ['required', 'string', 'max:255'],
                'itemCategoryId' => ['required', 'string', 'max:255'],
                'itemUnit' => ['required', 'string', 'max:255'],
                'itemStatus' => ['required', 'string', 'max:255'],
                'itemDescription' => ['nullable', 'string'],
            ]);

            logger()->debug('Validation passed, attempting to create item');

            Item::create([
                'name' => $this->itemName,
                'category_id' => $this->itemCategoryId,
                'unit' => $this->itemUnit,
                'status' => $this->itemStatus,
                'description' => $this->itemDescription,
            ]);

            $this->itemName = '';
            $this->itemCategoryId = '';
            $this->itemUnit = '';
            $this->itemStatus = 'active';
            $this->itemDescription = '';

            $this->mount(); // Refresh data
            session()->flash('message', 'Item created successfully!');
            session()->flash('type', 'success');

        } catch (\Exception $e) {
            logger()->error('Error saving item:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            session()->flash('message', 'Error saving item: ' . $e->getMessage());
            session()->flash('type', 'danger');
        }
    }

    public function saveProduct(){
        try {
            logger()->debug('Product Input Data:', [
                'name' => $this->productName,
                'sku' => $this->productSku,
                'item_id' => $this->productItemId,
                'price' => $this->productPrice,
                'quantity' => $this->productQuantity,
                'status' => $this->productStatus,
                'description' => $this->productDescription,
            ]);

            $this->validate([
                'productName' => ['required', 'string', 'max:255'], 
                'productSku' => ['required', 'string', 'max:255'],
                'productItemId' => ['required', 'string', 'max:255'],
                'productPrice' => ['required', 'numeric', 'min:0'],
                'productQuantity' => ['required', 'integer', 'min:0'],
                'productStatus' => ['required', 'string', 'max:255'],
                'productDescription' => ['nullable', 'string'],
            ]);

            logger()->debug('Validation passed, attempting to create product');

            Product::create([
                'name' => $this->productName,
                'sku' => $this->productSku,
                'item_id' => $this->productItemId,
                'price' => $this->productPrice,
                'stock' => $this->productQuantity,
                'status' => $this->productStatus,
                'description' => $this->productDescription,
            ]);

            $this->productName = '';
            $this->productSku = '';
            $this->productItemId = '';
            $this->productPrice = 0;
            $this->productQuantity = 0;
            $this->productStatus = 'active';
            $this->productDescription = '';

        } catch (\Exception $e) {
            logger()->error('Error saving product:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            session()->flash('message', 'Error saving product: ' . $e->getMessage());
            session()->flash('type', 'danger');
        }
    }
// ========================End Save Data========================//
// ========================End Edit Data========================//
    public function editProduct($id){
        $product = Product::find($id);
        $this->editProductName = $product->name;
        $this->editProductSku = $product->sku;
        $this->editProductItemId = $product->item_id;
        $this->editProductPrice = $product->price;
        $this->editProductQuantity = $product->stock;
        $this->editProductStatus = $product->status;
        $this->editProductDescription = $product->description;

        $this->dispatchBrowserEvent('show-edit-modal');
    }
}
