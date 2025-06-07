<div>
    @if (session()->has('message'))
        <x-alerts.alert type="{{ session('type') ?? 'success' }}" text="white">
            {{ session('message') }}
        </x-alerts.alert>
    @endif

    <x-card size="lg"  columns="1" header="Product Table">
        <x-slot name="headerActions">
            <x-custom-buttons.button type="primary" variant="gradient" data-bs-toggle="modal" data-bs-target="#addProduct" label="Product" />
            <x-custom-buttons.button type="secondary" variant="gradient" data-bs-toggle="modal" data-bs-target="#addItems" label="Items" />
            <x-custom-buttons.button type="success" variant="gradient" data-bs-toggle="modal" data-bs-target="#addCategory" label="Category" />
        </x-slot>
            <x-table.product-sales-table :headers="$headers" :products="$products" sort="most_sold" />
    </x-card>
    @include('livewire.products.modals.addProductModal')
    @include('livewire.products.modals.addNewItemsModal')
    @include('livewire.products.modals.addNewCategoryModal')
    @include('livewire.products.modals.editProductModal')
    
</div>
