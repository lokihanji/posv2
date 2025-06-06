@props([
    'size' => 'md',
    'color' => 'white',
    'columns' => null,
    'header' => null
])

@php
    $sizeClasses = match($size) {
        'sm' => 'p-2',
        'md' => 'p-3',
        'lg' => 'p-4',
        default => 'p-3'
    };

    $colorClasses = match($color) {
        'primary' => 'bg-primary text-white',
        'secondary' => 'bg-secondary text-white',
        'warning' => 'bg-warning text-dark',
        'danger' => 'bg-danger text-white',
        'info' => 'bg-info text-white',
        'light' => 'bg-light text-dark',
        'dark' => 'bg-dark text-white',
        default => 'bg-white text-dark'
    };

    $gridClass = $columns ? 'row row-cols-' . $columns . ' g-3' : '';
@endphp

<div class="card {{ $colorClasses }} mt-5">
    @if($header)
        <div class="card-header border-bottom">
            <h5 class="mb-0">{{ $header }}</h5>
        </div>
    @endif

    <div class="card-body {{ $sizeClasses }}">
        <div class="{{ $gridClass }}">
            {{ $slot }}
        </div>
    </div>
</div>
