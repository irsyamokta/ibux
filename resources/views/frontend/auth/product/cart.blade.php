@extends('index')
@section('content')
    @include('components.navbar-auth')
    @if ($carts->count() == 0)
        @include('components.empty')
    @else
        <section class="flex flex-col overflow-hidden mx-4 lg:mx-14 mt-28">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="border w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-16 py-3">
                                <span>Gambar</span>
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($carts->count() <= 0)
                            <tr>
                                <td colspan="2" class="text-black text-start py-8 px-4">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach ($carts as $item)
                                <tr class="bg-white border-b">
                                    <td class="p-4 w-2">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" class="md:w-32"
                                            alt="Product">
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $item->product->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                                @csrf
                                                <div class="flex items-center product-container"
                                                    data-product-id="{{ $item->id }}">
                                                    <button type="submit" id="decrement-button-{{ $item->id }}"
                                                        data-decrement="{{ $item->id }}"
                                                        class="flex-shrink-0 bg-primary hover:bg-secondary inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                                        <svg class="w-2.5 h-2.5 text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 18 2">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                        </svg>
                                                    </button>
                                                    <input type="text" id="counter-input-{{ $item->id }}" data-max-stock="{{ $item->product->stock }}"
                                                        name="quantity" data-input-counter
                                                        class="flex-shrink-0 text-gray-900 border-0 bg-transparent text-lg font-normal focus:outline-none focus:ring-0 max-w-[3.5rem] text-center"
                                                        placeholder="0" value="{{ $item->quantity }}" required />
                                                    <button type="submit" id="increment-button-{{ $item->id }}"
                                                        data-increment="{{ $item->id }}"
                                                        class="flex-shrink-0 bg-primary hover:bg-secondary inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                                        <svg class="w-2.5 h-2.5 text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 18 18">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M9 1v16M1 9h16" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                        Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('cart.destroy', $item->id) }}"
                                            class="font-medium text-red-600 hover:underline">
                                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                    stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div
                class="flex flex-col md:flex-row md:justify-end md:items-center mt-5 w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow-md">
                <div class="flex flex-col md:flex-row md:items-center gap-5 md:space-x-5">
                    <p class="text-start text-base text-gray-500 sm:text-lg">Total ({{ $carts->count() }} Produk): <span
                            class="font-semibold text-lg md:text-3xl text-slate-900">Rp
                            {{ number_format($total, 0, ',', '.') }}</span></p>
                    <a href="{{ route('checkout') }}"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-primary rounded-lg hover:bg-secondary">
                        <button>
                            Checkout
                        </button>
                    </a>
                </div>
            </div>
        </section>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productElements = document.querySelectorAll('.product-container');
            productElements.forEach(productElement => {
                const productId = productElement.getAttribute('data-product-id');
                const decrementButton = document.getElementById(`decrement-button-${productId}`);
                const incrementButton = document.getElementById(`increment-button-${productId}`);
                const counterInput = document.getElementById(`counter-input-${productId}`);

                const maxStock = parseInt(counterInput.getAttribute('data-max-stock')) || 0;

                let lastQuantity = parseInt(counterInput.value) || 1;

                incrementButton.addEventListener('click', function() {
                    let currentValue = parseInt(counterInput.value) || 1;
                    if (currentValue < maxStock) {
                        currentValue += 1;
                        counterInput.value = currentValue;
                        lastQuantity = currentValue;
                    }
                });

                decrementButton.addEventListener('click', function() {
                    let currentValue = parseInt(counterInput.value) || 1;
                    if (currentValue > 1) {
                        currentValue -= 1;
                        counterInput.value = currentValue;
                        lastQuantity = currentValue;
                    }
                });

                counterInput.addEventListener('input', function() {
                    let value = parseInt(counterInput.value) || 1;
                    if (value < 1) {
                        counterInput.value = 1;
                    } else if (value > maxStock) {
                        counterInput.value = maxStock;
                    }
                    lastQuantity = counterInput.value;
                });
            });
        });
    </script>
@endsection
