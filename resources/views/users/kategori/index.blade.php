@extends('users.layouts.main')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm mb-1 shadow">Tambah Kategori <i class="bi bi-plus-circle"></i></a>
    <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped text-center">
              <thead>
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                @php
                  $nomor = 1 + (($data->currentpage()-1) * $data->perPage());
                @endphp
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $nomor++ }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                      <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                      <a href="#" class="btn btn-danger btn-sm btndelete" data-id="{{ $item->id }}" data-nama="{{ $item->kategori }}"><i class="bi bi-trash"></i>
                    </td>
                  </tr> 
                @endforeach
              </tbody>
            </table>
            {{ $data->links() }}
          </div>  
        </div>
    </div>
  </div>
</div>

@endsection

@push('js')
    <script>
      $('.btndelete').click( function(){
          var categoriid = $(this).attr('data-id');
          var categori = $(this).attr('data-nama');
          const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger me-2'
                  },
                  buttonsStyling: false
                  })
                  swalWithBootstrapButtons.fire({
                  title: 'Yakin?',
                  text: "Akan menghapus categori "+categori+"" ,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Ya, hapus!',
                  cancelButtonText: 'Tidak, batal!',
                  reverseButtons: true
                  }).then((result) => {
                  if (result.isConfirmed) {
                      window.location = "/kategori/"+categoriid+""
                      swalWithBootstrapButtons.fire(
                      'Terhapus!',
                      'Data berhasil dihapus.',
                      'success',
                      )
                  } else if (
                      /* Read more about handling dismissals below */
                      result.dismiss === Swal.DismissReason.cancel
                  ) {
                      swalWithBootstrapButtons.fire(
                      'Dibatalkan',
                      'Data aman :)',
                      'error'
                      )
                  }
                  });
      });
    </script>

{{-- alert toast untuk tambah data --}}
    <script>
        @if (Session::has('cbt'))
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
           title: '{{ Session::get('cbt') }}'
           })
        @endif
    </script>

{{-- alert toast untuk update data --}}
    <script>
      @if (Session::has('cbu'))
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
        title: '{{ Session::get('cbu') }}'
        })
      @endif
    </script>

{{-- alert toast untuk delete data --}}
    <script>
      @if (Session::has('cbh'))
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
        title: '{{ Session::get('cbh') }}'
        })
      @endif
    </script>
@endpush
