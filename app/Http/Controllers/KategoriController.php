<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori = KategoriModel::all();
        return view('categories.index', compact('kategori'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request)
     {
           $request->validate( [
            'nama_kategori' => 'required',
        ]);
                
    KategoriModel::create([
        'nama_kategori' => $request->nama_kategori,
    ]);
        return redirect()->route('categories.index')->with('success', 'Add product success');
    }

      public function edit($id) {
        $kategori = KategoriModel::findOrFail($id);
        
        return view('categories.edit', compact('kategori'));
    }

    public function update(Request $request, $id) {
        // dd($request->all());
        $kategori = KategoriModel::findOrFail($id);
    
        $request->validate([
            'nama_kategori' => 'required',
        ]);
    
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Menemukan produk berdasarkan id
        $kategori = KategoriModel::findOrFail($id);


        // Menghapus produk
        $kategori->delete();

        // Redirect kembali ke halaman daftar produk dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'kategori deleted successfully');
    }
}
