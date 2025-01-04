<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Kursus Saya') }}
            </h2>
        </div>
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

                    <!-- Kategori -->
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

                    <!-- Nama Kursus -->
                    <div>
                        <x-input-label for="name" :value="__('Nama Kursus')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $kursus->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Deskripsi -->
                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full">{{ $kursus->deskripsi }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <!-- Thumbnail -->
                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        @if ($kursus->thumbnail)
                            <img src="{{ asset('storage/' . $kursus->thumbnail) }}" alt="Thumbnail" class="mb-3 w-32 h-32 object-cover rounded">
                        @endif
                    </div>

                    <!-- Detail Kursus -->
                    <div class="mt-4">
                        <x-input-label for="durasi" :value="__('Durasi Kursus')" />
                        {{ $kursus->durasi }} bulan
                    </div>
                    <div class="mt-4">
                        <x-input-label for="start_date" :value="__('Mulai Kursus')" />
                        {{ $kursus->start_date }}
                    </div>
                    <div class="mt-4">
                        <x-input-label for="end_date" :value="__('Selesai Kursus')" />
                        {{ $kursus->end_date }}
                    </div>
                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Harga')" />
                        {{ $kursus->harga }}
                    </div>

                    <!-- Daftar Kelas -->
                    <div class="mt-4">
                        <h2 class="font-semibold text-lg">Daftar Kelas</h2>
                        <ul class="list-disc ml-6">
                            @foreach ($kursus->kelas as $kelas)
                                <li class="mt-2">
                                    <strong>{{ $kelas->nama }}</strong> - Ruangan: {{ $kelas->ruangan }}
                                    <ul class="list-square ml-6 mt-1">
                                        @forelse ($kelas->jadwal as $jadwal)
                                            <li>
                                                <span class="font-medium">Hari:</span> {{ $jadwal->hari }},
                                                <span class="font-medium">Jam:</span> {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                            </li>
                                        @empty
                                            <li>Tidak ada jadwal tersedia untuk kelas ini.</li>
                                        @endforelse
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('peserta.kursuses.enroll', $kursus) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">Beli Kursus</a>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
