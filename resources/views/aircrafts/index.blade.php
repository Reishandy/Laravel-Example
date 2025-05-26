<x-layout>
    <x-slot:heading>
        List page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($aircrafts as $aircraft)
            <div class="block px-4 py-6 border border-gray-400 rounded-lg hover:bg-gray-300">
                <div class="text-sm text-blue-500 hover:underline">
                    <a href="/manufacturer/{{ $aircraft->manufacturer->id }}">
                        {{ $aircraft->manufacturer->name }}
                    </a>
                </div>

                <div class="text-lg">
                    <a href="/aircraft/{{ $aircraft->id }}">
                        <span class="font-bold">{{ $aircraft->code }}</span> {{ $aircraft->name}}
                    </a>
                </div>
            </div>
        @endforeach

        <div class="flex justify-end">
            <a href="/aircraft/create"
               class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create
            </a>
        </div>

        <div>
            {{ $aircrafts->links() }}
        </div>
    </div>
</x-layout>
