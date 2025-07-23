<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <h2 class="text-xl font-bold mb-4">Daftar Pesanan</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2">Pelanggan</th>
                    <th class="p-2">Total Harga</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Tanggal</th>
                    <th class="p-2">Lihat Detail</th> <!-- kolom tambahan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-t">
                        <!-- Pelanggan: nama user -->
                        <td class="p-2">{{ $order->user->name ?? 'Tidak diketahui' }}</td>

                        <td class="p-2">Rp {{ number_format($order->total_harga) }}</td>

                        <td class="p-2">
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()"
                                    class=" border rounded text-md w-auto">
                                    <option value="baru" {{ $order->status == 'baru' ? 'selected' : '' }}>baru
                                    </option>
                                    <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>
                                        diproses</option>
                                    <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>selesai
                                    </option>
                                </select>
                            </form>
                        </td>

                        <td class="p-2">{{ $order->created_at->format('d-m-Y') }}</td>

                        <!-- Tombol Lihat Detail -->
                        <td class="p-2">
                            <a href="{{ route('orders.show', $order->id) }}"
                                class="border p-2 rounded-md bg-gray-100 hover:bg-gray-200">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
