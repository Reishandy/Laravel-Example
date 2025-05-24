<x-layout>
    <x-slot:heading>
        Entry page
    </x-slot:heading>

    <h2 class="font-bold text-2xl">{{ $aircraft_details['code'] }}</h2>
    <p>
        Is called affectionally as {{ $aircraft_details['name'] }}
    </p>
</x-layout>
