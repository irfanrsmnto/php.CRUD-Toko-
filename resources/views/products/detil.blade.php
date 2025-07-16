<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="mt-6">
            <h2 class="font-semibold text-xl">Detail Produk</h2>
        </div>

        <div class="flex flex-wrap mt-4 bg-white shadow-md p-6 rounded-md">
            <!-- Gambar Produk dengan full width -->
            <img src="{{ asset('storage/' . $product->foto) }}" alt="Product Image"
                class="w-full h-auto object-cover rounded-md md:w-1/3">
            <div class="md:px-10">
                <h3 class="text-2xl font-semibold mt-4">{{ $product->nama }}</h3>
                <p class=" text-gray-500 text-lg font-semibold">Harga : Rp {{ number_format($product->harga) }}</p>
                <p class="mt-2 font-semibold">Deskripsi : {{ $product->deskripsi }}</p>

                <a href="{{ route('products.index') }}">
                    <button class="bg-blue-400 text-white px-4 py-2 mt-2 rounded-md hover:bg-blue-300">Kembali</button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
