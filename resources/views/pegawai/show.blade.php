<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('pegawai Detail - MDITech') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('pegawai.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                    <- Go back
                </a>
                <table class="w-full table-fixed">
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 font-bold">Nip</td>
                            <td>{{ $pegawai->nip }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Nama</td>
                            <td>{{ $pegawai->nama_pegawai }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Masa Kerja</td>
                            <td>{{ $pegawai->masa_kerja }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Jenis Kelamin</td>
                            <td>{{ $pegawai->jenis_kelamin }}</td>
                        </tr>
`                       <tr>
                            <td class="px-4 py-2 font-bold">Alamat</td>
                            <td>{{ $pegawai->alamat }}</td>
                        </tr>
                        <align>
                            <tr>
                                @if ($pegawai->foto != null)
                                <td class="px-4 py-2 border"><img src="{{asset('storage/images/'. $pegawai->foto)}}"></td>
                                @else
                                <td class="px-4 py-2 border"><img src="{{ asset('default/images/woman.jpg') }}" alt="Default Profile Image"></td>
                            @endif                            </tr>
                        </align>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
