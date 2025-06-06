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
    'value' => null,
])

@php
    $id = $id ?? $name;

    $variantClass = match ($variant) {
        'alternative' => 'form-control-alternative',
        'outline' => 'form-control-outline',
        default => '',
    };

    $sizeClass = $size === 'sm' ? 'form-control-sm' : ($size === 'lg' ? 'form-control-lg' : '');

    $selectedValues = is_array($value) ? $value : [$value];
@endphp

<div class="form-group">
    @if($label)
        <label for="{{ $id }}" class="form-control-label">{{ $label }}</label>
    @endif

    <select
        name="{{ $name }}{{ $multiple ? '[]' : '' }}" class="form-control"
        id="{{ $id }}"
        {{ $multiple ? 'multiple' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="form-control {{ $variantClass }} {{ $sizeClass }}"
    >
        @if(!$multiple)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $option)
            <option value="{{ $option['value'] }}" {{ in_array($option['value'], $selectedValues) ? 'selected' : '' }}>
                {{ $option['label'] }}
            </option>
        @endforeach
    </select>
</div>

{{-- Embedded Choices.js CSS --}}
<style>
    @import url('https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css');

    /* Override Choices.js border styles to match Bootstrap form-control */
    .choices__inner {
        border-radius: 0.375rem; /* Same as .form-control */
        border: 1px solid #ced4da; /* Match Bootstrap's default input border */
        min-height: auto;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
    }

    .choices__inner:focus,
    .choices__inner.is-focused {
        border-color: #5e72e4; /* Match your focused border color */
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
        if (el && !el.classList.contains('choices-initialized')) {
            new Choices(el, {
                searchEnabled: {{ $searchable ? 'true' : 'false' }},
                itemSelectText: '',
                shouldSort: false,
            });
            el.classList.add('choices-initialized');
        }
    });
</script>
