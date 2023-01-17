@extends('users.layouts.main')

@section('content')
<div class="row justify-content-center" style="margin-top: 100px">
    <div class="col-md-4">
        <a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm mb-1 shadow">Kembali <i class="bi bi-backspace ms-1"></i></a>
        <div class="card mt-2 shadow-lg">
            <div class="card-header">
                <div class="h4 text-center">Tambah Kategori</div>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('kategori')
                            is-invalid
                        @enderror" name="kategori" id="floatingInput" placeholder="kkk">
                        <label for="floatingInput">Kategori</label>
                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-sm float-end">Simpan <i class="bi bi-save ms-1" ></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection