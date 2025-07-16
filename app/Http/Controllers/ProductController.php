<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\ViewName;
use Illuminate\Foundation\Validation\ValidatesRequests;


class ProductController extends Controller
{
 public function index(Request $request)
{
    $kategoriList = KategoriModel::pluck('nama_kategori');

    $products = Product::query();

    if ($request->filled('kategori')) {
        $kategoriId = KategoriModel::where('nama_kategori', $request->kategori)->value('id');
        $products->where('id_kategori', $kategoriId);
    }

    $products = $products->paginate(9);

    return view('products.index', [
        'products' => $products,
        'kategori' => $kategoriList
    ]);
}




    public function store(Request $request)
     {
           $request->validate( [
            'nama' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
          
        $fileName = null;
        if ($request->hasFile('foto')) {
            $fileName = $request->file('foto')->store('images', 'public');
        }
    // dd($request->all());
    Product::create([
        'nama' => $request->nama,
        'id_kategori' => $request->id_kategori,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        'foto' => $fileName,
    ]);
        return redirect()->route('products.index')->with('success', 'Add product success');
    }

    public function create()
{
    $kategori = KategoriModel::pluck('nama_kategori', 'id');
    return view('products.create', compact('kategori'));
}


    public function detil($id) {
        $product = Product::findOrFail($id);
        return view('products.detil', compact('product'));
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        $kategori = KategoriModel::pluck('nama_kategori', 'id');
        // dd($kategori);
        return view('products.edit', compact('product','kategori'));
    }
    
    public function update(Request $request, $id) {
        // dd($request->all());
        $product = Product::findOrFail($id);
    
        $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
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
            'id_kategori' => $request->id_kategori,
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
