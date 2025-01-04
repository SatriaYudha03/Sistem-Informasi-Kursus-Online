<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kursus Saya') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($enrolls as $enroll)

                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3 w-full">
                        <img src="{{ Storage::url($enroll->kelas->kursus->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex justify-between w-full">
                            <div>
                                {{--  $enroll->kelas->kursus->kategori->name  --}}
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $enroll->kelas->kursus->name }} </h3> 
                                <p class="text-slate-500 text-sm">{{$enroll->kelas->kursus->kategori->name}}</p>
                                
                            </div>

                            {{-- <div>
                                <h3 class="text-indigo-950 text-xl font-bold">{{$enroll->kelas->kursus->durasi}} bulan</h3>
                            </div>

                            <div>
                                <h3 class="text-indigo-950 text-xl font-bold mr-10">Rp.{{$enroll->kelas->kursus->harga}}</h3>
                            </div> --}}
                        </div>
                    </div>
                   
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('peserta.kursuses_show', $enroll->kelas->kursus) }}" class="font-bold py-4 px-6 bg-yellow-700 text-white rounded-full">
                            Detail
                        </a>
                        {{-- <a href="{{ route('peserta.kursuses.enroll', $kursus) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Enroll
                        </a> --}}
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
