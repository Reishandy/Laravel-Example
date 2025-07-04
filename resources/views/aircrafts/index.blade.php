<x-layout>
    <x-slot:heading>
        Aircraft page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($aircrafts as $aircraft)
            <div class="block px-4 py-6 border border-gray-400 rounded-lg hover:bg-gray-300">
                <div class="text-sm text-blue-500 hover:underline">
                    <a href="/manufacturer/{{ $aircraft->manufacturer->name }}">
                        {{ $aircraft->manufacturer->name }}
                    </a>
                </div>

                <div class="text-lg">
                    <a href="/aircraft/{{ $aircraft->code }}">
                        <span class="font-bold">{{ $aircraft->code }}</span> {{ $aircraft->name}}
                    </a>
                </div>
            </div>
        @endforeach

        <div>
            {{ $aircrafts->links() }}
        </div>
    </div>
</x-layout>
