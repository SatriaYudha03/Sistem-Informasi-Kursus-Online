<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Pekerjaan -->
        <div class="mt-4">
            <x-input-label for="pekerjaan" :value="__('pekerjaan')" />
            <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" :value="old('pekerjaan')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('pekerjaan')" class="mt-2" />
        </div>

        <!-- Telepon -->
        <div class="mt-4">
            <x-input-label for="telepon" :value="__('telepon')" />
            <x-text-input id="telepon" class="block mt-1 w-full" type="text" name="telepon" :value="old('telepon')" required autocomplete="telepon" />
            <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="telepon" :value="__('gender')" />
            <div class="flex items-center mb-4 mt-3">
                <input id="default-radio-1" type="radio" value="Pria" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 mr-5 text-sm font-medium text-gray-900 dark:text-black">Pria</label>

                <input checked id="default-radio-2" type="radio" value="Wanita" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-sm font-medium text-black dark:text-black">Wanita</label>
            </div>
        </div>

        <!-- Avatar -->
        <div class="mt-4">
            <x-input-label for="avatar" :value="__('avatar')" />
            <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" :value="old('avatar')" required autocomplete="avatar" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
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
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
