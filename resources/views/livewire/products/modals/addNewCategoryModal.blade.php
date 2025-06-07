<x-modals.modal 
    id="addCategory" 
    title="Add New Category"
    size="lg"
>
    <x-card size="lg" columns="1">

        {{-- Category Name --}}
        <div class="col">
            <x-form.input name="categoryName" label="Category Name" wire:model="categoryName"/>
        </div>

        {{-- Status Dropdown --}}
        <div class="col">
            <x-form.select
                name="categoryStatus"
                label="Status"
                wire:model="categoryStatus"
                :options="[
                    ['label' => 'Active', 'value' => 'active'],
                    ['label' => 'Inactive', 'value' => 'inactive'],
                ]"
            />
        </div>

    </x-card>

    <x-slot name="footer">
        <x-custom-buttons.button data-bs-dismiss="modal" wire:click="closeCategoryModal" type="danger" variant="gradient" label="Cancel" />
        <x-custom-buttons.button data-bs-dismiss="modal" wire:click="saveCategory" type="primary" variant="gradient" label="Save" />
    </x-slot>
    
</x-modals.modal>
