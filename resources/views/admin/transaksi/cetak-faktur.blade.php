<html>

<head>
    <title>Faktur Pembayaran</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">
    <center>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>Nama Toko</b></span></br>
                Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat
                Toko Alamat Toko </br>
                Telp : 0594094545
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:12pt'>FAKTUR PENJUALAN</span></b></br>
                No Trans. : {{ $transaksi->nomer_faktur }}</br>
                Tanggal :06 Januari 2022</br>
            </td>
        </table>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                Nama Kasir : {{ $transaksi->user->nama }}</br>
                Alamat : -
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                No Telp : -
            </td>
        </table>
        <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;'
            border='1'>

            <tr align='center'>
                <td width='10%'>Kode Obat</td>
                <td width='20%'>Nama Obat</td>
                <td width='13%'>Harga Satuan</td>
                <td width='4%'>Qty</td>
                <td width='7%'>Discount</td>
                <td width='13%'>Total Harga</td>
                @foreach ($detail_transaksi as $detail)
            <tr>
                <td>{{ $detail->kode_obat }}</td>
                <td>{{ $detail->nama_obat }}</td>
                <td>Rp.{{ number_format($detail->harga_satuan, 2, ',', '.') }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>Rp0,00</td>
                <td style='text-align:right'>Rp.{{ number_format($detail->total_harga, 2, ',', '.') }}</td>

            <tr>
                @endforeach
                {{-- <td colspan='6'>
                    <div style='text-align:right'>Terbilang : Dua Juta Empat Ratus Enam Puluh Ribu Rupiah</div>
                </td> --}}
            </tr>
            <tr>
                <td colspan='5'>
                    <div style='text-align:right'>Sub Total : </div>
                </td>
                <td style='text-align:right'>Rp.{{ number_format($transaksi->sub_total, 2, ',', '.') }}</td>
            </tr>
            {{-- <tr>
                <td colspan='5'>
                    <div style='text-align:right'>Kembalian : </div>
                </td>
                <td style='text-align:right'>Rp0,00</td>
            </tr>
            <tr>
                <td colspan='5'>
                    <div style='text-align:right'>DP : </div>
                </td>
                <td style='text-align:right'>Rp0,00</td>
            </tr>
            <tr>
                <td colspan='5'>
                    <div style='text-align:right'>Sisa : </div>
                </td>
                <td style='text-align:right'>Rp0,00</td>
            </tr> --}}
        </table>

        <table style='width:650px; margin-right: 130px; margin-top: 50px; font-size:7pt;' cellspacing='2'>
            <tr>
                {{-- <td align='center'>Diterima Oleh,</br></br><u>(............)</u></td> --}}
                {{-- <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td> --}}

                <td style="width: 100%" align='right'>TTD,</br></br> <img src="" alt="tanda tangan">
                    <br><u>(...............................)</u>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
