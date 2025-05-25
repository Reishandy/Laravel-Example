<x-layout>
    <x-slot:heading>
        List page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($aircrafts as $aircraft)
            <a href="/aircraft/{{ $aircraft->id }}"
               class="block px-4 py-6 border border-gray-400 rounded-lg">
                <div>
                    <div class="text-sm text-blue-500">{{ $aircraft->manufacturer->name }}</div>

                    <div class="text-lg">
                        <span class="font-bold">{{ $aircraft->code }}</span> {{ $aircraft->name}}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
