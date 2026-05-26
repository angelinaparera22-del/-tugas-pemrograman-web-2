<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ulasans = Ulasan::latest()->filter(request(['keyword', 'pelanggan_id']));

        return view('ulasan.index', [
            'title' => 'Ulasan',
            'pelanggans' => Pelanggan::latest()->get(),
            'ulasans' => $ulasans->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ulasan.create', [
            'title' => 'Tambah Ulasan',
            'pelanggans' => Pelanggan::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'nama_sepatu'    => 'required|max:255',
            'rating'         => 'required|integer|min:1|max:5',
            'komentar'       => 'nullable|string',
            'tanggal_ulasan' => 'required|date',
            'status'         => 'required|string',
        ], [
            'pelanggan_id.required' => 'Pelanggan tidak boleh kosong',
            'pelanggan_id.exists'   => 'Pelanggan yang dipilih tidak ditemukan',

            'nama_sepatu.required'  => 'Nama sepatu tidak boleh kosong',
            'nama_sepatu.max'       => 'Nama sepatu tidak boleh lebih dari :max karakter',

            'rating.required'       => 'Rating wajib diisi',
            'rating.integer'        => 'Rating harus berupa angka',
            'rating.min'            => 'Rating minimal :min',
            'rating.max'            => 'Rating maksimal :max',

            'tanggal_ulasan.required' => 'Tanggal ulasan wajib diisi',
            'tanggal_ulasan.date'     => 'Tanggal ulasan harus berupa format tanggal',

            'status.required'       => 'Status wajib diisi',
        ]);
        Ulasan::create($validated);

        return to_route('ulasan.index')->withSuccess('Ulasan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        return view('ulasan.show', [
        'title' => 'Detail Ulasan',
        'ulasan' => $ulasan,
        'pelanggan' => $ulasan->pelanggan,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
         return view('ulasan.edit', [
        'title' => 'Edit Ulasan',
        'ulasan' => $ulasan,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
{
    $validated = $request->validate([
        'pelanggan_id' => 'required|exists:pelanggans,id',
        'nama_sepatu' => 'required|string|max:255',
        'rating' => 'required|integer|min:1|max:5',
        'komentar' => 'required|string',
        'tanggal_ulasan' => 'required|date',
        'status' => 'required|string',
    ]);

    $ulasan->update($validated);

    return to_route('ulasan.index')->withSuccess('Ulasan berhasil diedit');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();

        return to_route('ulasan.index')->withSuccess('Ulasan berhasil dihapus');
    }
}
