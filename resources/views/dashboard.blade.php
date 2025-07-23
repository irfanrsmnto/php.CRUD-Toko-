<x-app-layout>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Ringkasan Card -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Total Produk</div>
                <div class="text-2xl font-bold">{{ $totalProduk }}</div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Total Pesanan</div>
                <div class="text-2xl font-bold">{{ $totalPesanan }}</div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Pesanan Baru</div>
                <div class="text-2xl font-bold">{{ $pesananBaru }}</div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Sedang Diproses</div>
                <div class="text-2xl font-bold">{{ $pesananDiproses }}</div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Pesanan Selesai</div>
                <div class="text-2xl font-bold">{{ $pesananSelesai }}</div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Pendapatan Bulan Ini</div>
                <div class="text-2xl font-bold">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Total Pelanggan</div>
                <div class="text-2xl font-bold">{{ $totalPelanggan }}</div>
            </div>
        </div>

        <!-- Grafik Placeholder -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Grafik Penjualan Bulanan (Dummy)</h3>
            <div class="h-64 bg-gray-100 flex items-center justify-center text-gray-400">
                [ Grafik Penjualan ]
            </div>
        </div>

    </div>
</x-app-layout>
