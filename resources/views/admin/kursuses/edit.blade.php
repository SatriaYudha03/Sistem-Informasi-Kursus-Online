<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kursus') }}
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
                
                <form method="POST" action="{{ route('admin.kursuses.update', $kursus) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-input-label for="kategori" :value="__('Kategori')" />
                        
                        <select name="kategori_id" id="kategori_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Kategori</option>
                            @forelse($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kursus->kategori_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->name }}
                                </option>
                            @empty
                                <option value="">Tidak ada kategori</option>
                            @endforelse
                        </select>
                        

                        <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="name" :value="__('Nama Kursus')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $kursus->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full">{{ $kursus->deskripsi }}
                        </textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                    
                        @if ($kursus->thumbnail)
                            <img src="{{ asset('storage/' . $kursus->thumbnail) }}" alt="Thumbnail" class="mb-3 w-32 h-32 object-cover rounded">
                        @endif
                    
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="durasi" :value="__('Durasi Kursus')" />
                        <x-text-input id="durasi" class="block mt-1 w-full" type="text" name="durasi" value="{{ $kursus->durasi }}" required autofocus autocomplete="durasi" />
                        <x-input-error :messages="$errors->get('durasi')" class="mt-2" />
                    </div>

                    <!-- Mulai Kursus -->
                    <div class="mt-4">
                        <x-input-label for="start_date" :value="__('Mulai Kursus')" />
                    
                        <div class="relative max-w-sm">
                            <!-- Ikon Kalender -->
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div> 
                    
                            <!-- Input Datepicker -->
                            <x-text-input 
                                id="start_date" 
                                name="start_date" 
                                type="text" 
                                datepicker 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                placeholder="Pilih Tanggal"
                                value="{{ $kursus->start_date }}"
                                required 
                                autofocus 
                                autocomplete="start_date" 
                            />
                        </div>
                    
                        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                    </div>
                    
                    <!-- Selesai Kursus -->
                    <div class="mt-4">
                        <x-input-label for="start_date" :value="__('Selesai Kursus')" />
                    
                        <div class="relative max-w-sm">
                            <!-- Ikon Kalender -->
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div> 
                    
                            <!-- Input Datepicker -->
                            <x-text-input 
                                id="end_date" 
                                name="end_date" 
                                type="text" 
                                datepicker 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                placeholder="Pilih Tanggal"
                                value="{{ $kursus->end_date }}"
                                required 
                                autofocus 
                                autocomplete="end_date" 
                            />
                        </div>
                    
                        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" value="{{ $kursus->harga }}" required autofocus autocomplete="harga" />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Kursus
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
