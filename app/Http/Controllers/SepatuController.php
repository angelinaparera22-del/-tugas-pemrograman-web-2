<?php

namespace App\Http\Controllers;

use App\Models\sepatu;
use Database\Factories\ProdukSepatuFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SepatuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       $sepatu = Sepatu::all();

        return view('produk-sepatu.index', [
            'title' => 'Data Produk Sepatu',
            'sepatus' => $sepatu,
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
        'deskripsi' => 'nullable|string',
    ], [
        'name.required' => 'Nama wajib diisi',
        'brand.required' => 'Brand wajib diisi',
        'size.required' => 'Size wajib diisi',
        'price.required' => 'Price wajib diisi',
        'stock.required' => 'Stock wajib diisi',
    ]);

    DB::transaction(function () use ($validated) {
        Sepatu::create($validated);
    });

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

       return view('produk-sepatu.edit',[
            'title' => 'Edit produk', 
            'sepatu' => $sepatu
            
            ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sepatu $sepatu)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'brand' => 'required|max:255',
        'size' => 'required|numeric',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'deskripsi' => 'nullable|string',
    ], [
        'name.required' => 'Nama wajib diisi',
        'brand.required' => 'Brand wajib diisi',
        'size.required' => 'Size wajib diisi',
        'price.required' => 'Price wajib diisi',
        'stock.required' => 'Stock wajib diisi',
    ]);

    DB::transaction(function () use ($sepatu, $validated) {
        $sepatu->update($validated);
    });

    return redirect()->route('produk-sepatu.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sepatu $sepatu)
    {
        $sepatu->delete($sepatu);
        return redirect()->route('produk-sepatu.index')->with('success', 'Data berhasil dihapus');
    }

    // soft deletes
    public function trash()
{
    $sepatus = Sepatu::onlyTrashed()->get();
    return view('produk-sepatu.trash', [
        'title' => 'Trash Produk Sepatu',
        'sepatus' => $sepatus
    ]);
}
}