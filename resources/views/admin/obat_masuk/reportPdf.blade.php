<title>laporan Barang Masuk</title>
<div style="line-height: 7px; text-align: center; margin-bottom: 30px">
    <h2 style="font-weight: bold">Gapura Rahayu</h2>
    <p>Jl.kh agussalim</p>
    <p>Rt/Rw 07/010 kel Bekasi jaya,</p>
    <p>Bekasi Timur Kota Bekasi jawa barat</p>
</div>
<hr>
<br>
<center>
    <h4>Laporan Barang Masuk</h4>
</center>
<hr /><br />
<table border="1" width="100%">
    <thead>
        <tr style="text-align: center">
            <th>No</th>
            <th>Nomer SJ</th>
            <th>Barang</th>
            <th>Supplier</th>
            <th>Penerima</th>
            <th>Jumlah</th>
            <th>Stok Total</th>
            <th>TGL Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataMasuk as $no => $dt)
            <tr style="text-align: center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $dt->no_surat_jalan }}</td>
                <td>{{ $dt->nama_barang }}</td>
                <td>{{ $dt->nama }}</td>
                <td>{{ $dt->penerima }}</td>
                <td>{{ $dt->jumlah }}</td>
                <td>{{ $dt->total_stok }}</td>
                <td>{{ $dt->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
