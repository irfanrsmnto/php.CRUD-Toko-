<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderModel::with('user')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = OrderModel::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Status berhasil diubah!');
    }

    public function show($id)
    {
        $order = OrderModel::with(['user', 'items.product'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }

        public function create()
    {
        $users = User::all(); // Ambil list user
        $products = Product::all(); // Ambil list produk
        return view('orders.create', compact('users', 'products'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'products' => 'required|array',
        'products.*.id' => 'required|exists:products,id',
        'products.*.qty' => 'required|integer|min:1',
    ]);

    $totalHarga = 0;

    // Hitung total harga
    foreach ($validated['products'] as $product) {
        $produkData = Product::find($product['id']);
        $totalHarga += $produkData->harga * $product['qty'];
    }

    // Simpan order
    $order = OrderModel::create([
        'user_id' => $validated['user_id'],
        'total_harga' => $totalHarga,
        'status' => 'baru',
    ]);

    // Simpan order items
    foreach ($validated['products'] as $product) {
        $produkData = Product::find($product['id']);
        $order->items()->create([
            'product_id' => $produkData->id,
            'qty' => $product['qty'],
            'harga_satuan' => $produkData->harga,
        ]);
    }

    return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat!');
}


}
