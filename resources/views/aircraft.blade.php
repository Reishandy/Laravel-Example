<x-layout>
    <x-slot:heading>
        List page
    </x-slot:heading>

    <ul>
        @foreach($aircraft as $aircraft_details)
            <li>
                <a href="/aircraft/{{ $aircraft_details->id }}" class="text-blue-500 hover:underline">
                    <strong>{{ $aircraft_details->code.' - '.$aircraft_details->name}}</strong>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
