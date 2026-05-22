<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
{
    $keyword = request('keyword');

    $ulasans = Ulasan::with('pelanggan')->latest();

    if ($keyword) {
        $ulasans->whereHas('pelanggan', function($query) use ($keyword) {
            $query->where('nama_pelanggan', 'like', "%{$keyword}%");
        })
        ->orWhere('isi_ulasan', 'like', "%{$keyword}%");
    }

    return view('ulasan.index', [
        'title' => 'Ulasan',
        'ulasans' => $ulasans->paginate(5)->withQueryString(),
    ]);
}

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Ulasan $ulasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        //
    }
}
