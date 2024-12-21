<table class="w-full text-sm text-left rtl:text-right text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">
                <span>Order</span>
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Gambar
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Produk
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Nama Penerima
            </th>
            <th scope="col" class="px-6 py-3">
                Alamat
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Telepon
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Total Harga
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Nomor Resi
            </th>
            <th scope="col" class="px-6 py-3">
                Status Pembayaran
            </th>
            <th scope="col" class="px-6 py-3">
                Status Pengiriman
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Catatan
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal Pembelian
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $item)
            @if ($item->status_delivery == 'pending')
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-semibold text-gray-900">
                        ORDER{{ $item->id }}{{ $item->created_at->format('dmy') }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="product image"
                            class="w-24 h-24 object-cover">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                        {{ $item->product->name }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                        {{ $item->user->name }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900">
                        {{ $item->user->address }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900">
                        {{ $item->user->phone }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                        Rp {{ number_format($item->total_price, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                        {{ $item->resi }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900">
                        {{ $item->status_payment }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900">
                        <button type="button" class="text-danger">{{ $item->status_delivery }}</button>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900">
                        {{ $item->note }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                        {{ $item->created_at->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex justify-end">
                            @if ($item->status_payment == 'pending')
                                <button type="button"
                                    class="text-white bg-slate-500 font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2"
                                    disabled>
                                    Update Resi
                                </button>
                            @elseif($item->status_payment == 'paid')
                                <a href="{{ route('order.view', $item->id) }}">
                                    <button type="button"
                                        class="text-white bg-primary hover:bg-secondary font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2">
                                        Update Resi
                                    </button>
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
<div class="mt-5 mb-5">
    {{ $orders->links('vendor.pagination.tailwind') }}
</div>
