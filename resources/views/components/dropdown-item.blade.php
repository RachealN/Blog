@props(['active' => false])
@php
    $class = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:text-white';
    @endphp
<a {{ $attributes(['class' => $class ]) }}>{{ $slot }}</a>
