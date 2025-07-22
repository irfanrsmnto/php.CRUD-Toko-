<x-app-layout>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Ringkasan Card -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Total Produk</div>
                <div class="text-2xl font-bold">{{ $totalProduk }}</div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Total Transaksi</div>
                <div class="text-2xl font-bold">80</div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Pendapatan Bulan Ini</div>
                <div class="text-2xl font-bold">Rp 50.000.000</div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="text-gray-500">Total Pelanggan</div>
                <div class="text-2xl font-bold">300</div>
            </div>
        </div>

        <!-- Grafik Placeholder -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Grafik Penjualan Bulanan (Dummy)</h3>
            <div class="h-64 bg-gray-100 flex items-center justify-center text-gray-400">
                [ Grafik Penjualan ]
            </div>
        </div>

        <!-- Tabel Pesanan Terbaru -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Pesanan Terbaru</h3>
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="border border-gray-300 p-2">No</th>
                        <th class="border border-gray-300 p-2">Pelanggan</th>
                        <th class="border border-gray-300 p-2">Produk</th>
                        <th class="border border-gray-300 p-2">Status</th>
                        <th class="border border-gray-300 p-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 p-2">1</td>
                        <td class="border border-gray-300 p-2">Budi</td>
                        <td class="border border-gray-300 p-2">Sepatu</td>
                        <td class="border border-gray-300 p-2">Baru</td>
                        <td class="border border-gray-300 p-2">22-07-2025</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2">2</td>
                        <td class="border border-gray-300 p-2">Ani</td>
                        <td class="border border-gray-300 p-2">Baju</td>
                        <td class="border border-gray-300 p-2">Dikirim</td>
                        <td class="border border-gray-300 p-2">22-07-2025</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
