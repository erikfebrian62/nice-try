@push('js')
<script>
    $(document).ready(function () {
        read()
    });

    // Meload data pada table
    function read() {
        $.get("{{ route('kelola-produk.read') }}", {}, function(data, status) {
            $("#read").html(data);
        });
    }

    //untuk modal halaman create
    function create() {
        $.get("{{ route('kelola-produk.create') }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Tambah Produk');
            $("#page").html(data);
            $("#exampleModal").modal('show');  
        });
    }

    //untuk proses create data
    function store() {
        $.ajax({
            url:"{{ route('kelola-produk.store') }}",
            type:"get",
            data: {
                user_id : $('#user_id').val(),
                nama_barang : $('#nama_barang').val(),
                kategori : $('#kategori').val(),
                stok : $('#stok').val(),
                harga_modal : $('#harga_modal').val()
            },
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
    }

    //untuk modal halaman edit
    function edit(id) {
        $.get("{{ url('/kelola-produk/edit') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Edit Produk')
            $("#page").html(data);
            $("#exampleModal").modal('show');
            });
    }

    //untuk proses update data
    function update(id) {
            $.ajax({
                url:"{{ url('/kelola-produk/update') }}/" + id,
                type:"get",
                data: {
                    user_id : $('#user_id').val(),
                    nama_barang : $('#nama_barang').val(),
                    kategori : $('#kategori').val(),
                    stok : $('#stok').val(),
                    harga_modal : $('#harga_modal').val()
                },
                    success: function(data) {
                        $(".btn-close").click();
                        read()
                    }
                });
        }
    
    // untuk proses delete data
    function destroy(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Yakin?',
            text: "kamu akan menghapus data ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak, batal!',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                url:"{{ url('/kelola-produk/') }}/" + id,
                type:"get",
                data: {
                    user_id : $('#user_id').val(),
                    nama_barang : $('#nama_barang').val(),
                    kategori : $('#kategori').val(),
                    stok : $('#stok').val(),
                    harga_modal : $('#harga_modal').val()
                },
                    success: function(data) {
                        read()
                    }
                });
                swalWithBootstrapButtons.fire(
                'Success!',
                'Data berhasil dihapus.',
                'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Dibatalkan',
                'Data kamu aman :).',
                'error'
                )
            }
        })
    }

</script>
@endpush
