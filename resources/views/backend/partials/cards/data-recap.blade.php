<div class="grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-6 2xl:gap-7.5">
    <!-- Card Item Start -->
    <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default">
        <div class="flex flex-col gap-2 items-start justify-start">
            <div class="flex gap-2 justify-center items-center">
                <img src="{{ asset('assets/icon/icon-sales.png') }}" alt="img-sales">
                <h4 class="text-title-sm font-bold text-black">
                    Total Penjualan
                </h4>
            </div>
            <span class="text-2xl font-medium">{{ $sale }}</span>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default">
        <div class="flex flex-col gap-2 items-start justify-start">
            <div class="flex items-center justify-center gap-2">
                <img class="w-15" src="{{ asset('assets/icon/icon-revenue.png') }}" alt="img-revenue">
                <h4 class="text-title-sm font-bold text-black">Pendapatan</h4>
            </div>
            <span class="text-2xl font-medium">Rp{{ number_format($revenue, 0, ',', '.') }}</span>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default">
        <div class="flex flex-col gap-2 items-start justify-start">
            <div class="flex gap-2 justify-center  items-center">
                <img src="{{ asset('assets/icon/icon-product.png') }}" alt="img-product">
                <h4 class="text-title-sm font-bold text-black">
                    Total Produk
                </h4>
            </div>
            <span class="text-2xl font-medium">{{ $product }}</span>
        </div>
    </div>
    <!-- Card Item End -->
</div>
