<title>laporan Order Obat</title>
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
    <h4>Laporan Order Obat</h4>
</center>
<hr /><br />
<table style="width: 100%">
    <thead>
        <tr style="text-align:center">
            <th>No</th>
            <th>Nama Customer</th>
            <th>Kasir</th>
            <th>Total Pembelian</th>
            <th>Tanggal Pembelian</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $no => $dt)
            <tr style="text-align:center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $dt->customer->nama }}</td>
                <td>{{ $dt->user->nama }}</td>
                <td>Rp.{{ number_format($dt->sub_total, 2, ',', '.') }}</td>
                <td>{{ $dt->tanggal_transaksi }}</td>
                <td>{{ $dt->keterangan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
