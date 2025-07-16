<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session('success'))
            <x-alert :message="session('success')" />
        @endif

        <div class="flex justify-end">
            <a href="{{ route('categories.create') }}">
                <button class="bg-gray-100 px-5 py-2 rounded-md font-semibold mb-3 hover:bg-yellow-400">add
                    categori</button>
            </a>
        </div>

        <table class="w-full border rounded">
            <thead>
                <tr class="bg-gray-100 justify-center">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama Kategori</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-2 border">{{ $loop->iteration }}</td>
                        <td class="p-2 border">{{ $item->nama_kategori }}</td>
                        <td>
                            <div class="flex gap-2 justify-center items-center">
                                <a href="{{ route('categories.edit', $item->id) }}">
                                    <button
                                        class="bg-yellow-500 text-white text-sm px-3 py-2 rounded-md font-semibold w-full sm:w-auto hover:bg-yellow-600">
                                        Ubah
                                    </button>
                                </a>
                                <form action="{{ route('categories.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this categori?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white text-sm px-3 py-2 rounded-md font-semibold w-full sm:w-auto hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-end">
            <a href="{{ route('products.index') }}">
                <button class="bg-gray-100 px-5 py-2 rounded-md font-semibold mt-3 hover:bg-yellow-400">kembali</button>
            </a>
        </div>
    </div>

</x-app-layout>
