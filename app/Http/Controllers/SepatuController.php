<?php

namespace App\Http\Controllers;

use App\Models\sepatu;
use Illuminate\Http\Request;

class SepatuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('produk-sepatu.index',[
            'title' => 'Produk Sepatu', 
            'sepatus' => Sepatu::all(),
            
            ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk-sepatu.create',['title' => 'Create Produk Sepatu']);
        
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'brand' => 'required|max:255',
        'size' => 'required|numeric',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
    ], [
        
        'name.required' => 'Nama wajib diisi',
        'brand.required' => 'Brand wajib diisi',
        'size.required' => 'Size wajib diisi',
        'price.required' => 'Price wajib diisi',
        'stock.required' => 'Stock wajib diisi',
    ]);

    Sepatu::create($validated);

    return redirect()->route('produk-sepatu.index')->with('success', 'Data berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(sepatu $sepatu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sepatu $sepatu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sepatu $sepatu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sepatu $sepatu)
    {
        //
    }
}
