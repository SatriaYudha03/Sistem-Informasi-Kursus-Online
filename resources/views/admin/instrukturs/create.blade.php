<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Instruktur') }}
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
                
                <form method="POST" action="{{ route('admin.instrukturs.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div>
                        <x-input-label for="email" :value="__('email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="emailllll" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="bidang_keahlian" :value="__('Bidang Keahlian')" />
                        
                        <select name="bidang_keahlian" id="bidang_keahlian" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Kategori</option>
                            @forelse($kategoris as $kategori)
                                <option value="{{$kategori->name}}">{{$kategori->name}}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('bidang_keahlian')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Tambah Instruktur
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
