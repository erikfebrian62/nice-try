<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers" class="text-center">
  <tr>
    <th>Tanggal</th>
    <th>Modal</th>
    <th>Nama Barang</th>
    <th>Kategori</th>
    <th>Harga Jual</th>
    <th>Laba</th>
  </tr>
  @foreach ($data as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->formatRupiah('modal') }}</td>
                    <td>{{ $item->barang }}</td>
                    <td>{{ $item->kategori->kategori }}</td>
                    <td>{{ $item->formatRupiah('harga_jual') }}</td>
                    <td>{{ $item->formatRupiah('laba') }}</td>
                </tr>
  @endforeach
</table>

</body>
</html>


