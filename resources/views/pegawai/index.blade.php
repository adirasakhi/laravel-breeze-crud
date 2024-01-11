<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mt-1 mb-4">
                        <div class="relative max-w-xs">
                            <form action="#" method="GET">
                                <label for="search" class="sr-only">
                                    Search
                                </label>
                                <input type="text" name="s"
                                    class="block w-full p-3 pl-10 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Search..." />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </form>
                        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('pegawai.create') }}"
                   class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                   Create New pegawai
                </a>
                @if ($message = Session::get('success'))
                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ $message }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <table class="w-full table-fixed">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">foto</th>
                            <th class="px-4 py-2 border">nip</th>
                            <th class="px-4 py-2 border">nama pegawai</th>
                            <th class="px-4 py-2 border">masa kerja</th>
                            <th class="px-4 py-2 border">Kelamin</th>
                            <th class="px-4 py-2 border">Alamat</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($pegawai))
                            @foreach($pegawai as $row)
                                <tr>
                                    @if ($row->foto != null)
                                    <td class="px-4 py-2 border"><img src="{{asset('storage/images/'. $row->foto)}}"></td>
                                    @else
                                    <td class="px-4 py-2 border"><img src="{{ asset('default/images/woman.jpg') }}" alt="Default Profile Image"></td>
                                @endif
                                    <td class="px-4 py-2 border">{{ $row->nip }}</td>
                                    <td class="px-4 py-2 border">{{ $row->nama_pegawai }}</td>
                                    <td class="px-4 py-2 border">{{ $row->masa_kerja . '    tahun' }}</td>
                                    <td class="px-4 py-2 border">{{ $row->jenis_kelamin }}</td>
                                    <td class="px-4 py-2 border">{{ $row->alamat}}</td>
                                    <td class="px-4 py-2 border">
                                        <form action="{{ route('pegawai.destroy', $row->id) }}" method="POST">
                                            <a href="{{ route('pegawai.show', $row->id) }}" class="inline-flex items-center px-4 py-2 mx-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                                Show
                                            </a>
                                            <a href="{{ route('pegawai.edit', $row->id) }}" class="inline-flex items-center px-4 py-2 mx-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                                Edit
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="delete" class="inline-flex items-center px-4 py-2 mx-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:shadow-outline-gray disabled:opacity-25">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td class="px-4 py-2 border text-red-500" colspan="3">No pegawai found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{$pegawai->links()}}

            </div>
        </div>
    </div>
</x-app-layout>
