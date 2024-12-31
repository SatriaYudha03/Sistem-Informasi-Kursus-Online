<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Materi pada kursus') }}
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

                <hr class="my-5">
                <form method="POST" action="{{ route('admin.kursus.add_materi.save', $kursus->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="file_materi" :value="__('File Materi')" />
                        <x-text-input id="file_materi" class="block mt-1 w-full" type="text" name="file_materi" :value="old('file_materi')" required autofocus autocomplete="file_materi" />
                        <x-input-error :messages="$errors->get('file_materi')" class="mt-2" />
                    </div>


                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Tambah Materi
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
