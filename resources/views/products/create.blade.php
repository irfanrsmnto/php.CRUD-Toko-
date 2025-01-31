<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="flex mt-6">
            <h2 class="font-semibold text-xl">Add Product</h2>
        </div>

        <div class="flex mx-auto lg:px-8 sm:px-6 mt-6" x-data="{ imageUrl: '/storage/noimage.png' }">
            <form enctype="multipart/form-data" class="w-full flex flex-col sm:flex-row" method="POST"
                action="{{ route('products.store') }}">
                @csrf

                <div class="w-full sm:w-1/2 bg-gray-100 p-4 rounded mb-4 sm:mb-0 mr-4">
                    <img :src="imageUrl" class="rounded-md w-full h-64 object-cover" />
                </div>

                <div class="w-full sm:w-1/2">
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border p-2"
                            type="file" name="foto" :value="old('foto')" required
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                            :value="old('nama')" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga"
                            :value="old('harga')" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-text-area id="deskripsi" class="block mt-1 w-full" type="text"
                            name="deskripsi">{{ old('deskripsi') }}</x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>

                    <a href="{{ route('products.index') }}"
                        class="block text-center bg-blue-400 text-white px-4 py-1.5 mt-2 rounded-md hover:bg-blue-300">
                        Kembali
                    </a>

                </div>
            </form>
        </div>

    </div>
</x-app-layout>
