<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <h2 class="text-xl font-bold mb-4">Detail Pesanan #{{ $order->id }}</h2>

        <div class="bg-white rounded shadow p-4 space-y-2">
            <p><strong>Nama Pelanggan:</strong> {{ $order->user->name }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_harga) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Tanggal:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
        </div>

        <h3 class="font-semibold text-lg mt-6">Daftar Produk</h3>
        <table class="w-full border my-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Nama Produk</th>
                    <th class="p-2 border">Jumlah</th>
                    <th class="p-2 border">Harga Satuan</th>
                    <th class="p-2 border">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td class="p-2 border">{{ $item->product->nama ?? 'Produk tidak ditemukan' }}</td>
                        <td class="p-2 border">{{ $item->qty }}</td>
                        <td class="p-2 border">Rp {{ number_format($item->harga_satuan) }}</td>
                        <td class="p-2 border">Rp {{ number_format($item->qty * $item->harga_satuan) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <a href="{{ route('orders.index') }}" class="border p-2 rounded-md bg-gray-100 hover:bg-gray-200">&larr;
                Kembali ke
                Daftar
                Pesanan</a>
        </div>
    </div>
</x-app-layout>
