<input type="hidden"  name="user_id" value="{{ Auth::user()->id }}" id="user_id">
<div class="form-floating mb-3">
    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="kkkk">
    <label for="nama_barang">Nama barang</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" name="kategori" id="kategori" placeholder="kkk">
    <label for="kategori">Kategori</label>
</div>
<div class="form-floating mb-3">
    <input type="number" class="form-control" name="stok" id="stok" placeholder="kkk">
    <label for="stok">Stok</label>
</div>
<div class="form-floating mb-3">
    <input type="number" class="form-control" name="harga_modal" id="harga_modal" placeholder="kkk">
    <label for="harga_modal">Harga modal</label>
</div>
<div class="form-group">
    <button type="button" class="btn  btn-success btn-md float-end" onclick="store()">Simpan <i class="bi bi-save" ></i></button>
</div>