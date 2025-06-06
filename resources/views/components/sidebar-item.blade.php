@props([
    'route' => '',
    'title' => '',
    'icon' => '',
    'isActive' => false,
    'isCustomIcon' => false
])

<li class="nav-item">
    <a class="nav-link {{ $isActive ? 'active' : '' }}" href="{{ $route }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @if($isCustomIcon)
                {!! $icon !!}
            @else
                <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    {!! $icon !!}
                </svg>
            @endif
        </div>
        <span class="nav-link-text ms-1">{{ $title }}</span>
    </a>
</li> 