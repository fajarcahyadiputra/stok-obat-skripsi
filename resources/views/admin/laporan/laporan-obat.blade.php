<title>laporan Obat</title>
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
    <h4>Laporan Obat</h4>
</center>
<hr /><br />
<table width="100%">
    <thead>
        <tr style="text-align:center">
            <th>No</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Stok Awal</th>
            <th>Stok Masuk</th>
            <th>Stok Keluar</th>
            <th>Stok Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($obats as $no => $dt)
            @php
                $totalStokKeluar = 0;
                foreach ($dt->detailTransaksi as $order) {
                    if ($order->obat->satuan_id != $order->satuan_id) {
                        $totalStokKeluar += $order->satuan->jumlah_persatuan * $order->jumlah;
                    } else {
                        $totalStokKeluar += $order->jumlah;
                    }
                }
                // $totalStokKeluar = array_sum(array_column($dt->detailTransaksi->toArray(), 'jumlah'));
                $totalStokMasuk = array_sum(array_column($dt->obatMasuk->toArray(), 'jumlah'));
            @endphp
            <tr style="text-align:center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $dt->kode_obat }}</td>
                <td>{{ $dt->nama }}</td>
                <td>{{ $dt->stok_awal }}</td>
                <td>{{ $totalStokMasuk }}</td>
                <td>{{ $totalStokKeluar }}</td>
                <td>{{ $dt->stok_awal + $totalStokMasuk - $totalStokKeluar }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
