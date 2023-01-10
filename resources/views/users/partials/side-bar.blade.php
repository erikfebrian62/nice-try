<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('images/zyro-image.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">profit_counter</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">Menu</li>
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('produk.index') }}">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Kelola Usaha</div>
            </a>
        </li>
        <li>
            <a href="{{ route('calculate') }}">
                <div class="parent-icon"><i class="bx bx-calculator"></i>
                </div>
                <div class="menu-title">Calculate Profit</div>
            </a>
        </li>
        <li>
            <a href="{{ route('laporan') }}">
                <div class="parent-icon"><i class="bx bx-file"></i>
                </div>
                <div class="menu-title">Laporan</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>