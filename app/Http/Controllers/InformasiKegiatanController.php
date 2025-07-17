<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiKegiatan;

class InformasiKegiatanController extends Controller
{
    public function index()
    {
        $data = InformasiKegiatan::orderBy('tanggal_kegiatan', 'desc')->get();
        return view('kegiatan.index', compact('data'));
    }

    public function create()
    {
        return view('kegiatan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_kegiatan' => 'required|date',
            'kegiatan' => 'required|string',
        ]);

        InformasiKegiatan::create($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = InformasiKegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_kegiatan' => 'required|date',
            'kegiatan' => 'required|string',
        ]);

        InformasiKegiatan::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        InformasiKegiatan::destroy($id);
        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil dihapus.');
    }
}
