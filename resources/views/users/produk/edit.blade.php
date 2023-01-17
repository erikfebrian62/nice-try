<input type="hidden"  name="user_id" value="{{ Auth::user()->id }}" id="user_id">
<div class="form-floating mb-3">
    <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $product->tanggal }}" placeholder="kkkk">
    <label for="tanggal">Tanggal</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" name="barang" id="barang" value="{{ $product->barang }}" placeholder="kkkk">
    <label for="barang">Nama Barang</label>
</div>
<div class="mb-3">
    <select class="form-select" id="kategori_id" aria-label="Default select example" name="kategori_id">
        <option selected value="{{ $product->kategori_id }}">{{ $product->kategori->kategori }}</option>
        @foreach ($categori as $item)
            <option value="{{ $item->id }}">{{ $item->kategori }}</option>    
        @endforeach
    </select>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" name="modal" id="modal" value="{{ $product->modal }}" placeholder="kkkk">
    <label for="modal">Modal</label>
</div>
<div class="form-floating mb-3">  
    <input type="textarea" class="form-control" name="jumlah" id="jumlah" value="{{ $product->jumlah }}" placeholder="kkk">
    <label for="jumlah">Jumlah Barang</label>
</div>
<div class="form-floating mb-3">  
    <input type="textarea" class="form-control" name="harga_jual" id="harga_jual" value="{{ $product->harga_jual }}" placeholder="kkk">
    <label for="harga_jual">Harga Jual</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" name="laba" id="laba" value="{{ $product->laba }}" placeholder="kkk">
    <label for="laba">Laba</label>
</div>
<div class="form-group">
    <button type="button" class="btn  btn-warning btn-md float-end" onclick="update({{ $product->id }})">Update <i class="bi bi-send-check" ></i></button>
</div>