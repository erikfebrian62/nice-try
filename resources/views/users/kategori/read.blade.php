<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
            <th>No</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        <button class="btn btn-warning" onclick="ubah({{ $item->id }})"><i class="bi bi-pencil-square"></i></button>
                        <a href="#" class="btn btn-danger" data-id="{{ $item->id }}" onclick="hapus({{ $item->id }})"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
