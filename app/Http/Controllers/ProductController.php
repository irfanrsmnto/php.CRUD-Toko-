<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\ViewName;
use Illuminate\Foundation\Validation\ValidatesRequests;


class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(12);

        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request)
     {
           $request->validate( [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
          
        $fileName = null;
        if ($request->hasFile('foto')) {
            $fileName = $request->file('foto')->store('images', 'public');
        }
    Product::create([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        'foto' => $fileName,
    ]);
        return redirect()->route('products.index')->with('success', 'Add product success');
    }

    public function detil($id) {
        $product = Product::findOrFail($id);
        return view('products.detil', compact('product'));
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
    
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($product->foto) {
                \Storage::delete('public/' . $product->foto);
            }
            $fileName = $request->file('foto')->store('images', 'public');
            $product->foto = $fileName;
        }
    
        $product->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        // Menemukan produk berdasarkan id
        $product = Product::findOrFail($id);

        // Menghapus gambar dari storage jika ada
        if ($product->foto && file_exists(storage_path('app/public/' . $product->foto))) {
            unlink(storage_path('app/public/' . $product->foto));
        }

        // Menghapus produk
        $product->delete();

        // Redirect kembali ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
