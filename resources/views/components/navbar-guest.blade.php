<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <p class="text-4xl font-bold">iBux</p>
        </a>
        <div class="flex md:w-1/2 items-center md:gap-2 md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
            <form action="{{ route('search') }}" method="GET" class="w-full mx-auto hidden md:block">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                        placeholder="Search Products..." value="{{ request('search') }}" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-secondary hover:bg-blue-400 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
            </form>
            <a href="{{ route('login') }}">
                <button type="button"
                    class="text-primary bg-transparent border-2 border-primary hover:bg-slate-200 font-medium rounded-lg text-sm px-4 py-2 text-center">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button type="button"
                    class="hidden md:block text-white bg-primary hover:bg-secondary border-2 border-primary font-medium rounded-lg text-sm px-4 py-2 text-center">Register</button>
            </a>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex  md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 gap-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li class="md:hidden block">
                    <form action="{{ route('search') }}" method="GET" class="w-full mx-auto">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" name="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                                placeholder="Search Products..." value="{{ request('search') }}" required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-primary hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2">Search</button>
                        </div>
                    </form>
                </li>
                <li class="md:hidden block">
                    <a href="{{ route('register') }}"
                        class="block text-center py-2 px-3 text-white rounded bg-primary hover:bg-secondary md:hover:bg-transparent md:hover:text-secondary md:p-0">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
