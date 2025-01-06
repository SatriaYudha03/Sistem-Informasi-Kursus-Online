<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Enroll') }}
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
                
                <form method="POST" action="{{ route('admin.enrolls.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email Peserta')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="kelas_id" :value="__('Kelas')" />
                        
                        <select name="kelas_id" id="kelas_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Kelas</option>
                            @forelse($kelases as $kelas)
                                <option value="{{$kelas->id}}" data-harga="{{$kelas->kursus->harga}}">{{$kelas->nama}}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
                    </div>
                    
                    <div class="mt-4 mb-4">
                        <x-input-label for="proof" :value="__('Proof')" />
                        <x-text-input id="proof" class="block mt-1 w-full" type="file" name="proof" required autofocus autocomplete="proof" />
                        <x-input-error :messages="$errors->get('proof')" class="mt-2" />
                    </div>


                    <div class="mb-4">
                        <x-input-label for="is_paid" :value="__('Status Pembayaran')" />
                        <select name="is_paid" id="is_paid" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="0">Menunggu Verifikasi</option>
                        </select>
                        <x-input-error :messages="$errors->get('is_paid')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="jenis_pembayaran" :value="__('Jenis Pembayaran')" />
                        
                        <select name="jenis_pembayaran" id="jenis_pembayaran" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="Tunai">Tunai</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    
                        <x-input-error :messages="$errors->get('jenis_pembayaran')" class="mt-2" />
                    </div>

                    <!-- Tanggal Enroll -->
                    <div class="mt-4 mb-4">
                        <x-input-label for="tanggal_enroll" :value="__('Tanggal Enroll')" />

                        <div class="relative max-w-sm">
                            <!-- Input Datepicker -->
                            <x-text-input 
                                id="tanggal_enroll" 
                                name="tanggal_enroll" 
                                type="date" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                value="{{ old('tanggal_enroll', now()->format('Y-m-d')) }}" 
                                required 
                                autofocus 
                                autocomplete="tanggal_enroll" 
                            />
                        </div>

                        <x-input-error :messages="$errors->get('tanggal_enroll')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="transaksi" :value="__('Total Transaksi')" />
                        <x-text-input id="transaksi" class="block mt-1 w-full" type="number" name="transaksi" readonly />
                        <x-input-error :messages="$errors->get('transaksi')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Tambah Peserta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kelasDropdown = document.getElementById('kelas_id');
            const transaksiField = document.getElementById('transaksi');

            kelasDropdown.addEventListener('change', function () {
                const selectedOption = kelasDropdown.options[kelasDropdown.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');

                if (harga) {
                    transaksiField.value = harga;
                } else {
                    transaksiField.value = '';
                }
            });
        });
    </script>
</x-app-layout>
