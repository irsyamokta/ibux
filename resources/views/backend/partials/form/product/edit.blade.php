<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 gap-9 sm:grid-cols-1">
        <nav class="flex justify-end" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('products') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-secondary">
                        Daftar Produk
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Edit Produk</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-4 shadow-default">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-title-sm 2xl:text-title-lg font-bold text-black">
                        Edit Produk
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5 mt-4 rounded-sm border border-stroke bg-white px-7.5 py-4 shadow-default">
        <div
            class="grid md:grid-cols-2 gap-5 sm:grid-cols-1">
            <div>
                <label class="mb-3 block text-sm font-medium text-black">
                    Nama Produk
                </label>
                <input type="text" placeholder="Pupuk ABG" name="name" value="{{ $product->name }}"
                    class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter" required/>
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black">
                    Harga
                </label>
                <input type="text" inputmode="numeric" placeholder="150000" name="price" value="{{ $product->price }}"
                    class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter" required/>
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black">
                    Jumlah
                </label>
                <input type="text" inputmode="numeric" placeholder="100" name="stock" value="{{ $product->stock }}"
                    class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter" required/>
            </div>
            <div>
                <div>
                    <label class="mb-3 block text-sm font-medium text-black">
                        Gambar Produk
                    </label>
                    <input type="file" name="image"
                        class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter"/>
                </div>
            </div>
        </div>
        <div>
            <label class="mb-3 block text-sm font-medium text-black">
                Deskripsi
            </label>
            <textarea rows="4" placeholder="Deskripsi" name="description"
                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter" required>{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="text-white bg-primary hover:bg-secondary font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Edit Produk</button>
    </div>
</form>
