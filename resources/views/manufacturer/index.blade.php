<x-layout>
    <x-slot:heading>
        Manufacturer page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($manufacturers as $manufacturer)
            <div class="block px-4 py-6 border border-gray-400 rounded-lg hover:bg-gray-300">
                <div class="text-sm text-gray-500">
                    {{ $manufacturer->country }}
                </div>

                <div class="text-lg">
                    <a href="/manufacturer/{{ $manufacturer->name }}">
                        {{ $manufacturer->name }}
                    </a>
                </div>
            </div>
        @endforeach

        <div>
            {{ $manufacturers->links() }}
        </div>
    </div>
</x-layout>
