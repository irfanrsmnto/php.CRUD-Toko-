<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session('success'))
            <x-alert :message="session('success')" />
        @endif

        <div class="flex mt-6 items-center justify-between">
            <h2 class="font-semibold text-xl">List Product</h2>
            <a href="{{ route('products.create') }}">
                <button class="bg-gray-100 px-10 py-2 rounded-md font-semibold">add product</button>
            </a>
        </div>

        <div class="grid md:grid-cols-3 grid-cols-1 mt-4 gap-6">
            @foreach ($products as $product)
                <div class="min-h-[350px] max-h-[350px] flex flex-col border rounded-md p-4 bg-white shadow-md">
                    <img src="{{ asset('storage/' . $product->foto) }}" alt="Product Image"
                        class="w-full h-48 object-cover rounded-md" />
                    <div class="flex-grow my-2">
                        <p class="text-xl font-light">{{ $product->nama }}</p>
                        <p class="font-semibold text-gray-400">Rp. {{ number_format($product->harga) }}</p>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2 justify-between">

                        <!-- Detil Button -->
                        <a href="{{ route('products.detil', $product->id) }}">
                            <button
                                class="bg-blue-500 text-white px-9 py-2 rounded-md font-semibold w-full sm:w-auto mb-2 hover:bg-blue-600">
                                Detil
                            </button>
                        </a>

                        <!-- Ubah Button -->
                        <a href="{{ route('products.edit', $product->id) }}">
                            <button
                                class="bg-yellow-500 text-white px-9 py-2 rounded-md font-semibold w-full sm:w-auto mb-2 hover:bg-yellow-600">
                                Ubah
                            </button>
                        </a>

                        <!-- Hapus Button -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-9 py-2 rounded-md font-semibold w-full sm:w-auto hover:bg-red-600">
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
