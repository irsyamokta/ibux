<section class="mx-4 lg:mx-14 mt-28">
    <div class="flex flex-col gap-5 justify-center">
        <h1 class="text-2xl font-semibold tracking-wide text-slate-900">Pesanan Saya</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="border w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <span>Order</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span>Gambar</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            Total Produk
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            Total Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nomor Resi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Pembayaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Pengiriman
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Pembelian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <!-- Looping untuk setiap order -->
                        <tr class="bg-white">
                            <td class="px-6 py-4">
                                ORDER{{ $order->id }}{{ $order->created_at->format('dmy') }}
                            </td>
                            <td class="p-4 w-2">
                                <img src="{{ asset('storage/' . $order->product->image) }}" class="md:w-20"
                                    alt="Product">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                {{ $order->product->name }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div>
                                        {{ $order->quantity }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $order->resi }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $order->status_payment }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                @if ($order->status_delivery == 'pending')
                                    <p class="text-danger font-medium rounded-lg text-sm">{{ $order->status_delivery }}
                                    </p>
                                @elseif($order->status_delivery == 'dikirim')
                                    <p class="text-warning font-medium rounded-lg text-sm">{{ $order->status_delivery }}
                                    </p>
                                @else
                                    <p class="text-success font-medium rounded-lg text-sm">
                                        {{ $order->status_delivery }}</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $order->created_at->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                <div class="flex justify-end">
                                    @if ($order->status_delivery == 'pending')
                                        <button type="button"
                                            class="text-white bg-slate-500 font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2"
                                            disabled>
                                            Pesanan Diterima
                                        </button>
                                    @elseif($order->status_delivery == 'dikirim')
                                        <form action="{{ route('order.confirm', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-primary hover:bg-secondary font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2">
                                                Pesanan Diterima
                                            </button>
                                        </form>
                                    @else
                                        <button
                                            class="text-white bg-success font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2"
                                            disabled>
                                            Pesanan Selesai
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
