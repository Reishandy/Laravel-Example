<x-layout>
    <x-slot:heading>
        Entry page
    </x-slot:heading>

    <h2 class="font-bold text-2xl">{{ $aircraft->code.' '.$aircraft->name}}</h2>
    <ul>
        <li>Designation: {{ $aircraft->code }}</li>
        <li>Name: {{ $aircraft->name }}</li>
        <li>Type: {{ $aircraft->type }}</li>
        <li>Manufacturer: <span class="text-blue-500 hover:underline">{{ $aircraft->manufacturer->name }}</span>
            - {{ $aircraft->manufacturer->country }}</li>
    </ul>

    <p>Tags: {{ $aircraft->tags->pluck('name')->implode(', ') }}</p>
</x-layout>
