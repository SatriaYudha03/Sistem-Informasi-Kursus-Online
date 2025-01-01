<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Kelas') }}
            </h2>
            <a href="{{ route('admin.kelases.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Tambah Kelas
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
                                    Kursus
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Instruktur
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ruangan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        @foreach ($kelases as $kelas)       
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                             <td class="px-6 py-4">
                                {{ $kelas->nama }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $kelas->kursus->name }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $kelas->instruktur->user->name }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $kelas->ruangan }} 
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex"></div>
                                    <a href="{{ route('admin.kelases.edit', $kelas) }}" class="flex font-medium text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.kelases.destroy', $kelas->id) }}" method="POST">
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
