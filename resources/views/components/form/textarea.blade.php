<div>
    <div class="form-group">
        @if($label)
            <label for="{{ $id }}">{{ $label }}</label>
        @endif
        <textarea
            id="{{ $id }}"
            name="{{ $name }}"
            class="form-control {{ $class }}"
            rows="{{ $rows }}"
            {{ $attributes }}
        >{{ old($name, $slot ?: $value) }}</textarea>
    </div>

</div>