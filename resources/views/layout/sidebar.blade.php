@inject('Role', 'App\Models\Role')
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('assets-mazer/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role->role == $Role::EMPLOYEE)
                    <li class="sidebar-item {{ request()->routeIs('employee.profile.show') ? 'active' : '' }}">
                        <a href="{{ route('employee.profile.show') }}" class='sidebar-link'>
                            <i class="fas fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role->role == $Role::ADMIN)
                    <li class="sidebar-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                        <a href="{{ route('admin.profile') }}" class='sidebar-link'>
                            <i class="fas fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('point.index') ? 'active' : '' }}">
                        <a href="{{ route('point.index') }}" class='sidebar-link'>
                            <i class="fa-solid fa-coins"></i>
                            <span>Point</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('item_point.index') ? 'active' : '' }}">
                        <a href="{{ route('item_point.index') }}" class='sidebar-link'>
                            <i class="fa-brands fa-product-hunt"></i>
                            <span>Item Point</span>
                        </a>
                    </li>

                    <li class="sidebar-item has-sub {{ request()->routeIs('point_exchanger.*') ? 'active' : '' }}">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-collection-fill"></i>
                            <span>Penukaran Point</span>
                        </a>
                        <ul class="submenu {{ request()->routeIs('point_exchanger.*') ? 'active' : '' }}">
                            <li class="submenu-item {{ request()->routeIs('point_exchanger.process') ? 'active' : '' }}">
                                <a href="{{ route('point_exchanger.process') }}">Proses</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('point_exchanger.index') ? 'active' : '' }}">
                                <a href="{{ route('point_exchanger.index') }}">Semua</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('point_exchanger.sent') ? 'active' : '' }}">
                                <a href="{{ route('point_exchanger.sent') }}">Dikirim</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('point_exchanger.accepted') ? 'active' : '' }}">
                                <a href="{{ route('point_exchanger.accepted') }}">Diterima</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('point_exchanger.rejected') ? 'active' : '' }}">
                                <a href="{{ route('point_exchanger.rejected') }}">Ditolak</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('employee.index') ? 'active' : '' }}">
                        <a href="{{ route('employee.index') }}" class='sidebar-link'>
                            <i class="fa-solid fa-user-tie"></i>
                            <span>Karyawan</span>
                        </a>
                    </li>
                @endif
                <li class="sidebar-item {{ request()->routeIs('client.index') ? 'active' : '' }}">
                    <a href="{{ route('client.index') }}" class='sidebar-link'>
                        <i class="fa-solid fa-users"></i>
                        <span>Nasabah</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('waste.index') ? 'active' : '' }}">
                    <a href="{{ route('waste.index') }}" class='sidebar-link'>
                        <i class="fa-sharp fa-solid fa-trash"></i>
                        <span>Sampah</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('transaction.index') ? 'active' : '' }}">
                    <a href="{{ route('transaction.index') }}" class='sidebar-link'>
                        <i class="fas fa-wallet"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('information_education.index') ? 'active' : '' }}">
                    <a href="{{ route('information_education.index') }}" class='sidebar-link'>
                        <i class="fas fa-file"></i>
                        <span>Informasi Edukasi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('waste_category.index') ? 'active' : '' }}">
                    <a href="{{ route('waste_category.index') }}" class='sidebar-link'>
                        <i class="fa-solid fa-book"></i>
                        <span>Kategori Sampah</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class='w-100 sidebar-link border-0 bg-transparent'>
                            <dl class="dt ma0 pa0 m-0">
                                <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                            </dl>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>