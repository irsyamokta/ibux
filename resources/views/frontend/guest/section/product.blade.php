<section id="home" class="flex flex-col justify-start items-start overflow-hidden lg:px-12 mb-40">
    <div class="w-full text-center lg:text-left mb-8">
        <h1 class="md:mb-4 text-3xl font-semibold tracking-wide text-black md:text-4xl 2xl:text-6xl">Temukan iPhone terbaik untukmu
        </h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach ($products as $product)
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
            <a href="{{ route('view', $product->id) }}">
                <img class="p-0 rounded-t-lg w-full h-48 object-cover" src="{{ asset('storage/' . $product->image) }}" alt="product image" style="width: 300px; height: 300px; object-fit: cover;" />
            </a>
            <div class="px-5 pb-5 mt-5">
                <a href="{{ route('view', $product->id) }}">
                    <h5 class="text-2xl font-semibold tracking-tight text-gray-900 truncate">{{ $product->name }}</h5>
                </a>
                <div class="flex items-center justify-between mt-4 gap-3">
                    <span class="text-xl font-bold text-gray-900">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                    <a href="{{ route('view', $product->id) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Beli</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-5 w-full flex justify-end">
        <div class="flex items-center gap-2">
            {{ $products->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</section>
