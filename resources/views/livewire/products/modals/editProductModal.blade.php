<x-modals.modal 
    id="editProduct" 
    title="Update Product"
    size="lg"
>
    <x-card size="lg" columns="1">

        {{-- Product Name --}}
        <div class="col">
            <x-form.input wire:model="editProductName" name="editProductName" label="Product Name"/>
        </div>

        {{-- SKU (Stock Keeping Unit)--}}
        <div class="col">
            <x-form.input wire:model="editProductSku" name="editProductSku" label="Stock Keeping Unit" />
        </div>

        {{-- Item Dropdown --}}
        <div class="col">
            <x-form.select
                wire:model="editProductItemId"
                name="editProductItemId"
                label="Item"
                :options="$items"
                option-label="label"
                option-value="value"
                searchable="true"
            />
        </div>

        {{-- Price --}}
        <div class="col">
            <x-form.input wire:model="editProductPrice" name="editProductPrice" label="Price" type="number" step="0.01" />
        </div>

        {{-- Quantity --}}
        <div class="col">
            <x-form.input wire:model="editProductQuantity" name="editProductQuantity" label="Quantity" type="number" />
        </div>

        {{-- Status --}}
        <div class="col">
            <x-form.select
                wire:model="editProductStatus"
                name="editProductStatus"
                label="Status"
                :options="[
                    ['label' => 'Active', 'value' => 'active'],
                    ['label' => 'Inactive', 'value' => 'inactive'],
                ]"
            />
        </div>

        {{-- Description --}}
        <div class="col col-span-2">
            <x-form.textarea wire:model="editProductDescription" name="editProductDescription" label="Description" rows="3" />
        </div>

    </x-card>

    <x-slot name="footer">
        <x-custom-buttons.button data-bs-dismiss="modal" type="danger" variant="gradient" label="Cancel" />
        <x-custom-buttons.button data-bs-dismiss="modal" wire:click="updateProduct" type="primary" variant="gradient" label="Save Changes" />
    </x-slot>
</x-modals.modal>
