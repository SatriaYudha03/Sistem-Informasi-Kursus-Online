<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Kursus') }}
            </h2>
            <a href="{{ route('admin.kursuses.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Tambah Kursus
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($kursuses as $kursus)

                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3 w-full">
                        <img src="{{ Storage::url($kursus->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex justify-between w-full">
                            <div>
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $kursus->name }} </h3> 
                                <p class="text-slate-500 text-sm">{{$kursus->kategori->name}}</p>
                                
                            </div>

                            <div>
                                <h3 class="text-indigo-950 text-xl font-bold">{{$kursus->lama_belajar}} bulan</h3>
                            </div>

                            <div>
                                <h3 class="text-indigo-950 text-xl font-bold mr-10">Rp.{{$kursus->harga}}</h3>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Peserta</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{$kursus->peserta->count()}}</h3>
                    </div> --}}
                    {{-- <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Video</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{$kursus->video_kursuses->count()}}</h3>
                    </div> --}}
                    {{-- <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Teacher</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{$kursus->instruktur->user->name}}</h3>
                    </div> --}}
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.kursuses.show', $kursus) }}" class="font-bold py-4 px-6 bg-yellow-700 text-white rounded-full">
                            Materi
                        </a>
                        <a href="{{ route('admin.kursuses.edit', $kursus) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action="{{ route('admin.kursuses.destroy', $kursus) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p>
                    Belum ada kelas yang ditambahkan
                </p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
