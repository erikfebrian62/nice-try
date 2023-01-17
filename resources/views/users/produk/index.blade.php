@extends('users.layouts.main')

@section('content')
<div class="">
    <a href="#" class="btn btn-primary btn-sm mb-1 shadow" onclick="create()">Tambah Data <i class="bi bi-plus-circle"></i></a>
</div>
<div class="card">
    <div class="card-body">
      <input type="text" name="search" id="search" class="my-1 col-12 p-2 form-control" placeholder="search..">
      <div id="read">

      </div>  
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="page"></div>
        </div>
      </div>
    </div>
  </div>

@include('users.produk.components.main-ajax')