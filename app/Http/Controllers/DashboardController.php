<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 public function index()
{
    $totalProduk = Product::count();
    $produk = Product::all();
    $totalTransaksi = OrderModel::count();
    $totalPendapatan = OrderModel::where('status', 'selesai')->sum('total_harga');
    $pesananBaru = OrderModel::where('status', 'baru')->count();
    $pesananDiproses = OrderModel::where('status', 'diproses')->count();
    $pesananSelesai = OrderModel::where('status', 'selesai')->count();

    return view('dashboard', compact('totalProduk', 'produk'));
}

}
