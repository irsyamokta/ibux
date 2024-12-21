@extends('index')
@section('content')
    @include('components.navbar-auth')
    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <section class="flex flex-col lg:flex-row justify-center items-center py-5 overflow-hidden px-4 lg:px-12 mt-14">
            <div class="flex flex-col lg:flex-row justify-center items-center mt-8">
                <img src="{{ asset('storage/' . $product->image) }}" class="w-56 md:w-[400px] lg:w-[500px]" alt="">
                <div>
                    <h1 class="text-2xl font-semibold tracking-wide md:text-4xl mb-3">{{ $product->name }}</h1>
                    <h1 class="text-2xl font-semibold tracking-wide mb-5">Rp
                        {{ number_format($product->price, 0, ',', '.') }}</h1>
                    <p id="product-stock" class="font-semibold mb-5" data-stock="{{ $product->stock }}">
                        Stok : {{ $product->stock }}
                    </p>
                    <div class="mb-5">
                        <label for="counter-input" class="block mb-1 font-semibold text-gray-900">Jumlah :</label>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button"
                                class="flex-shrink-0 bg-primary hover:bg-secondary inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <svg class="w-2.5 h-2.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" id="counter-input" name="quantity" data-input-counter
                                class="flex-shrink-0 text-gray-900 border-0 bg-transparent text-lg font-normal focus:outline-none focus:ring-0 max-w-[3.5rem] text-center"
                                placeholder="0" value="1" required />
                            <button type="button" id="increment-button"
                                class="flex-shrink-0 bg-primary hover:bg-secondary inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <svg class="w-2.5 h-2.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p class="font-semibold mb-5">Deskripsi Produk :</p>
                    <p class="mb-5">{{ $product->description }}</p>
                    @if ($product->stock > 0)
                        <div class="flex flex-col lg:flex-row gap-2 mb-5">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit"
                                class="flex justify-center items-center text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3.5 text-center lg:inline-flex lg:items-center">
                                Beli Sekarang
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        </div>
                    @else
                        <div class="flex flex-col lg:flex-row gap-2 mb-5">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit"
                                class="flex justify-center items-center text-white bg-slate-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3.5 text-center lg:inline-flex lg:items-center"
                                disabled>
                                Beli Sekarang
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const decrementButton = document.getElementById('decrement-button');
            const incrementButton = document.getElementById('increment-button');
            const counterInput = document.getElementById('counter-input');
            const stockElement = document.getElementById('product-stock');
            const maxStock = parseInt(stockElement.dataset.stock) || 0;

            let lastQuantity = parseInt(counterInput.value) || 1;

            incrementButton.addEventListener('click', function() {
                let currentValue = parseInt(counterInput.value) ||
                    1;
                if (currentValue < maxStock) {
                    currentValue += 1;
                    counterInput.value = currentValue;
                    lastQuantity = currentValue;
                }
            });

            decrementButton.addEventListener('click', function() {
                let currentValue = parseInt(counterInput.value) ||
                    1;
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
    </script>
@endsection
