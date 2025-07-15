<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statuspenduduk;


class statuspendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data statuspenduduk
        $penduduk = StatusPenduduk::all(); // Ambil semua data dari tabel
        $nomor = 1;

        return view('statuspenduduk.index', compact('penduduk', 'nomor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('StatusPenduduk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
