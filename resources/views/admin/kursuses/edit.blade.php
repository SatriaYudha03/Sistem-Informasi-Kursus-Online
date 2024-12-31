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
                        <x-input-label for="lama_belajar" :value="__('Lama Belajar')" />
                        <x-text-input id="lama_belajar" class="block mt-1 w-full" type="text" name="lama_belajar" value="{{ $kursus->lama_belajar }}" required autofocus autocomplete="lama_belajar" />
                        <x-input-error :messages="$errors->get('lama_belajar')" class="mt-2" />
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
