@extends('users.layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card mt-2 shadow-lg">
            <div class="card-body">
                <form action="{{ route('profile.proces',auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class=" mb-3">
                        <input type="file" class="form-control" name="img" id="img">
                        <input type="hidden" value="" name="oldimage">
                        <img src="{{ asset('images/'. Auth::user()->img) }}" class="mt-3" width="150px">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" id="floatingInput" placeholder="Name">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="jenis_usaha" value="{{ Auth::user()->jenis_usaha }}" id="floatingInput" placeholder="Jenis_usaha">
                        <label for="floatingInput">Jenis_usaha</label>
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm float-end">Update <i class="bi bi-send-check ms-1" ></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        @if (Session::has('profile'))
        const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
           })
           Toast.fire({
           icon: 'success',
           title: '{{ Session::get('profile') }}'
           })
        @endif
    </script>
@endpush