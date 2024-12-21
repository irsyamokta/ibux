<form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 gap-9 sm:grid-cols-1">
        <nav class="flex justify-end" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('content') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-secondary">
                        Daftar Konten
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Edit Konten</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-4 shadow-default">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-title-sm 2xl:text-title-lg font-bold text-black">
                        Edit Konten
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5 mt-4 rounded-sm border border-stroke bg-white px-7.5 py-4 shadow-default">
        <div class="grid gap-5 sm:grid-cols-1">
            <div>
                <label class="mb-3 block text-sm font-medium text-black">
                    Judul Konten
                </label>
                <input type="text" placeholder="Judul Konten" name="title" value="{{ $content->title }}"
                    class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter"
                    required />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black">
                    Tautan
                </label>
                <input type="text" placeholder="Tautan" name="link" value="{{ $content->link }}"
                    class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter"
                    required />
            </div>
            <div>
                <label class="mb-3 block text-sm font-medium text-black">
                    Tipe Konten
                </label>
                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white">
                    <select
                        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary"
                        :class="isOptionSelected && 'text-black'" @change="isOptionSelected = true" name="type">
                        <option value="{{ $content->type }}" class="text-body" selected>{{ $content->type }}</option>
                        @if ($content->type !== 'Video')
                            <option value="Video" class="text-body">Video</option>
                        @endif
                        @if ($content->type !== 'Dokumen Wawasan')
                            <option value="Dokumen Wawasan" class="text-body">Dokumen Wawasan</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <button type="submit"
            class="text-white bg-secondary hover:bg-primary font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Edit
            Konten</button>
    </div>
</form>
