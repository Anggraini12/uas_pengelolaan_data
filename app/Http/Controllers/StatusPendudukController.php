<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusPenduduk;

class statuspendudukController extends Controller
{
    public function index()
    {
        $statuspenduduk = StatusPenduduk::all();
        $nomor = 1;

        return view('statuspenduduk.index', compact('statuspenduduk', 'nomor'));
    }

    public function create()
    {
        return view('statuspenduduk.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data baru (opsional)
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
