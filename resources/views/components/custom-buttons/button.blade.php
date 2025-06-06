<div>
@props([
    'type' => 'default',     // primary, success, danger, etc.
    'variant' => 'outline',  // solid, outline, ghost, link
    'size' => 'md',          // sm, md, lg
    'icon' => null,          // 'plus', 'edit', 'trash', etc.
    'label' => null,
])

@php
    $sizeClass = match($size) {
        'sm' => 'btn-sm',
        'lg' => 'btn-lg',
        default => '',
    };

    $variantClass = match($variant) {
        'solid' => "btn-$type",
        'ghost' => "btn btn-outline-$type border-0 bg-transparent",
        'link' => "btn btn-link text-$type",
        'gradient' =>"btn bg-gradient-$type",
        default => "btn-outline-$type",
    };

    $btnClass = "btn $variantClass $sizeClass";

    $iconSvg = match($icon) {
        'plus' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>',
        'edit' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-9.5 9.5a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l9.5-9.5z"/></svg>',
        'trash' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/><path d="M3 6a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6z"/></svg>',
        default => null,
    };
@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => $btnClass]) }}>
    @if($iconSvg)
        <span class="me-1">{!! $iconSvg !!}</span>
    @endif
    {{ $label }}
</button>
</div>
