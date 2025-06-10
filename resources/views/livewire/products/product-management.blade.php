<div class="container-fluid py-4">
    @if (session()->has('message'))
        <x-alerts.alert type="{{ session('type') ?? 'success' }}" text="white">
            {{ session('message') }}
        </x-alerts.alert>
    @endif
@livewire('products.mini-cards')
    <x-card size="lg"  columns="1" header="Product Table">
        <x-slot name="headerActions">
            <x-custom-buttons.button type="primary" variant="gradient" data-bs-toggle="modal" data-bs-target="#addProduct" label="Product" />
            <x-custom-buttons.button type="secondary" variant="gradient" data-bs-toggle="modal" data-bs-target="#addItems" label="Items" />
            <x-custom-buttons.button type="success" variant="gradient" data-bs-toggle="modal" data-bs-target="#addCategory" label="Category" />
        </x-slot>
            <x-table.responsive-table 
                :headers="[
                    ['label' => 'Product'],
                    ['label' => 'Sales'],
                    ['label' => 'Stock'],
                    ['label' => 'Status'],
                    ['label' => 'Actions']
                ]"
                :rows="$products->map(function($product) {
                    return [
                        ['content' => $product['name']],
                        ['content' => $product['sales']],
                        ['content' => $product['stock']],
                        ['content' => view('components.status-badge', [
                            'status' => $product['status'],
                            'config' => [
                                'available' => ['color' => 'success', 'label' => 'Available'],
                                'low_stock' => ['color' => 'warning', 'label' => 'Low Stock'],
                                'unavailable' => ['color' => 'secondary', 'label' => 'Unavailable']
                            ]
                        ])->render()],
                        ['content' => view('components.action-buttons', [
                            'editButton' => [
                                'productId' => $product['id']
                            ]
                        ])->render()]
                    ];
                })"
            />
    </x-card>
    @include('livewire.products.modals.addProductModal')
    @include('livewire.products.modals.addNewItemsModal')
    @include('livewire.products.modals.addNewCategoryModal')
    @include('livewire.products.modals.editProductModal')
    
</div>

