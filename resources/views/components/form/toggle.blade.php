<div>
  @props([
    'name',
    'label' => null,
    'id' => null,
    'checked' => false,
    'disabled' => false,
    'value' => 1,
])

@php
    $id = $id ?? $name;
@endphp

<div class="flex items-center space-x-3">
    <label class="relative inline-flex items-center cursor-pointer">
        <input
            type="checkbox"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            class="sr-only peer"
            {{ $checked ? 'checked' : '' }}
            {{ $disabled ? 'disabled' : '' }}
        >
        <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-indigo-600 transition duration-300 relative">
            <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-all duration-300 peer-checked:translate-x-5"></div>
        </div>
    </label>
    @if($label)
        <label for="{{ $id }}" class="text-sm text-gray-700">{{ $label }}</label>
    @endif
</div>

</div>