<title>laporan Stok Akhir</title>
<div style="line-height: 7px; text-align: center; margin-bottom: 30px">
    <h2 style="font-weight: bold">Gapura Rahayu</h2>
    <p>Jababeka Fase III</p>
    <p>Tekno 1 Blok B1-K Kawasan Industri Jababeka phase 3, Pasirgombong,</p>
    <p> Kec. Cikarang Utara, Bekasi, Jawa Barat 17530</p>
    <p>Tlp : (021) 89840277 Fax : (6221) 8984 0278</p>
</div>
<hr>
<br>
<center>
    <h4>Laporan Stok Akhir</h4>
</center>
<hr /><br />
<table border="1" width="100%">
    <thead>
        <tr style="text-align:center">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama barang</th>
            <th>Stok Awal</th>
            <th>Total Masuk</th>
            <th>Total Keluar</th>
            <th>Stok Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataBarang as $no => $dt)
            <tr style="text-align:center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $dt['kode_barang'] }}</td>
                <td>{{ $dt['nama_barang'] }}</td>
                <td>{{ $dt['stok_awal'] }}</td>
                <td>{{ $dt['totalMasuk'] }}</td>
                <td>{{ $dt['totalKeluar'] }}</td>
                <td>{{ $dt['jumlah'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
