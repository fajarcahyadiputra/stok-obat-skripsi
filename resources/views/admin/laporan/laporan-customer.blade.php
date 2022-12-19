<title>laporan List Customer</title>
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
    <h4>Laporan List Customer</h4>
</center>
<hr /><br />
<table width="100%">
    <thead>
        <tr style="text-align:center">
            <th>No</th>
            <th>NIK</th>
            <th>Nama Customer</th>
            <th>Nomer Telepon</th>
            <th>Alamat</th>
            <th>Tanggal Daftar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $no => $dt)
            <tr style="text-align:center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $dt->nik }}</td>
                <td>{{ $dt->nama }}</td>
                <td>{{ $dt->nomer_tlpn }}</td>
                <td>{{ $dt->alamat }}</td>
                <td>{{ $dt->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
