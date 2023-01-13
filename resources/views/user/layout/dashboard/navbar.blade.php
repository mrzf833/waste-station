    <!-- navbar -->
    <div class="flex justify-between px-8 py-4 shadow-gray-200 shadow absolute z-50 w-full bg-white">
        <a href="{{ route('user.profile.index') }}" class="flex items-center">
            <img src="{{ asset('assets-user/logo.png') }}" alt="" class="w-[130px] mx-4">
        </a>
        <div class="flex">
            <div class="flex items-center">
                <div class="lg:hidden">
                    <button type="button" class="rounded-lg border px-4 duration-300 py-2 hover:bg-gray-200 z-50 mr-4 mt-2" id="btn-navbar-mobile">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
                <div class="lg:flex gap-4 mx-2 hidden">
                    <a href="{{ route('user.transaction.index') }}" class="font-semibold text-[#868984] hover:text-[#5CB319] {{ request()->routeIs('user.transaction.index') ? 'text-[#5CB319]' : '' }}">Tukar Poin</a>
                    <a href="{{ route('user.riwayat_setor.index') }}" class="font-semibold text-[#868984] hover:text-[#5CB319] {{ request()->routeIs('user.riwayat_setor*') ? 'text-[#5CB319]' : '' }}">Riwayat Setor</a>
                    <a href="{{ route('user.riwayat_penukaran.index') }}" class="font-semibold text-[#868984] hover:text-[#5CB319] {{ request()->routeIs('user.riwayat_penukaran*') ? 'text-[#5CB319]' : '' }}">Riwayat Penukaran</a>
                </div>
                <img src="{{ asset('assets-user/profile.png') }}" class="w-[40px] rounded-full" alt="">
                <button type="button" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"  class="flex items-center">
                    <span class="text-base mx-4">{{ Auth::user()->name }}</span>
                    <img src="{{ asset('assets-user/bawah-icon.png') }}" alt="">
                </button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ route('user.profile.index') }}" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('landing.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="fixed h-screen w-full hidden bg-white z-50 top-0 lg:hidden overflow-y-auto" id="navbar-mobile" check="close">
        <div class="mx-8 my-4">
            <div class="flex justify-end">
                <button type="button" id="btn-close-navbar-mobile">
                    <i class="fa-solid fa-xmark fa-2x text-red-500"></i>
                </button>
            </div>
            <div class="flex justify-center">
                <a href="{{ route('user.transaction.index') }}" class="text-xl font-semibold link-navbar hover:text-[#5CB319] duration-300 my-4 {{ request()->routeIs('user.transaction.index') ? 'link-navbar-active' : '' }}">Tukar Poin</a>
            </div>
            <div class="flex justify-center">
                <a href="{{ route('user.riwayat_setor.index') }}" class="text-xl font-semibold link-navbar hover:text-[#5CB319] duration-300 my-4 {{ request()->routeIs('user.riwayat_setor*') ? 'link-navbar-active' : '' }}">Riwayat Setor</a>
            </div>
            <div class="flex justify-center">
                <a href="{{ route('user.riwayat_penukaran.index') }}" class="text-xl font-semibold link-navbar hover:text-[#5CB319] duration-300 my-4 {{ request()->routeIs('user.riwayat_penukaran*') ? 'link-navbar-active' : '' }}">Riwayat Penukaran</a>
            </div>
        </div>
    </div>