<div>
@props([
    'type' => 'primary',
    'dismissible' => false,
    'icon' => null,
    'title' => null,
    'text' => null, // text color e.g. 'white', 'dark'
])

@php
    $title = $title ?? ucfirst($type) . '!';
    $baseClass = 'alert alert-' . $type;
    if ($dismissible) {
        $baseClass .= ' alert-dismissible fade show';
    }

    $textClass = $text ? 'text-' . $text : '';
@endphp

<div {{ $attributes->merge(['class' => $baseClass . ' ' . $textClass, 'role' => 'alert']) }}>
    @if($icon)
        <span class="alert-icon"><i class="{{ $icon }}"></i></span>
    @endif

    <span class="alert-text">
        <strong>{{ $title }}</strong>
        {{ $slot }}
    </span>

    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    @endif
</div>

</div>