<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statuspenduduk;

class statuspendudukController extends Controller
{
    public function index()
    {
        $statuspenduduk = Statuspenduduk::all();
        $nomor = 1;

        return view('statuspenduduk.index', compact('statuspenduduk', 'nomor'));
    }

    // Tampilkan form tambah
    public function create()
    {
        $statuspenduduk = Statuspenduduk::all();
        return view('statuspenduduk.form', compact('statuspenduduk'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:penduduks,nik',
            'nama' => 'required|string',
            'alamat' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            'jk' => 'required',
            'gol' => 'nullable',
        ]);

        Statuspenduduk::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat,
            'tgl_lahir' => $request->tanggal,
            'status' => $request->status,
            'jk' => $request->jk,
            'gol' => $request->gol,
        ]);

        return redirect()->route('statuspenduduk.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(string $nik)
    {
        $penduduk = Statuspenduduk::where('nik', $nik)->firstOrFail();
        return view('statuspenduduk.edit', compact('penduduk'));
    }

    // Update data
    public function update(Request $request, string $nik)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:penduduks,nik,' . $nik . ',nik',
            'nama' => 'required|string',
            'alamat' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            'jk' => 'required',
            'gol' => 'nullable',
        ]);

        $penduduk = Statuspenduduk::where('nik', $nik)->firstOrFail();
        $penduduk->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat,
            'tgl_lahir' => $request->tanggal,
            'status' => $request->status,
            'jk' => $request->jk,
            'gol' => $request->gol,
        ]);

        return redirect()->route('statuspenduduk.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy(string $nik)
    {
        $penduduk = Statuspenduduk::where('nik', $nik)->firstOrFail();
        $penduduk->delete();

        return redirect()->route('statuspenduduk.index')->with('success', 'Data berhasil dihapus.');
    }
}
