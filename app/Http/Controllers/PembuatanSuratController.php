<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembuatanSurat;
use App\Models\Statuspenduduk;
use Illuminate\Support\Facades\Storage;

class PembuatanSuratController extends Controller
{
    public function index()
    {
        $data = PembuatanSurat::with('penduduk')->get();
        return view('surat.index', compact('data'));
    }

    public function create()
    {
        $penduduk = Statuspenduduk::all();
        return view('surat.form', compact('penduduk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_surat'   => 'required|unique:pembuatansurats,kode_surat',
            'jenis_surat'  => 'required',
            'nik'          => 'required|exists:penduduks,nik',
            'file_surat'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fileName = time() . '_' . $request->file('file_surat')->getClientOriginalName();
        $path = $request->file('file_surat')->storeAs('surat', $fileName, 'public');

        PembuatanSurat::create([
            'kode_surat'  => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'         => $request->nik,
            'file_surat'  => $path,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = PembuatanSurat::findOrFail($id);
        $penduduk = Statuspenduduk::all();
        return view('surat.edit', compact('data', 'penduduk'));
    }

    public function update(Request $request, $id)
    {
        $data = PembuatanSurat::findOrFail($id);

        $request->validate([
            'jenis_surat' => 'required',
            'nik'         => 'required|exists:penduduks,nik',
            'file_surat'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update file jika diunggah ulang
        if ($request->hasFile('file_surat')) {
            if ($data->file_surat && Storage::disk('public')->exists($data->file_surat)) {
                Storage::disk('public')->delete($data->file_surat);
            }

            $fileName = time() . '_' . $request->file('file_surat')->getClientOriginalName();
            $path = $request->file('file_surat')->storeAs('surat', $fileName, 'public');
            $data->file_surat = $path;
        }

        $data->jenis_surat = $request->jenis_surat;
        $data->nik = $request->nik;
        $data->save();

        return redirect()->route('surat.index')->with('success', 'Data surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = PembuatanSurat::findOrFail($id);

        if ($data->file_surat && Storage::disk('public')->exists($data->file_surat)) {
            Storage::disk('public')->delete($data->file_surat);
        }

        $data->delete();
        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }
}
