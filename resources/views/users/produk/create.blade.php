<input type="hidden"  name="user_id" value="{{ Auth::user()->id }}" id="user_id">
<div class="form-floating mb-3">
    <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="kkkk">
    <label for="tanggal">Tanggal</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" name="barang" id="barang" placeholder="kkkk">
    <label for="barang">Nama Barang</label>
</div>
<div class="mb-3">
    <select class="form-select" id="kategori_id" aria-label="Default select example" name="kategori_id">
        <option selected>kategori</option>
        @foreach ($categori as $item)
            <option value="{{ $item->id }}">{{ $item->kategori }}</option>    
        @endforeach
    </select>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" name="modal" id="modal" placeholder="kkkk">
    <label for="modal">Modal</label>
</div>
<div class="form-floating mb-3">  
    <input type="textarea" class="form-control" name="jumlah" id="jumlah" placeholder="kkk">
    <label for="jumlah">Jumlah Barang</label>
</div>
<div class="form-floating mb-3">  
    <input type="textarea" class="form-control" name="harga_jual" id="harga_jual" placeholder="kkk">
    <label for="harga_jual">Harga Jual</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" name="laba" id="laba" placeholder="kkk">
    <label for="laba">Laba</label>
</div>
<div class="form-group">
    <button type="button" class="btn  btn-success btn-md float-end" onclick="store()">Simpan <i class="bi bi-save" ></i></button>
</div>