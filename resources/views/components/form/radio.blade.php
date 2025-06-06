<div>
   @props([
    'name',
    'label',
    'id' => null,
    'value',
    'checked' => false,
    'disabled' => false,
])

@php
    $id = $id ?? $name . '_' . md5($value);
@endphp

<label for="{{ $id }}" class="inline-flex items-center space-x-2 cursor-pointer">
    <input
        type="radio"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="h-5 w-5 text-indigo-600 border-gray-300 focus:ring-indigo-300 focus:ring-opacity-50"
    >
    <span class="text-sm text-gray-700">{{ $label }}</span>
</label>

</div>