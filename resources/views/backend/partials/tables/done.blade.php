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
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $item)
            @if ($item->status_delivery == 'dikirim' || $item->status_delivery == 'selesai')
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
                        @if ($item->status_delivery == 'dikirim')
                            <p class="text-warning">{{ $item->status_delivery }}</p>
                        @else
                            <p class="text-success">{{ $item->status_delivery }}</p>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900">
                        {{ $item->note }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                        {{ $item->created_at->format('d-m-Y') }}
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
<div class="mt-5 mb-5">
    {{ $orders->links('vendor.pagination.tailwind') }}
</div>
