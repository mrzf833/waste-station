<div>
    <img src="{{ asset('assets-user/awan-atas.svg') }}" alt="" class="img-awan-atas absolute">

    <!-- navbar -->
    <div class="hidden lg:block navbar absolute right-0 mx-14 font-semibold my-5 z-50">
        <a href="{{ route('landing.home') }}" class="text-xl mx-3 link-navbar hover:text-[#5CB319] duration-300 {{ request()->routeIs('landing.home') ? 'link-navbar-active' : '' }}">Beranda</a>
        <a href="{{ route('landing.program') }}" class="text-xl mx-3 link-navbar hover:text-[#5CB319] duration-300 {{ request()->routeIs('landing.program') ? 'link-navbar-active' : '' }}">Program</a>
        <a href="{{ route('landing.information_education') }}" class="text-xl mx-3 link-navbar hover:text-[#5CB319] duration-300  {{ request()->routeIs('landing.information_education*') ? 'link-navbar-active' : '' }}">Informasi edukasi</a>
        <a href="{{ route('landing.kategori') }}" class="text-xl mx-3 link-navbar hover:text-[#5CB319] duration-300 {{ request()->routeIs('landing.kategori') ? 'link-navbar-active' : '' }}">Kategori</a>
        <a href="{{ route('landing.tentang') }}" class="text-xl mx-3 link-navbar hover:text-[#5CB319] duration-300 {{ request()->routeIs('landing.tentang') ? 'link-navbar-active' : '' }}">Tentang</a>
        <button data-modal-target="default" data-modal-toggle="loginModal"  type="button" class=" text-xl mx-3 duration-300 bg-[#5CB319] hover:bg-[#478B13] text-[#fff] px-3 py-2 rounded">Ayo Bergabung!</button>
    </div>

    <div class="flex justify-end lg:hidden">
        <button type="button" class="rounded-lg border px-4 duration-300 py-2 hover:bg-gray-200 z-50 mr-4 mt-2" id="btn-navbar-mobile">
            <i class="fa-solid fa-bars fa-2x"></i>
        </button>
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
            <a href="{{ route('landing.home') }}" class="text-xl font-semibold link-navbar hover:text-[#5CB319] duration-300 my-4 {{ request()->routeIs('landing.home') ? 'link-navbar-active' : '' }}">Beranda</a>
        </div>
        <div class="flex justify-center">
            <a href="{{ route('landing.program') }}" class="text-xl font-semibold link-navbar hover:text-[#5CB319] duration-300 my-4 {{ request()->routeIs('landing.program') ? 'link-navbar-active' : '' }}">Program</a>
        </div>
        <div class="flex justify-center">
            <a href="{{ route('landing.information_education') }}" class="text-xl font-semibold link-navbar hover:text-[#5CB319] duration-300 my-4 {{ request()->routeIs('landing.information_education') ? 'link-navbar-active' : '' }}">Informasi Edukasi</a>
        </div>
        <div class="flex justify-center">
            <a href="{{ route('landing.kategori') }}" class="text-xl font-semibold link-navbar hover:text-[#5CB319] duration-300 my-4 {{ request()->routeIs('landing.kategori') ? 'link-navbar-active' : '' }}">Kategori</a>
        </div>
        <div class="flex justify-center">
            <a href="{{ route('landing.tentang') }}" class="text-xl font-semibold link-navbar hover:text-[#5CB319] duration-300 my-4 {{ request()->routeIs('landing.tentang') ? 'link-navbar-active' : '' }}">Tentang</a>
        </div>
    </div>
</div>