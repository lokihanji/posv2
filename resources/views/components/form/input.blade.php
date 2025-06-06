{{-- resources/views/components/form/input.blade.php --}}

@props([
    'name',
    'label' => null,
    'id' => null,
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'icon' => null,
    'disabled' => false,
    'isValid' => false,
    'isInvalid' => false,
    'grouped' => false,
    'alternative' => false,
    'size' => null, // options: sm, lg
])

@php
    $id = $id ?? $name;
    $sizeClass = $size === 'sm' ? 'form-control-sm' : ($size === 'lg' ? 'form-control-lg' : '');
    $baseClass = 'form-control' .
        ($alternative ? ' form-control-alternative' : '') .
        ($sizeClass ? ' ' . $sizeClass : '') .
        ($isValid ? ' is-valid' : '') .
        ($isInvalid ? ' is-invalid' : '');
@endphp

<div class="form-group {{ $isValid ? 'has-success' : '' }} {{ $isInvalid ? 'has-danger' : '' }}">
    @if($label)
        <label for="{{ $id }}" class="form-control-label">{{ $label }}</label>
    @endif

    @if($grouped)
        <div class="input-group {{ $alternative ? 'input-group-alternative' : '' }} mb-4">
            @if($icon)
                <span class="input-group-text"><i class="{{ $icon }}"></i></span>
            @endif
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $id }}"
                value="{{ old($name, $value) }}"
                placeholder="{{ $placeholder }}"
                {{ $disabled ? 'disabled' : '' }}
                {{ $attributes->merge(['class' => $baseClass]) }}
            >
        </div>
    @else
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge(['class' => $baseClass]) }}
        >
    @endif
</div>
