<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        @isset($description)
            <div class="mb-5">
                {{ $description }}
            </div>
        @endisset

        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            {{ $slot }}
        </div>
    </div>
</div>
