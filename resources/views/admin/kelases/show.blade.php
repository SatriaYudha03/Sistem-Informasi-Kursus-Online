<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kelas : {{ $kelas->nama }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col gap-y-5">
                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama Peserta</th>
                                <th scope="col" class="px-6 py-3">Pekerjaan</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Telepon</th>
                                <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesertas as $peserta)
                            <tr class="odd:bg-white even:bg-gray-50 border-b">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $peserta->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $peserta->user->pekerjaan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $peserta->user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $peserta->user->telepon }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $peserta->user->gender }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col gap-y-5 mt-24">
                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Hari</th>
                                <th scope="col" class="px-6 py-3">Jam mulai</th>
                                <th scope="col" class="px-6 py-3">Jam selesai</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwals as $jadwal)
                            <tr class="odd:bg-white even:bg-gray-50 border-b">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $jadwal->hari }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $jadwal->jam_mulai }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $jadwal->jam_selesai }}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
