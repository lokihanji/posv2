@props(['editButton'])

<div class="d-flex gap-2">
    <button 
        type="button" 
        class="btn btn-sm btn-info" 
        data-bs-toggle="modal" 
        data-bs-target="#editProduct"
        wire:click="editProduct({{ $editButton['productId'] }})"
    >
        <i class="fas fa-edit"></i>
    </button>
</div> 