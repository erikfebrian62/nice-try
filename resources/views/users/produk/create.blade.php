@extends('users.layouts.main')

@section('content')
    <div class="card">
        <div class="my-2 text-center fw-bold">
            <h1>Tambah Data</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('produk.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nama_barang" id="floatingInput" placeholder="kkkk" required>
                    <label for="floatingInput">Nama barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="kategori" id="floatingInput" placeholder="kkk" required>
                    <label for="floatingInput">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stok" id="floatingInput" placeholder="kkk" required>
                    <label for="floatingInput">Stok</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="harga_modal" id="floatingInput" placeholder="Passsword" required>
                    <label for="floatingInput">Harga modal</label>
                </div>
                <button type="submit" class="btn  btn-success btn-md float-end">Simpan <i class="bi bi-save" ></i></button>
            </form>
        </div>
    </div>
@endsection