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
                        <x-input-label for="kelases" :value="__('Kelas')" />
                        
                        <select name="kelas_id" id="kelas_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Pilih Kelas</option>
                            @forelse($kelases as $kelas)
                                <option value="{{$kelas->id}}">{{$kelas->nama}}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
                    </div>
                    
                    <div class="mt-4">
                        <x-input-label for="proof" :value="__('proof')" />
                        <x-text-input id="proof" class="block mt-1 w-full" type="file" name="proof" required autofocus autocomplete="proof" />
                        <x-input-error :messages="$errors->get('proof')" class="mt-2" />
                    </div>


                    <div class="mb-4">
                        <x-input-label for="is_paid" :value="__('Sudah Bayar?')" />
                        <select name="is_paid" id="is_paid" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="0">Belum</option>
                            <option value="1">Sudah</option>
                        </select>
                        <x-input-error :messages="$errors->get('is_paid')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="jenis_pembayaran" :value="__('Jenis Pembayaran')" />
                        
                        <select name="jenis_pembayaran" id="jenis_pembayaran" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="Tunai">Tunai</option>
                            <option value="Cash">Cash</option>
                        </select>
                    
                        <x-input-error :messages="$errors->get('jenis_pembayaran')" class="mt-2" />
                    </div>

                    <!-- Tanggal Enroll -->
                    <div class="mt-4">
                        <x-input-label for="tanggal_enroll" :value="__('Tanggal Enroll')" />

                        <div class="relative max-w-sm">
                            <!-- Ikon Kalender -->
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div> 

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
                        <x-text-input id="transaksi" class="block mt-1 w-full" type="number" name="transaksi" :value="old('transaksi')" required autofocus autocomplete="transaksi" />
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
</x-app-layout>
