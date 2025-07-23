<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
 public function index()
{
    $totalProduk = Product::count();
    $produk = Product::all();
    $totalPesanan = OrderModel::count();
    $totalPendapatan = OrderModel::where('status', 'selesai')
    ->whereMonth('created_at', Carbon::now()->month)
    ->sum('total_harga');
    $pesananBaru = OrderModel::where('status', 'baru')->count();
    $pesananDiproses = OrderModel::where('status', 'diproses')->count();
    $pesananSelesai = OrderModel::where('status', 'selesai')->count();
    $totalPelanggan = OrderModel::distinct('user_id')->count('user_id');

return view('dashboard', compact(
    'totalProduk','produk',
    'totalPesanan',
    'totalPendapatan',
    'pesananBaru',
    'pesananDiproses',
    'pesananSelesai',
    'totalPelanggan',
        ));
    }
}
