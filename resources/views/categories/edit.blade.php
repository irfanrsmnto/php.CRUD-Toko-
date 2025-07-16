<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <h1 class="text-xl font-bold mb-4">Tambah Kategori Baru</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-end gap-3 mb-3">
            <a href="{{ route('categories.index') }}">
                <button class="bg-gray-100 px-5 py-2 rounded-md font-semibold hover:bg-yellow-400">Kembali</button>
            </a>
        </div>

        <div>
            <form action="{{ route('categories.update', $kategori->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="nama_kategori" :value="'Nama Kategori'" />
                    <x-text-input id="nama_kategori" class="block mt-1 w-full" type="text" name="nama_kategori"
                        :value="old('nama_kategori', $kategori->nama_kategori)" required />
                    <x-input-error :messages="$errors->get('nama_kategori')" class="mt-2" />
                </div>

                <div class="flex justify-end gap-3">
                    <button type="submit"
                        class="bg-blue-500 text-white px-5 py-2 rounded-md font-semibold hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
