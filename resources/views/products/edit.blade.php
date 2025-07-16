<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="mt-6">
            <h2 class="font-semibold text-xl">Edit Produk</h2>
        </div>

        <div class="flex mx-auto lg:px-8 sm:px-6 mt-6" x-data="{ imageUrl: '{{ asset('storage/' . $product->foto) }}' }">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="w-full flex flex-col sm:flex-row">
                @csrf
                @method('PUT')

                <!-- Gambar Produk (Kiri) -->
                <div class="w-full sm:w-1/2 bg-gray-100 p-4 rounded mb-4 sm:mb-0 mr-4">
                    <img :src="imageUrl" class="rounded-md" />
                </div>

                <!-- Form Input (Kanan) -->
                <div class="w-full sm:w-1/2">
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border p-2"
                            type="file" name="foto" :value="old('foto')"
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                            :value="old('nama', $product->nama)" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="kategori" :value="__('Kategori')" />
                        <select id="id_kategori" name="id_kategori" required
                            class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $id => $nama)
                                <option value="{{ $id }}"
                                    {{ old('id_kategori', $product->id_kategori) == $id ? 'selected' : '' }}>
                                    {{ $nama }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_kategori')" class="mt-2" />

                    </div>

                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga"
                            :value="old('harga', $product->harga)" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-text-area id="deskripsi" class="block mt-1 w-full"
                            name="deskripsi">{{ old('deskripsi', $product->deskripsi) }}</x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex flex-col space-y-2">
                        <!-- Tombol Simpan -->
                        <button type="submit"
                            class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-700 w-full">
                            Simpan
                        </button>

                        <!-- Tombol Kembali -->
                        <a href="{{ route('products.index') }}"
                            class="bg-blue-400 text-white px-4 py-2 rounded-md hover:bg-blue-300 w-full text-center">
                            Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
