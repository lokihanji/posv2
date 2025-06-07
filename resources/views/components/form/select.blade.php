@props([
    'name',
    'label' => null,
    'id' => null,
    'options' => [],
    'placeholder' => 'Select an option',
    'searchable' => true,
    'variant' => 'default', // default, alternative, outline
    'size' => null, // sm, lg
    'multiple' => false,
    'disabled' => false,
])

@php
    $id = $id ?? $name;

    $variantClass = match ($variant) {
        'alternative' => 'form-control-alternative',
        'outline' => 'form-control-outline',
        default => '',
    };

    $sizeClass = $size === 'sm' ? 'form-control-sm' : ($size === 'lg' ? 'form-control-lg' : '');
@endphp

<div class="form-group">
    @if($label)
        <label for="{{ $id }}" class="form-control-label">{{ $label }}</label>
    @endif

    <select
        name="{{ $name }}{{ $multiple ? '[]' : '' }}"
        wire:model="{{ $name }}"
        id="{{ $id }}"
        {{ $multiple ? 'multiple' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="form-control {{ $variantClass }} {{ $sizeClass }}"
    >
        @if(!$multiple)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $option)
            @if(is_array($option) && isset($option['label'], $option['value']))
                <option value="{{ $option['value'] }}">
                    {{ $option['label'] }}
                </option>
            @endif
        @endforeach
    </select>
</div>

{{-- Embedded Choices.js CSS --}}
<style>
    @import url('https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css');

    .choices__inner {
        border-radius: 0.375rem;
        border: 1px solid #ced4da;
        min-height: auto;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
    }

    .choices__inner:focus,
    .choices__inner.is-focused {
        border-color: #5e72e4;
        box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
    }

    .form-control-alternative + .choices .choices__inner {
        background-color: #f6f9fc;
        border: 0;
        box-shadow: none;
    }

    .form-control-sm + .choices .choices__inner {
        padding: 0.25rem;
        font-size: 0.875rem;
    }

    .form-control-lg + .choices .choices__inner {
        padding: 0.5rem;
        font-size: 1.25rem;
    }

    .choices__list--dropdown {
        z-index: 999;
    }
</style>

{{-- Choices.js Script --}}
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const el = document.getElementById(@js($id));

        // Only initialize Choices.js if NOT used with Livewire
        if (
            el &&
            !el.classList.contains('choices-initialized') &&
            !el.hasAttribute('wire:model')
        ) {
            new Choices(el, {
                searchEnabled: {{ $searchable ? 'true' : 'false' }},
                itemSelectText: '',
                shouldSort: false,
            });
            el.classList.add('choices-initialized');
        }
    });
</script>
