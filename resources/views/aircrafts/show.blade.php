<x-layout id="{{ $aircraft->code }}">
    <x-slot:heading>
        Entry page
    </x-slot:heading>

    <x-slot:edit>
        @can('update', $aircraft)
            <x-button-link href="/aircraft/{{ $aircraft->code }}/edit">Edit</x-button-link>
        @endcan
    </x-slot:edit>

    <h2 class="font-bold text-2xl">{{ $aircraft->code.' '.$aircraft->name }}</h2>
    <ul>
        <li>Designation: {{ $aircraft->code }}</li>
        <li>Name: {{ $aircraft->name }}</li>
        <li>Type: {{ $aircraft->type }}</li>
        <li>Manufacturer:
            <a href="/manufacturer/{{ $aircraft->manufacturer->name }}"
               class="text-blue-500 hover:underline">{{ $aircraft->manufacturer->name }}</a>
        </li>
    </ul>

    <p>Tags: {{ $aircraft->tags->pluck('name')->implode(', ') }}</p>
</x-layout>
