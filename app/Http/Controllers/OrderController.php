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
        // Ambil data order beserta relasi items dan produknya (termasuk yang sudah soft delete)
        $order = OrderModel::with([
            'user',
            'items' => function ($query) {
                $query->with(['product' => function ($query) {
                    $query->withTrashed();
                }]);
            }
        ])->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $users = User::all(); 
        $products = Product::all(); 
        return view('orders.create', compact('users', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'qtys' => 'required|array',
        ]);

        $totalHarga = 0;

        $order = OrderModel::create([
            'user_id' => $validated['user_id'],
            'total_harga' => 0,
            'status' => 'baru',
        ]);

        foreach ($validated['product_ids'] as $productId) {
            $qty = $request->input("qtys.$productId", 1);

            // Ambil produk termasuk yang sudah di-soft-delete
            $product = Product::withTrashed()->find($productId);

            if ($product && $qty > 0) {
                $subtotal = $product->harga * $qty;
                $totalHarga += $subtotal;

                $order->items()->create([
                    'product_id' => $product->id,
                    'qty' => $qty,
                    'harga_satuan' => $product->harga,
                    'product_name' => $product->nama, // Simpan nama produk saat ini
                    'price_at_order' => $product->harga, // Simpan harga saat pemesanan
                ]);
            }
        }

        $order->total_harga = $totalHarga;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat!');
    }
}
