<x-layout>
    <x-slot:heading>
        Edit {{ $aircraft->code }} page
    </x-slot:heading>

    <form method="POST" action="/aircraft/{{ $aircraft->code }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                @if($errors->any())
                    <div class="w-full text-white bg-red-500 mt-7">
                        <div class="container flex flex-col items-center justify-center px-6 py-4 mx-auto">
                            <div class="flex items-center justify-center mb-2">
                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current mr-2">
                                    <path
                                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                    </path>
                                </svg>
                                <span class="font-semibold">Please fix the following errors:</span>
                            </div>
                            <ul class="list-disc pl-5 text-sm text-white">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="type" class="block text-sm/6 font-medium text-gray-900">Code</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <select name="type" id="type"
                                        class="block bg-white border-0 py-1.5 pr-3 pl-1 text-base text-gray-900 focus:outline-none sm:text-sm/6">
                                    @foreach($typePrefixes as $type => $prefix)
                                        <option
                                            value="{{ $type }}" {{ $aircraft->type == $type ? 'selected' : '' }}>{{ $prefix }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="code" id="code"
                                       class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="16" value="{{ explode("-", $aircraft->code)[1] }}" required>
                            </div>
                            @error('code')
                            <p class="text-xs text-red-500 font-semibold mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="name" id="name"
                                       class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="Fighting Falcon" value="{{ $aircraft->name }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="manufacturer" class="block text-sm/6 font-medium text-gray-900">Manufacturer</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <select name="manufacturer_id" id="manufacturer"
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 bg-white border-0 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                                    @foreach($manufacturers as $manufacturer)
                                        <option
                                            value="{{ $manufacturer->id }}" {{ $aircraft->manufacturer_id == $manufacturer->id ? 'selected' : '' }}>{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label class="block text-sm/6 font-medium text-gray-900">Tags</label>
                        <div class="mt-2">
                            <div
                                class="flex flex-wrap gap-3 items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 py-2">
                                @php
                                    $selectedTags = $aircraft->tags->pluck('id')->toArray();
                                @endphp
                                @foreach($tags as $tag)
                                    <label class="inline-flex items-center text-sm text-gray-900 mr-4">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                            {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}>
                                        {{ $tag->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
                <button form="delete-form" type="submit" class="text-sm/6 font-semibold text-red-500 hover:text-red-700">
                    Delete
                </button>
            </div>

            <div class="flex items-center gap-x-6">
                <a href="/aircraft/{{ $aircraft->code }}"
                   class="text-sm/6 font-semibold text-gray-500 hover:text-gray-500">Cancel</a>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update
                </button>
            </div>
        </div>
    </form>

    <form method="POST" action="/aircraft/{{ $aircraft->code }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
