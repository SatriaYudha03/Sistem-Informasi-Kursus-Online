<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Pengguna') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
                <form method="POST" action="{{ route('admin.pesertas.update', $peserta) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $peserta->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
            
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $peserta->email }}" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Pekerjaan -->
                    <div class="mt-4">
                        <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />
                        <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" value="{{ $peserta->pekerjaan }}" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('pekerjaan')" class="mt-2" />
                    </div>

                    <!-- Telepon -->
                    <div class="mt-4">
                        <x-input-label for="telepon" :value="__('Telepon')" />
                        <x-text-input id="telepon" class="block mt-1 w-full" type="text" name="telepon" value="{{ $peserta->telepon }}" required autocomplete="telepon" />
                        <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
                    </div>

                   <!-- Gender -->
                    <div class="mt-4">
                        <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                        <div class="flex items-center mb-4 mt-3">
                            <!-- Radio Button Pria -->
                            <input 
                                id="default-radio-1" 
                                type="radio" 
                                value="Pria" 
                                name="gender" 
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                @checked($peserta->gender === 'Pria') 
                            >
                            <label for="default-radio-1" class="ms-2 mr-5 text-sm font-medium text-gray-900 dark:text-black">
                                Pria
                            </label>

                            <!-- Radio Button Wanita -->
                            <input 
                                id="default-radio-2" 
                                type="radio" 
                                value="Wanita" 
                                name="gender" 
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                @checked($peserta->gender === 'Wanita') 
                            >
                            <label for="default-radio-2" class="ms-2 text-sm font-medium text-black dark:text-black">
                                Wanita
                            </label>
                        </div>
                    </div>

                    <!-- Avatar -->
                    <div class="mt-4">
                        <x-input-label for="avatar" :value="__('Avatar')" /> {{ $peserta->avatar }}
                        <img src="{{ $peserta->avatar ? Storage::url($peserta->avatar) : asset("images/avatar-default.png") }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" value="{{ $peserta->avatar }}" required autocomplete="avatar" />
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        value="{{ $peserta->password }}"
                                        required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" 
                                        value="{{ $peserta->password }}"
                                        required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
