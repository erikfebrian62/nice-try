<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
            <th>Tanggal</th>
            <th>Modal</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Laba</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->formatRupiah('modal') }}</td>
                    <td>{{ $item->barang }}</td>
                    <td>{{ $item->kategori->kategori }}</td>
                    <td>{{ $item->formatRupiah('harga_jual') }}</td>
                    <td>{{ $item->formatRupiah('laba') }}</td>
                    <td>
                        <button class="btn btn-warning" onclick="edit({{ $item->id }})"><i class="bi bi-pencil-square"></i></button>
                        <a href="#" class="btn btn-danger" data-id="{{ $item->id }}" data-nama="{{ $item->barang }}" onclick="destroy({{ $item->id }})"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
