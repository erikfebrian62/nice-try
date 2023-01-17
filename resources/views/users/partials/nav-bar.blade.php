<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-category'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Hi, {{ Auth::user()->name }}</p>
                                    <p class="msg-header-clear ms-auto">Penting massee!!!</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="{{ route('kategori.index')}}">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-warning text-warning"><i class="bx bx-category"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Category</h6>
                                            <p class="msg-info">Buatlah kategori untuk produk mu!</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-file'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Hi, {{ Auth::user()->name }}</p>
                                    <p class="msg-header-clear ms-auto">Mau liat Laporan?</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="{{ route('kelola-produk.pdf')}}">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-danger text-danger"><i class="bx bx-file"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Pdf</h6>
                                            <p class="msg-info">Donwload Document</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-user-circle'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Hi, {{ Auth::user()->name }}</p>
                                    <p class="msg-header-clear ms-auto">Cobain deh!</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="{{ route('profile')}}">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-info text-info"><i class="bx bx-user-circle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Profile</h6>
                                            <p class="msg-info">Silahkan custom sesuai keinginan</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-info-circle'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Info untuk kamu</p>
                                    <p class="msg-header-clear ms-auto">baca dong</p>
                                </div>
                            </a>
                            <div class="header-message-list">
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">         
                                        <div class="flex-grow-1">
                                            <p class="msg-info">Jika, kamu ingin menambah produk pada page kelola <br> produk  buatlah category terlebih dahulu. Agar tidak <br> mengalami error saat menambahkan produk. Click <br> category yang paling kiri masseh..</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/'. Auth::user()->img) }}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                        <p class="designattion mb-0">{{ Auth::user()->jenis_usaha }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
