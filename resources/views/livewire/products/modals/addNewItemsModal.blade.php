<x-modals.modal 
    id="addItems" 
    title="Add New Item"
    size="lg"
>
    <x-card size="lg" columns="1">

        {{-- Item Name --}}
        <div class="col">
            <x-form.input name="itemName" label="Item Name" />
        </div>

        {{-- Category Dropdown --}}
        <div class="col">
            <x-form.select
                name="itemCategoryId"
                label="Category"
                :options="$categories"
                option-label="name"
                option-value="id"
                searchable="true"
            />
        </div>

        {{-- Unit --}}
        <div class="col">
            <x-form.input name="itemUnit" label="Unit" placeholder="e.g. pcs, box, kg" />
        </div>

        {{-- Status --}}
        <div class="col">
            <x-form.select
                name="itemStatus"
                label="Status"
                :options="[
                    ['label' => 'Active', 'value' => 'active'],
                    ['label' => 'Inactive', 'value' => 'inactive'],
                ]"
            />
        </div>

        {{-- Description --}}
        <div class="col col-span-2">
            <x-form.textarea name="itemDescription" label="Description" rows="3" />
        </div>

    </x-card>

    <x-slot name="footer">
        <x-custom-buttons.button data-bs-dismiss="modal" type="danger" variant="gradient" label="Cancel" />
        <x-custom-buttons.button data-bs-dismiss="modal" wire:click="saveItem" type="primary" variant="gradient" label="Save" />
    </x-slot>
</x-modals.modal>
