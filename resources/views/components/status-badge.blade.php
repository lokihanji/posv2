@props(['status', 'config'])

@php
    $statusConfig = $config[$status] ?? ['color' => 'secondary', 'label' => ucfirst($status)];
    $color = $statusConfig['color'];
    $label = $statusConfig['label'];
@endphp

<span class="badge badge-sm bg-gradient-{{ $color }}">{{ $label }}</span> 