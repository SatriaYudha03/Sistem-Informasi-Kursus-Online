<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                
                <form method="POST" action="{{ route('admin.jadwals.update', $jadwal) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                
                    <!-- Select Kelas -->
                    <div class="mb-4">
                        <x-input-label for="kelas" :value="__('Kelas')" />
                        <select name="kelas_id" id="kelas_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Kelas</option>
                            @forelse($kelases as $kelas)
                                <option value="{{ $kelas->id }}" {{ $jadwal->kelas_id == $kelas->id ? 'selected' : '' }}>
                                    {{ $kelas->nama }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
                    </div>
                
                    <!-- Select Hari -->
                    <div class="mb-4">
                        <x-input-label for="hari" :value="__('Hari')" />
                        <select name="hari" id="hari" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Hari</option>
                            <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        </select>
                        <x-input-error :messages="$errors->get('hari')" class="mt-2" />
                    </div>
                
                    <!-- Input Jam Mulai dan Jam Selesai -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="jam_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Jam Mulai') }}
                            </label>
                            <input type="time" id="jam_mulai" name="jam_mulai"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                min="09:00" max="18:00" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" required />
                            @error('jam_mulai')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="jam_selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Jam Selesai') }}
                            </label>
                            <input type="time" id="jam_selesai" name="jam_selesai"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                min="09:00" max="18:00" value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" required />
                            @error('jam_selesai')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                
                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Jadwal
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>
