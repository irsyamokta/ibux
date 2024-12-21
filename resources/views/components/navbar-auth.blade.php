<nav class="bg-white border-gray-20 fixed w-full z-20 top-0 start-0">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/home" class="flex items-center space-x-3 rtl:space-x-reverse">
            <p class="text-4xl font-bold">iBux</p>
        </a>
        <div class="flex md:w-1/2 items-center md:gap-2 md:order-2 space-x-1 md:space-x-4 rtl:space-x-reverse">
            <form action="{{ route('products.search') }}" method="GET" class="w-full mx-auto hidden md:block">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                        placeholder="Search Products" value="{{ request('search') }}" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-secondary hover:bg-blue-400 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
            </form>
            <div class="flex justify-center items-center">
                <a href="/cart">
                    <img class="w-10" src="{{ asset('assets/icon/icon-cart.png') }}" alt="user cart">
                </a>
            </div>
            <div class="flex justify-center items-center">
                <button type="button"
                    class="flex text-sm rounded-full md:me-0 focus:ring-4 focus:ring-gray-300"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <img class="w-12" src="{{ asset('assets/icon/user.png') }}" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
                        <span class="block text-sm  text-gray-500 truncate">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('midtrans.payment') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Transaksi</a>
                        </li>
                        <li>
                            <a href="{{ route('order.detail') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Sign Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <button data-collapse-toggle="navbar-search" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-search" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-search">
            <div class="relative mt-3 md:hidden">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
            </div>
            <ul class="flex flex-col p-4 lg:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-white">
            </ul>
        </div>
    </div>
</nav>
