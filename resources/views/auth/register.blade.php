<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('register.title')" />
            <select class="form-select block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" aria-label="Default select example" name="title">
               <option value="">Veuillez sélectionner une option</option>
                 @foreach(config('employees.titles') as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                 @endforeach
            </select>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- FirstName -->
        <div>
            <x-input-label for="firstName" :value="__('register.firstName')" />
            <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="firstName" />
            <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
        </div>

        <!-- LastName -->
        <div>
            <x-input-label for="lastName" :value="__('register.lastName')" />
            <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('register.confirm')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Number -->
        <div>
            <x-input-label for="number" :value="__('register.phone')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('number')" required autofocus autocomplete="number" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <!-- Position -->
        <div>
            <x-input-label for="position" :value="__('register.position')" />
            <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required autofocus autocomplete="position" />
            <x-input-error :messages="$errors->get('position')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('register.validation') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('register.register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
