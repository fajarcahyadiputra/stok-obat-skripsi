<title>laporan Obat Masuk</title>
<div style="line-height: 7px; text-align: center; margin-bottom: 30px">
    <h2 style="font-weight: bold">Apotek Swadaya Sehat</h2>
    <p>Jl. Swadaya Raya No.29, RT.9/RW.5,</p>
    <p>Duren Sawit, Kec. Duren Sawit,</p>
    <p>Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13440</p>
</div>
<hr>
<br>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<center>
    <h4>Laporan Obat Masuk</h4>
</center>
<hr /><br />
<table width="100%">
    <thead>
        <tr style="text-align:center">
            <th>No</th>
            <th>Nama Obat</th>
            <th>Nama Supplier</th>
            <th>Tanggal</th>
            <th>Stok Awal</th>
            <th>Total Masuk</th>
            <th>Stok Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($obat_masuk as $no => $dt)
            <tr style="text-align:center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $dt->obat->nama }}</td>
                <td>{{ $dt->supplier->nama }}</td>
                <td>{{ $dt->created_at }}</td>
                <td>{{ $dt->jumlah_sebelumnya }}</td>
                <td>{{ $dt->jumlah }}</td>
                <td>{{ $dt->total_stok }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
