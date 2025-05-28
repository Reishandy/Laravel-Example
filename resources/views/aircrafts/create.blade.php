<x-layout>
    <x-slot:heading>
        Create page
    </x-slot:heading>

    <form method="POST" action="/aircraft">
        @csrf

        <x-form>
            <x-slot:description>
                <h2 class="text-base/7 font-semibold text-gray-900">Add a new Aircraft</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Input the Aircraft details below to be added.</p>
            </x-slot:description>

            <x-form-field>
                <x-form-label for="type">Code</x-form-label>
                <x-form-div>
                    <select name="type" id="type"
                            class="block bg-white border-0 py-1.5 pr-3 pl-1 text-base text-gray-900 focus:outline-none sm:text-sm/6">
                        @foreach($typePrefixes as $type => $prefix)
                            <option value="{{ $type }}">{{ $prefix }}</option>
                        @endforeach
                    </select>
                    <x-form-input type="text" name="code" id="code" placeholder="16" required></x-form-input>
                </x-form-div>
                <x-form-error name="code"></x-form-error>
            </x-form-field>

            <x-form-field>
                <x-form-label for="name">Name</x-form-label>
                <x-form-div>
                    <x-form-input type="text" name="name" id="name" placeholder="Fighting Falcon"
                                  required></x-form-input>
                </x-form-div>
                <x-form-error name="name"></x-form-error>
            </x-form-field>

            <x-form-field>
                <x-form-label for="manufacturer">Manufacturer</x-form-label>
                <x-form-div>
                    <select name="manufacturer_id" id="manufacturer"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 bg-white border-0 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </x-form-div>
                <x-form-error name="manufacturer"></x-form-error>
            </x-form-field>

            <x-form-field>
                <x-form-label for="tags">Tags</x-form-label>
                <x-form-div class="flex-wrap gap-3 py-2">
                    @foreach($tags as $tag)
                        <label class="inline-flex items-center text-sm text-gray-900 mr-4">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                   class="form-checkbox text-indigo-600 focus:ring-indigo-500 rounded border-gray-300 mr-1">
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </x-form-div>
                <x-form-error name="tags"></x-form-error>
            </x-form-field>
        </x-form>

        <x-form-button-group class="justify-end">
            <x-button-link-bare href="/aircraft">Cancel</x-button-link-bare>
            <x-button>Save</x-button>
        </x-form-button-group>
    </form>

</x-layout>
