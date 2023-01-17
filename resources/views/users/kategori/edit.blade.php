@extends('users.layouts.main')

@section('content')
<div class="row justify-content-center" style="margin-top: 100px">
    <div class="col-md-4">
        <a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm mb-1 shadow">Kembali <i class="bi bi-backspace ms-1"></i></a>
        <div class="card mt-2 shadow-lg">
            <div class="card-header">
                <div class="h4 text-center">Edit Kategori</div>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('kategori')
                            is-invalid
                        @enderror" value="{{ $data->kategori }}"  name="kategori" id="floatingInput" placeholder="kkk">
                        <label for="floatingInput">Kategori</label>
                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm float-end">Update <i class="bi bi-send-check" ></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection