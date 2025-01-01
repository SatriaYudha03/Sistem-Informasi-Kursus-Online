<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelas Baru') }}
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
                
                <form method="POST" action="{{ route('admin.kelases.store') }}" enctype="multipart/form-data">
                    @csrf


                    <div>
                        <x-input-label for="nama" :value="__('Nama Kelas')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="kursus" :value="__('Kursus')" />
                        
                        <select name="kursus_id" id="kursus_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Kursus</option>
                            @forelse($kursuses as $kursus)
                                <option value="{{$kursus->id}}">{{$kursus->name}}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('kursus')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="instruktur" :value="__('Instruktur')" />
                        
                        <select name="instruktur_id" id="instruktur_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Instruktur</option>
                            @foreach($instrukturs as $instruktur)
                                <option value="{{ $instruktur->id }}">{{ $instruktur->user->name }}</option>
                            @endforeach
                        </select>
                    
                        <x-input-error :messages="$errors->get('instruktur_id')" class="mt-2" />
                    </div>
                    
                    <div class="">
                        <x-input-label for="ruangan" :value="__('Ruangan')" />
                        
                        <select name="ruangan" id="ruangan" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Ruang Kelas</option>
                            <option value="101">101</option>
                            <option value="102">102</option>
                            <option value="103">103</option>
                            <option value="103">201</option>
                            <option value="103">202</option>
                            <option value="103">203</option>
                        </select>
                    
                        <x-input-error :messages="$errors->get('ruangan')" class="mt-2" />
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Tambah Kelas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
