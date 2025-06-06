<div>
    @props([
    'name',
    'label' => null,
    'id' => null,
    'value' => 1,
    'checked' => false,
    'disabled' => false,
])

@php
    $id = $id ?? $name;
@endphp

<label for="{{ $id }}" class="inline-flex items-center space-x-2 cursor-pointer">
    <input
        type="checkbox"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring focus:ring-indigo-300 focus:ring-opacity-50"
    >
    @if($label)
        <span class="text-sm text-gray-700">{{ $label }}</span>
    @endif
</label>

</div>