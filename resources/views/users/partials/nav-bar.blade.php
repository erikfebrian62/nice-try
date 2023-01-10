<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Hi, {{ Auth::user()->name }}</p>
                                    <p class="msg-header-clear ms-auto">Penasaran?</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="{{ route('chat') }}">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-info text-info"><i class="bx bx-message-detail"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Chat</h6>
                                            <p class="msg-info">Click aja dulu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-comment'></i>
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
                                            <p class="msg-info">Jika, kamu ingin menambah wawasan khususnya <br> dalam hal bisnis. kamu bisa mengobrol atau sharing <br> sesama usahawan lainnya melalui chat, mau?<br> click icon bell yaa..</p>
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
                        <p class="designattion mb-0">Usahawan</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-user"></i>
                        profile
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>


<!-- Modal profile -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">  
                    <div class="card p-3 py-4 mt-2 shadow-2xl">  
                        <div class="text-center">
                            <img src="{{ asset('images/user.png') }}" width="100" class="rounded-circle">
                        </div>
                        <div class="text-center mt-3">
                            <span class="bg-secondary p-1 px-4 rounded text-white">Pengusaha</span>
                            <h5 class="mt-2 mb-0">Alexender Schidmt</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mt-2 shadow-lg">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class=" mb-3">
                                    <input type="file" class="form-control" name="img" id="img">
                                    <input type="hidden" value="" name="oldimage">
                                    <img src="/images/user.png" class="mt-3" width="150px">
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="name" value="" id="floatingInput" placeholder="Name">
                                    <label for="floatingInput">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="jenis_usaha" value="" id="floatingInput" placeholder="Jenis_usaha">
                                    <label for="floatingInput">Jenis_usaha</label>
                                </div>
                                <button type="submit" class="btn  btn-primary btn-sm float-end"><i class="fa fa-save"></i>Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>