<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Peserta') }}
            </h2>
            <a href="{{ route('admin.pesertas.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
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
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pekerjaan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telepon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Kelamin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        @foreach ($pesertas as $peserta)       
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $peserta->name }} 
                            </th>
                             <td class="px-6 py-4">
                                {{ $peserta->pekerjaan }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $peserta->email }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $peserta->telepon }} 
                            </td>
                            <td class="px-6 py-4">
                                {{ $peserta->gender }} 
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex"></div>
                                    <a href="{{ route('admin.pesertas.edit', $peserta) }}" class="flex font-medium text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.pesertas.destroy', $peserta->id) }}" method="POST">
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
