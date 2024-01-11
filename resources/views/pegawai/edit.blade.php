<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Pegawai - MDITech') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('pegawai.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                    <- Go back
                </a>

                <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nip" class="block mb-2 text-sm font-bold text-gray-700">NIP</label>
                        <input type="text"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            name="nip" placeholder="NIP" value="{{ old('nip', $pegawai->nip) }}">
                        @error('nip') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_pegawai" class="block mb-2 text-sm font-bold text-gray-700">Nama Pegawai</label>
                        <input type="text"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            name="nama_pegawai" placeholder="Nama Pegawai" value="{{ old('nama_pegawai', $pegawai->nama_pegawai) }}">
                        @error('nama_pegawai') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="masa_kerja" class="block mb-2 text-sm font-bold text-gray-700">Masa Kerja</label>
                        <input type="number"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            name="masa_kerja" placeholder="Masa Kerja" value="{{ old('masa_kerja', $pegawai->masa_kerja) }}">
                        @error('masa_kerja') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-bold text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin">
                            <option value="" disabled selected>Select one...</option>
                            <option value="pria" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'pria' ? 'selected' : '' }}>Pria</option>
                            <option value="wanita" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                        @error('jenis_kelamin') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block mb-2 text-sm font-bold text-gray-700">Alamat</label>
                        <input type="text"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            name="alamat" placeholder="Alamat" value="{{ old('alamat', $pegawai->alamat) }}">
                        @error('alamat') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="block mb-2 text-sm font-bold text-gray-700">Foto</label>
                        <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="file" id="foto" name="foto" />
                        @error('foto') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 my-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
