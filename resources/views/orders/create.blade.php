<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Tambah Order Baru</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Pelanggan</label>
                <select name="user_id" class="w-full border rounded p-2" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <h3 class="font-semibold mb-2">Pilih Produk</h3>
                @foreach ($products as $product)
                    <div class="flex items-center mb-2">
                        <input type="checkbox" name="product_ids[]" value="{{ $product->id }}" class="mr-2">
                        <span class="w-64">{{ $product->nama }} - Rp {{ number_format($product->harga) }}</span>
                        <input type="number" name="qtys[{{ $product->id }}]" value="1" min="1"
                            class="ml-4 w-20 border rounded p-1" placeholder="Qty">
                    </div>
                @endforeach

            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Pesan Sekarang
                </button>
                <a href="{{ route('orders.index') }}" class="ml-4 text-gray-500 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
