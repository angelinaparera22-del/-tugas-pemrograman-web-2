<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $pelanggans = Pelanggan::latest();
    $keyword = request('keyword');
    if($keyword) {
        $pelanggans->where('nama_pelanggan', 'like', '%'. $keyword . '%');
    }

        return view('pelanggan.index',[
            'title' => 'Pelanggan', 
            'pelanggans' => $pelanggans->paginate(5)->withQueryString(),

            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('pelanggan.create', [
        'title' => 'Tambah Pelanggan'
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'nama_pelanggan' => 'required|string|max:255',
        'alamat' => 'required|string',
        'nomor_telepon' => 'required|string|max:20',
    ]);

    Pelanggan::create($validated);

    return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
         return view('pelanggan.show', [
        'title' => 'Detail Pelanggan',
        'pelanggan' => $pelanggan
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', [
        'title' => 'Edit Pelanggan',
        'pelanggan' => $pelanggan
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validated = $request->validate([
        'nama_pelanggan' => 'required|string|max:255',
        'alamat' => 'required|string',
        'nomor_telepon' => 'required|string|max:20',
    ]);

    $pelanggan->update($validated);

    return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
         $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus!');
    }
}