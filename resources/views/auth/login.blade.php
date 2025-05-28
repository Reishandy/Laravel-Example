<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <x-form>

            <x-form-field>
                <x-form-label for="email">Email</x-form-label>
                <x-form-div>
                    <x-form-input type="email" name="email" id="email" placeholder="example@example.com"
                                  :value="old('email')" required></x-form-input>
                </x-form-div>
                <x-form-error name="email"></x-form-error>
            </x-form-field>

            <x-form-field>
                <x-form-label for="password">Password</x-form-label>
                <x-form-div>
                    <x-form-input type="password" name="password" id="password"
                                  required></x-form-input>
                </x-form-div>
                <x-form-error name="password"></x-form-error>
            </x-form-field>
        </x-form>

        <x-form-button-group class="justify-end">
            <x-button-link-bare href="{{ route('home') }}">Cancel</x-button-link-bare>
            <x-button>Log In</x-button>
        </x-form-button-group>
    </form>

</x-layout>

