<div class="table-responsive" >
    <table class="table table-striped text-center">
        <thead>
            <th>No</th>
            <th>Nama barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga modal</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->harga_modal }}</td>
                    <td>
                        <button class="btn btn-warning" onclick="edit({{ $item->id }})"><i class="bi bi-pencil-square"></i></button>
                        <a href="#" class="btn btn-danger" data-id="{{ $item->id }}" data-nama="{{ $item->nama_barang }}" onclick="destroy({{ $item->id }})"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>