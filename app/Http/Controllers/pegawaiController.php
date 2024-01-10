<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;

class pegawaiController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = pegawai::where([
            ['nama_pegawai', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('nama_pegawai', 'LIKE', '%' . $s . '%')
                        ->orWhere('nip', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(6);

        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_pegawai' => 'required',
            'masa_kerja' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->storeAs('public/images', $fileName);
        pegawai::create([
            'nip' => $request->nip,
            'nama_pegawai' => $request->nama_pegawai,
            'masa_kerja' => $request->masa_kerja,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'foto' => $request->foto

        ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'pegawai Created Successfully.');
    }

    public function show(pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, pegawai $pegawai)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email'
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'pegawai Updated Successfully.');
    }

    public function destroy(pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'pegawai Deleted Successfully.');
    }
}
