<x-layout>
    <x-slot:heading>
        Entry page
    </x-slot:heading>

    <h2 class="font-bold text-2xl">{{ $manufacturer->name }}</h2>
    <ul>
        <li>Origin: {{ $manufacturer->country }}</li>
        <li>Aircraft count: {{ $manufacturer->aircrafts->count() }}</li>
        <li>
            Aircraft:
            @foreach($manufacturer->aircrafts as $aircraft)
                <a href="/aircraft/{{ $aircraft->id }}" class="text-blue-500 hover:underline">
                    {{ $aircraft->code }} {{ $aircraft->name}}@if(!$loop->last), @endif
                </a>
            @endforeach
        </li>
    </ul>
</x-layout>
