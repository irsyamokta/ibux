<div class="grid grid-cols-1 gap-2 mt-5">
    <div class="flex justify-between rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default">
        <div class="flex flex-col md:flex-row gap-2 items-center justify-between">
            <span>
                <h4 class="text-title-sm font-bold text-black">Riwayat Orderan</h4>
            </span>
        </div>
    </div>
    <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default">
        <div class="relative overflow-x-auto px-1 py-1">
            @include('backend.partials.tables.done')
        </div>
    </div>
</div>
