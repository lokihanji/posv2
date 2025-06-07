<x-modals.modal 
    id="addProduct" 
    title="Add New Product"
    size="lg"
>
    <x-card size="lg" columns="1">

        {{-- Product Name --}}
        <div class="col">
            <x-form.input name="productName" label="Product Name" />
        </div>

        {{-- SKU (Stock Keeping Unit)--}}
        <div class="col">
            <x-form.input name="productSku" label="Stock Keeping Unit" />
        </div>

        {{-- Item Dropdown --}}
        <div class="col">
            <x-form.select
                name="productItemId"
                label="Item"
                :options="$items"
                option-label="label"
                option-value="value"
                searchable="true"
            />
        </div>

        {{-- Price --}}
        <div class="col">
            <x-form.input name="productPrice" label="Price" type="number" step="0.01" />
        </div>

        {{-- Quantity --}}
        <div class="col">
            <x-form.input name="productQuantity" label="Quantity" type="number" />
        </div>

        {{-- Status --}}
        <div class="col">
            <x-form.select
                name="productStatus"
                label="Status"
                :options="[
                    ['label' => 'Active', 'value' => 'active'],
                    ['label' => 'Inactive', 'value' => 'inactive'],
                ]"
            />
        </div>

        {{-- Description --}}
        <div class="col col-span-2">
            <x-form.textarea name="productDescription" label="Description" rows="3" />
        </div>

    </x-card>

    <x-slot name="footer">
        <x-custom-buttons.button data-bs-dismiss="modal" type="danger" variant="gradient" label="Cancel" />
        <x-custom-buttons.button data-bs-dismiss="modal" wire:click="saveProduct" type="primary" variant="gradient" label="Save" />
    </x-slot>
</x-modals.modal>
