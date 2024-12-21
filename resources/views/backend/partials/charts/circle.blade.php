<div class="col-span-12 mt-5 md:mt-7 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default sm:px-7.5 xl:col-span-5">
    <div class="mb-3 justify-between gap-4 sm:flex">
        <div>
            <h4 class="text-xl font-bold text-black">Data Umpan Balik</h4>
        </div>
        <div>
            <p class="text-sm font-medium text-black">
                Bulan {{ date('F Y') }}
            </p>
        </div>
    </div>
    <div class="flex items-center mb-2">
        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
        <p class="ms-1 text-sm font-medium text-gray-500">{{ number_format($ratingPercentages[5], 2) }}%</p>
        <p class="ms-1 text-sm font-medium text-gray-500">5 Stars</p>
    </div>
    @foreach([5, 4, 3, 2, 1] as $rating)
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-secondary hover:underline">{{ $rating }}</a>
            <div class="w-full h-5 mx-4 bg-gray-200 rounded">
                <div class="h-5 bg-secondary rounded" style="width: {{ $ratingPercentages[$rating] }}%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500">{{ number_format($ratingPercentages[$rating], 2) }}%</span>
        </div>
    @endforeach
</div>
