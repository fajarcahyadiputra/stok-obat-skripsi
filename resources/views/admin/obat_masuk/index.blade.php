@extends('admin.layout')
@section('title', 'Halaman Obat Masuk')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>DATA OBAT MASUK</h5>
                <a class="btn btn-primary" href="{{ route('obat-masuk.create') }}">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Supplier</th>
                                <th>Satuan</th>
                                <th>Jumlah Sebelumnya</th>
                                <th>Jumlah Masuk</th>
                                <th>Total Stok</th>
                                <th>Tanggal Masuk</th>
                                @if (auth()->user()->role == 'apoteker' || auth()->user()->role == 'manager')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat_masuk as $no => $dt)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $dt->obat->nama }}</td>
                                    <td>{{ $dt->supplier->nama }}</td>
                                    <td>{{ $dt->satuan->satuan }}</td>
                                    <td>{{ $dt->jumlah_sebelumnya }}</td>
                                    <td>{{ $dt->jumlah }}</td>
                                    <td>{{ $dt->total_stok }}</td>
                                    <td>{{ $dt->created_at }}</td>
                                    @if (auth()->user()->role == 'apoteker' || auth()->user()->role == 'manager')
                                        <td class="text-center">
                                            <a href="{{ route('obat-masuk.edit', ['obat_masuk' => $dt->id]) }}"
                                                id="btn-edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <button data-id="{{ $dt->id }}" id="btn-hapus"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            {{-- <button data-id="{{ $dt->id }}" id="btn-detail"
                                            class="btn btn-info btn-sm"><i class="fa fa-info"></i></button> --}}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!---Container Fluid-->
    </div>
@stop

@section('modal')
    <!-- Modal detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body detail-barang">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //datatable
            let table = $('#datatable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                async: true
            })

            $(document).on('click', '#btn-hapus', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Kamu Akan Menghapus Data Ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: `/obat-masuk/${id}`,
                            method: 'delete',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            dataType: 'json',
                            success: function(hasil) {
                                if (hasil) {
                                    Swal.fire(
                                        'sukses',
                                        'sukses hapus data',
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Gagal',
                                        'gagal hapus data',
                                        'error'
                                    )
                                }
                                setTimeout(() => {
                                    location.reload();
                                }, 800);
                            }
                        })
                    }
                })
            })
            //btn show data
            $(document).on('click', '#btn-detail', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: `/barang-masuk/${id}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(hasil) {
                        $(`.detail-barang`).html(`
                    <div class="modal-body">
                    <div class="form-group">
                        <label for="no_surat_jalan">Nomer Surat Jalan</label>
                        <input readonly required value="${hasil.no_surat_jalan}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="id_barang">Barang</label>
                        <input readonly required value="${hasil.barang.nama_barang}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="id_supplier">Supplier</label>
                        <input readonly required value="${hasil.supplier.nama}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="penerima">Penerima</label>
                        <input readonly required value="${hasil.penerima}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Masuk</label>
                        <input readonly required value="${hasil.jumlah}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Sebelumnya</label>
                        <input readonly required value="${hasil.jumlah_sebelumnya}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Setelahnya</label>
                        <input readonly required value="${hasil.total_stok}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>TGL Masuk</label>
                        <input readonly required value="${hasil.created_at}"  class="form-control">
                    </div>
                </div>
               `);
                        $('#modalDetail').modal('show');
                    }
                })
            })

        })
    </script>

@stop
