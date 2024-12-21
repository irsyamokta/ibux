@extends('index')
@section('content')
    @include('components.navbar-auth')
    <section class="flex flex-col overflow-hidden mx-4 lg:mx-14 mt-28">
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div
                class="flex flex-row md:justify-between w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow-md">
                <div class="flex flex-col md:flex-row md:justify-between gap-5 md:space-x-5">
                    <div>
                        <div class="flex gap-2">
                            <img src="{{ asset('assets/icon/address.svg') }}" alt="address" class="w-8 h-8">
                            <p class="text-start text-base text-gray-500 sm:text-lg">
                                Alamat Pengiriman
                            </p>
                        </div>
                        <div class="text-start mt-5">
                            <p>{{ Auth::user()->name }} | {{ Auth::user()->phone }}</p>
                            <p>{{ Auth::user()->address }}</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('profile.edit') }}">
                    Edit
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
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
                        @foreach ($carts as $item)
                            <tr class="bg-white border-b">
                                <td class="p-4 w-2">
                                    <img src="{{ asset('storage/' . $item->product->image) }}" class="md:w-32"
                                        alt="Product">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900">
                                    {{ $item->product->name }}
                                    <input type="text" name="product_id" value="{{ $item->product->id }}" class="hidden">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div>
                                            <input type="text" inputmode="numeric" id="first_product" name="quantity"
                                                value="{{ $item->quantity }}"
                                                class="w-14 border-none text-gray-900 text-sm rounded-lg block px-2.5 py-1"
                                                placeholder="1" required readonly />
                                        </div>
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
                    </tbody>
                </table>
            </div>
            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow-md mt-5">
                <div>
                    <div class="mb-6">
                        <label for="catatan"
                            class="block mb-2 text-sm font-medium text-gray-900 text-start">Catatan</label>
                        <input type="text" id="catatan" name="note"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row justify-end md:items-center w-full gap-10">
                    <p class="text-start text-base text-gray-500 sm:text-lg">Total ({{ $carts->count() }} Produk): <span
                            class="font-semibold text-lg md:text-3xl text-slate-900">Rp
                            {{ number_format($total, 0, ',', '.') }}</span></p>
                    <div class="flex flex-row md:items-center md:space-x-4 space-x-2">
                        <a href="{{ route('homepage') }}"
                            class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-500 focus:ring-4 focus:ring-red-300">
                            <button type="button">
                                Batal
                            </button>
                        </a>
                        @if (!Auth::user()->phone || !Auth::user()->address)
                            <button
                                class="w-full inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-gray-500 rounded-lg cursor-not-allowed"
                                disabled>
                                Buat Pesanan
                            </button>
                        @else
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-primary rounded-lg hover:bg-secondary">
                                Buat Pesanan
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const phone = "{{ Auth::user()->phone }}";
            const address = "{{ Auth::user()->address }}";

            function checkUserInfo() {
                if (!phone || !address) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Informasi Tidak Lengkap',
                        text: 'Anda harus melengkapi nomor telepon dan alamat terlebih dahulu untuk melanjutkan checkout.',
                        confirmButtonText: 'Oke',
                        confirmButtonColor: '#050C9C',
                        background: '#ffffff',
                        color: '#000000'
                    });

                    return false;
                }
            }

            checkUserInfo();

            form.addEventListener('submit', function(event) {
                if (!checkUserInfo()) {
                    event.preventDefault();
                }
            });

            document.querySelector('a[href="{{ route('profile.edit') }}"]').addEventListener('click',
                checkUserInfo);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
