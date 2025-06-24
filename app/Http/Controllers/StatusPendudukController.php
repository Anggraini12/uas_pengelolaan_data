<?php

namespace App\Http\Controllers;

use App\Models\StatusPenduduk;
use Illuminate\Http\Request;

class StatusPendudukController extends Controller
{
    public function index()
    {
        $penduduk = StatusPenduduk::all();
        return view('penduduk.index', compact('penduduk'));
    }

    public function create()
    {
        return view('penduduk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:statuspenduduks,nik|max:16',
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'status' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        StatusPenduduk::create($request->all());
        return redirect()->route('penduduk.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($nik)
    {
        $penduduk = StatusPenduduk::findOrFail($nik);
        return view('penduduk.show', compact('penduduk'));
    }

    public function edit($nik)
    {
        $penduduk = StatusPenduduk::findOrFail($nik);
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, $nik)
    {
        $penduduk = StatusPenduduk::findOrFail($nik);
        $penduduk->update($request->all());

        return redirect()->route('penduduk.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($nik)
    {
        $penduduk = StatusPenduduk::findOrFail($nik);
        $penduduk->delete();

        return redirect()->route('penduduk.index')->with('success', 'Data berhasil dihapus');
    }
}
