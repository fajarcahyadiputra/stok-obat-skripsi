@extends('admin.layout')
@section('title', 'Halaman Detail Transaksi')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>DATA DETAIL TRANSAKSI</h5>
                <a class="btn btn-warning" href="{{ URL::to('/order-obat') }}">Back</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Satuan</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_transaksi as $no => $dt)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $dt->kode_obat }}</td>
                                    <td>{{ $dt->nama_obat }}</td>
                                    <td>{{ $dt->satuan->satuan }}</td>
                                    <td>{{ $dt->jumlah }}</td>
                                    <td>Rp.{{ number_format($dt->harga_satuan, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="5">Sub Total:</th>
                                <td>Rp.{{ number_format($transaksi->sub_total, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!---Container Fluid-->
    </div>
@stop
