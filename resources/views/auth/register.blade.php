<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <x-form>
            <x-form-field>
                <x-form-label for="username">Username</x-form-label>
                <x-form-div>
                    <x-form-input type="text" name="username" id="username" placeholder="Username"
                                  required></x-form-input>
                </x-form-div>
                <x-form-error name="username"></x-form-error>
            </x-form-field>

            <x-form-field>
                <x-form-label for="email">Email</x-form-label>
                <x-form-div>
                    <x-form-input type="email" name="email" id="email" placeholder="example@example.com"
                                  required></x-form-input>
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

            <x-form-field>
                <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                <x-form-div>
                    <x-form-input type="password" name="password_confirmation" id="password_confirmation"
                                  required></x-form-input>
                </x-form-div>
                <x-form-error name="password_confirmation"></x-form-error>
            </x-form-field>
        </x-form>

        <x-form-button-group class="justify-end">
            <x-button-link-bare href="{{ route('home') }}">Cancel</x-button-link-bare>
            <x-button>Register</x-button>
        </x-form-button-group>
    </form>

</x-layout>

