<div>
    @props(['name', 'class' => 'w-6 h-6'])

        @php
            $path = resource_path("svg/remix/{$name}.svg");
        @endphp

        @if (file_exists($path))
            {!! file_get_contents($path) !!}
        @else
            <span class="text-red-500">Icon '{{ $name }}' not found</span>
        @endif

</div>