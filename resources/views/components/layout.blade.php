@props(['code' => false])

<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Example</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full">

<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="size-8" src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg"
                             alt="Laravel">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            {{-- Using ':' befora attributes evalute thaat attributes instead of providing string --}}
                            <x-nav-link href="/" :active="request()->is('/')">Hello</x-nav-link>
                            <x-nav-link href="/what" :active="request()->is('what')">What</x-nav-link>
                            <x-nav-link href="/aircraft" :active="request()->is('aircraft')">Aircraft</x-nav-link>
                            <x-nav-link href="/manufacturer" :active="request()->is('manufacturer')">Manufacturers</x-nav-link>
                            <x-nav-link href="/welcome"> Welcome</x-nav-link>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6 space-x-4">
                        @guest
                            <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">Log In</x-nav-link>
                            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-nav-link>
                        @endguest
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link href="/" :active="request()->is('/')">Hello</x-nav-link>
                <x-nav-link href="/what" :active="request()->is('what')">What</x-nav-link>
                <x-nav-link href="/aircraft" :active="request()->is('aircraft')">Aircraft</x-nav-link>
                <x-nav-link href="/manufacturer" :active="request()->is('manufacturer')">Manufacturers</x-nav-link>
                <x-nav-link href="/welcome"> Welcome</x-nav-link>
            </div>
            <div class="border-t border-gray-700 pt-4 pb-3">
                <div class="flex items-center justify-between px-5">
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">{{ $name ?? 'Ruxury' }}</div>
                        <div class="text-sm font-medium text-gray-400">akbar@reishandy.my.id</div>
                    </div>

                    <div class="ml-4 flex items-center md:ml-6 space-x-4">
                        @guest
                            <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">Log In</x-nav-link>
                            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-nav-link>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>

            <div class="mt-4 sm:mt-0">
                @if(request()->is('aircraft'))
                    <x-button-link href="/aircraft/create">Add</x-button-link>
                @endif

                @if(request()->is('aircraft/*') && !request()->is('aircraft/create') && !request()->is('aircraft/*/edit'))
                    <x-button-link href="/aircraft/{{ request()->segment(2) }}/edit">Edit</x-button-link>
                @endif
            </div>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>

</body>
</html>
