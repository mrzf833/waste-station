<div>
    <img src="{{ asset('assets-user/awan-atas.svg') }}" alt="" class="img-awan-atas absolute">

    <!-- navbar -->
    <div class="navbar absolute right-0 mx-14 font-semibold my-5">
        <a href="{{ route('landing.home') }}" class="text-xl mx-3 link-navbar {{ request()->routeIs('landing.home') ? 'link-navbar-active' : '' }}">Beranda</a>
        <a href="{{ route('landing.program') }}" class="text-xl mx-3 link-navbar {{ request()->routeIs('landing.program*') ? 'link-navbar-active' : '' }}">Program</a>
        <a href="{{ route('landing.kategori') }}" class="text-xl mx-3 link-navbar {{ request()->routeIs('landing.kategori') ? 'link-navbar-active' : '' }}">Kategori</a>
        <a href="{{ route('landing.tentang') }}" class="text-xl mx-3 link-navbar {{ request()->routeIs('landing.tentang') ? 'link-navbar-active' : '' }}">Tentang</a>
        <button data-modal-target="default" data-modal-toggle="registerModal"  type="button" class=" text-xl mx-3 bg-[#5CB319] text-[#fff] px-3 py-2 rounded">Ayo Bergabung!</button>
    </div>
</div>