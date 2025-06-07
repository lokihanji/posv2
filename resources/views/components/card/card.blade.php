@props([
    'size' => 'md',
    'color' => 'white',
    'columns' => null,
    'header' => null,
])

{{-- No need for @aware here; slots are accessible via $attributes --}}

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

<div {{ $attributes->merge(['class' => "card $colorClasses"]) }}>


    @if($header)
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $header }}</h5>

            {{-- Render headerActions only if slot is provided --}}
            <div class="d-flex justify-content-end align-items-center gap-2">
            {{ $headerActions ?? '' }}
            </div>
        </div>
    @endif

    <div class="card-body {{ $sizeClasses }}">
        <div class="{{ $gridClass }}">
            {{ $slot }}
        </div>
    </div>

</div>
