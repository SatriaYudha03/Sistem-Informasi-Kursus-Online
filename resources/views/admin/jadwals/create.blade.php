<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                
                <form method="POST" action="{{ route('admin.jadwals.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="kelas" :value="__('Kelas')" />
                        
                        <select name="kelas_id" id="kelas_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Kelas</option>
                            @forelse($kelases as $kelas)
                                <option value="{{$kelas->id}}">{{$kelas->nama}}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
                    </div>

                    
                    <div class="mb-4">
                        <x-input-label for="hari" :value="__('Hari')" />
                        
                        <select name="hari" id="hari" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    
                        <x-input-error :messages="$errors->get('hari')" class="mt-2" />
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Input Jam Mulai -->
                        <div>
                            <label for="jam_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Jam Mulai') }}
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 flex items-center pe-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input type="time" id="jam_mulai" name="jam_mulai"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('jam_mulai') }}" required />
                            </div>
                            @error('jam_mulai')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <!-- Input Jam Selesai -->
                        <div>
                            <label for="jam_selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Jam Selesai') }}
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 flex items-center pe-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input type="time" id="jam_selesai" name="jam_selesai"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('jam_selesai') }}" required />
                            </div>
                            @error('jam_selesai')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Tambah Jadwal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
