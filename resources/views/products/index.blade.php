<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session('success'))
            <x-alert :message="session('success')" />
        @endif

        @if (request('kategori'))
            <p class="mt-2">Menampilkan kategori: <strong>{{ request('kategori') }}</strong></p>
        @endif


        <div class="flex mt-6 items-center justify-between">
            <div class="flex items-center">
                <form method="GET" action="{{ route('products.index') }}">
                    <select name="kategori" onchange="this.form.submit()"
                        class="block rounded-md border-gray-300 bg-gray-200 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item }}" {{ request('kategori') == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <h2>
                <a href="{{ route('products.create') }}">
                    <button class="bg-gray-200 px-10 py-2 rounded-md font-semibold hover:bg-yellow-400">add
                        product</button>
                </a>
            </h2>
        </div>

        <div class="w-full grid sm:grid-cols-2 md:grid-cols-3 mt-4 gap-6">
            @foreach ($products as $product)
                <div class="flex flex-col border rounded-md p-4 bg-white shadow-md">
                    <img src="{{ asset('storage/' . $product->foto) }}" alt="Product Image"
                        class="w-full h-48 object-cover rounded-md" />
                    <div class="flex-grow my-2">
                        <p class="text-xl font-light">{{ $product->nama }}</p>
                        <p class="font-semibold text-gray-400">Rp. {{ number_format($product->harga) }}</p>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2 justify-center">

                        <!-- Detil Button -->
                        <a href="{{ route('products.detil', $product->id) }}">
                            <button
                                class="bg-blue-500 text-white px-5 py-2 rounded-md font-semibold w-full sm:w-auto mb-2 hover:bg-blue-600">
                                Detil
                            </button>
                        </a>

                        <!-- Ubah Button -->
                        <a href="{{ route('products.edit', $product->id) }}">
                            <button
                                class="bg-yellow-500 text-white px-5 py-2 rounded-md font-semibold w-full sm:w-auto mb-2 hover:bg-yellow-600">
                                Ubah
                            </button>
                        </a>

                        <!-- Hapus Button -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-5 py-2 rounded-md font-semibold w-full sm:w-auto hover:bg-red-600">
                                Hapus
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>

    </div>

</x-app-layout>
