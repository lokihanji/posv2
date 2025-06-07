@props([
    'id' => 'modal',
    'title' => '',
    'showFooter' => true,
    'showSaveButton' => true,
    'saveButtonText' => 'SAVE USER',
    'closeButtonText' => 'CLOSE',
    'size' => 'default',
])

@php
    $modalSizeClass = [
        'sm' => 'modal-sm',
        'default' => '',
        'lg' => 'modal-lg',
        'xl' => 'modal-xl'
    ][$size] ?? '';
@endphp

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{ $modalSizeClass }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>

            @if($showFooter)
            <div class="modal-footer">
                {{-- If a footer slot is provided, show it; otherwise show default buttons --}}
                @if (isset($footer))
                    {{ $footer }}
                @else
                    <button type="button" class="btn btn-link text-secondary text-uppercase" data-bs-dismiss="modal">
                        {{ $closeButtonText }}
                    </button>

                    @if ($showSaveButton)
                        <button type="button" class="btn bg-gradient-primary text-uppercase ms-3" wire:click="save">
                            {{ $saveButtonText }}
                        </button>
                    @endif
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
