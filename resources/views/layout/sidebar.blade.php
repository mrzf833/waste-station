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
                @if (Auth::user()->role->role == $Role::ADMIN)
                    <li class="sidebar-item {{ request()->routeIs('point.index') ? 'active' : '' }}">
                        <a href="{{ route('point.index') }}" class='sidebar-link'>
                            <i class="fa-solid fa-coins"></i>
                            <span>Point</span>
                        </a>
                    </li>
                @endif
                <li class="sidebar-item {{ request()->routeIs('client.index') ? 'active' : '' }}">
                    <a href="{{ route('client.index') }}" class='sidebar-link'>
                        <i class="fas fa-user"></i>
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