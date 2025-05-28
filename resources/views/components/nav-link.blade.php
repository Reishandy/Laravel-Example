@props(['active' => false]) {{-- Make attributes not visible to the end user --}}

@if($active)
    <a {{ $attributes->merge(['class' => 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium', 'aria-current' => 'page']) }}> {{ $slot }}</a>
@else
    <a {{ $attributes->merge(['class' => 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium', 'aria-current' => 'false']) }}> {{ $slot }}</a>

@endif
