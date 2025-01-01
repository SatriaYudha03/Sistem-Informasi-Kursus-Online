<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Jadwal') }}
            </h2>
            <a href="{{ route('admin.jadwals.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Tambah Jadwal
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col gap-y-5">
                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Kelas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Hari
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jam Mulai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jam Selesai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        @foreach ($jadwals as $jadwal)       
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                             <td class="px-6 py-4">
                                {{ $jadwal->kelas->nama }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $jadwal->hari }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $jadwal->jam_mulai }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $jadwal->jam_selesai }} 
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex"></div>
                                    <a href="{{ route('admin.jadwals.edit', $jadwal) }}" class="flex font-medium text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.jadwals.destroy', $jadwal->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="flex font-medium text-blue-600 hover:underline" value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tbody>
                            
                    </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
