@extends('users.layouts.main')

@section('content')
<div class="">
    <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm mb-1 shadow">Tambah Data <i class="bi bi-plus-circle"></i></a>
</div>
<div class="card">
    <div class="card-body">
        <div class="my-1 col-12 p-2">
            <form action="{{ route('produk.index') }}" method="GET">
                <div class="input-group ">
                    <input type="search" class="form-control" name="search" placeholder="search" value="{{ request('search') }}" required>
                    <button class="input-group-text"><i class="bi bi-search mb-2"></i></button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead>
                    <th>No</th>
                    <th>Nama produk</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga modal</th>
                    <th>Aksi</th>
                </thead>
                    <tbody class="text-center">
                        @foreach ($product as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->stok }}</td>
                            <td>{{ $data->harga_modal }}</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            {{ $product->links() }}
        </div>
    </div>
</div>
@endsection
