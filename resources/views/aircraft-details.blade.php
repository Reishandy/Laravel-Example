<x-layout>
    <x-slot:heading>
        Entry page
    </x-slot:heading>

    <h2 class="font-bold text-2xl">{{ $aircraft_details->code.' '.$aircraft_details->name}}</h2>
    <ul>
        <li>Designation: {{ $aircraft_details->code }}</li>
        <li>Name: {{ $aircraft_details->name }}</li>
        <li>Type: {{ $aircraft_details->type }}</li>
        <li>Manufacturer: {{ $manufacturer->name }} - {{ $manufacturer->country }}</li>
    </ul>
</x-layout>
