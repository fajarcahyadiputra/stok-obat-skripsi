@extends('admin.layout')
@section('title', 'Halaman Tambah Barang Masuk')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>TAMBAH ORDER</h5>
            </div>
            <div class="card-body">
                <form id="formTambah">
                    @csrf
                    <div class="modal-body">
                        <div class="box-barang">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kode_obat">Obat</label>
                                        <select class="custom-select" id="kode_obat">
                                            <option value="" disabled selected hidden>-- Pilih Obat --</option>
                                            @foreach ($obats as $obat)
                                                <option value="{{ $obat->kode_obat }}">
                                                    {{ $obat->nama . '-' . $obat->satuan->satuan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="satuan_id">Satuan Order</label>
                                        <select class="custom-select" id="satuan_id">
                                            <option value="" disabled selected hidden>-- Pilih Satuan --</option>
                                            @foreach ($satuans as $satuan)
                                                <option value="{{ $satuan->id }}">{{ $satuan->satuan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input data-index="1" type="number" id="jumlah" min="1" value=""
                                            class="form-control">
                                        <span class="alert-required text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Harga Satuan</label>
                                        <input readonly type="text" id="harga_satuan" min="1"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Total Harga</label>
                                        <input readonly type="text" id="total_harga" min="1" class="form-control">
                                        {{-- hidden input --}}
                                        <input readonly type="hidden" id="sisa_stok" min="1" class="form-control">
                                        <input readonly type="hidden" id="stok_sebelumnya"
                                            min="1"class="form-control">
                                    </div>
                                </div>

                                <div class=" d-flex align-items-center">
                                    {{-- <label for="">Add</label> --}}
                                    <button type="button" class="btn mt-3 btn-primary btn-add-to-cart"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        {{-- @dd(session()->get('dataObat')) --}}
                        <table class="table table-hover table-bordered table-striped">
                            <tr>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Satuan</th>
                                <th>Jumlah Order</th>
                                <th>Harga Satuan</th>
                                <th>Total Harga</th>
                            </tr>
                            @if (session()->has('dataObat'))
                                @php $sub_total_harga = 0; @endphp
                                @foreach (session()->get('dataObat') as $item)
                                    @php $sub_total_harga += $item['total_harga'] @endphp
                                    <tr class="text-center">
                                        <td>{{ $item['kode_obat'] }}</td>
                                        <td>{{ $item['nama_obat'] }}</td>
                                        <td>{{ $item['satuan'] }}</td>
                                        <td>{{ $item['jumlah_order'] }}</td>
                                        <td>Rp.{{ number_format($item['harga_satuan'], 2, ',', '.') }}</td>
                                        <td>Rp.{{ number_format($item['total_harga'], 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="5">Sub Total</th>
                                    <td class="text-center text-bold">Rp.{{ number_format($sub_total_harga, 2, ',', '.') }}
                                    </td>
                                </tr>
                            @endif
                        </table>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nomer_faktur">Nomer Faktur</label>
                                    <input required id="nomer_faktur" type="text" name="nomer_faktur" readonly
                                        value="{{ $no_faktur }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_transaksi">Tanggal Transaksi </label>
                                    <input required type="datetime-local" name="tanggal_transaksi"
                                        value="{{ date('Y-m-d H:i:s') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nik">Customer </label>
                                    <select required name="nik" class="custom-select" id="nik">
                                        <option value="" disabled selected hidden>-- Pilih Customer --</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->nik }}">{{ $customer->nama }} -
                                                {{ $customer->nik }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total_bayar">Total Bayar </label>
                                    <input required type="text" id="total_bayar" name="total_bayar" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kembalian">Kembalian </label>
                                    <input required readonly type="text" step="0" minlength="0" id="kembalian"
                                        name="kembalian" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kurang">Kurang</label>
                                    <input required readonly type="text" step="0" minlength="0" id="kurang"
                                        name="kurang" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="5"></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="{{ URL::to('/batal-order') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            //add barang to session
            $(document).on('click', '.btn-add-to-cart', function() {
                const kode_obat = $('#kode_obat').val();
                const jumlah_order = $('#jumlah').val();
                const stok_sebelumnya = $('#stok_sebelumnya').val();
                const satuan_id = $('#satuan_id').val();
                const sisa_stok = $('#sisa_stok').val();
                const harga_satuan = $('#harga_satuan').val();
                const total_harga = $('#total_harga').val();
                if (kode_obat === '' || jumlah_order === '' || stok_sebelumnya === '' || sisa_stok ===
                    '' ||
                    satuan_id === null || total_harga === '' || harga_satuan === '') {
                    Swal.fire(
                        'Gagal',
                        'Tidak Boleh Kosong',
                        'error'
                    )
                    return false;
                }
                $.ajax({
                    url: "{{ route('tambahObatToCart') }}",
                    data: {
                        kode_obat,
                        jumlah_order,
                        stok_sebelumnya,
                        satuan_id,
                        sisa_stok,
                        harga_satuan,
                        total_harga,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    type: "POST",
                    success: function(hasil) {
                        if (hasil) {
                            Swal.fire(
                                'sukses',
                                'sukses menambah data ke keranjang',
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Gagal',
                                'gagal menambah data ke keranjang',
                                'error'
                            ).then(() => {
                                location.reload();
                            })
                        }
                    }
                })
            })
            //check stok
            $(document).on('keyup change', '#jumlah, #satuan_id', function() {
                const kode_obat = $(`#kode_obat`).val();
                const satuan_id = $(`#satuan_id`).val();
                var jumlah_order = $(this).val();

                $('.alert-required').html(``);
                if (kode_obat === undefined || kode_obat === '' || kode_obat === null) {
                    $('.alert-required').html(`Obat Harus Di Pilih Dahulu`);
                    $('#btn-add').attr('disabled', 'disabled');
                    return false;
                }
                if (satuan_id === undefined || satuan_id === '' || satuan_id === null) {
                    $('.alert-required').html(`Satuan Harus Di Pilih Dahulu`);
                    $('#btn-add').attr('disabled', 'disabled');
                    return false;
                }
                $.ajax({
                    url: '/order-obat',
                    data: {
                        checkStok: true,
                        kode_obat,
                        satuan_id,
                        jumlah_order,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function(result) {
                        let jumlah = result.jumlah;
                        $(`#harga_satuan`).val(formatRupiah(result.harga_satuan));
                        $(`#total_harga`).val(formatRupiah(result.total_harga))
                        $(`#sisa_stok`).val(result.sisa_obat);
                        $(`#stok_sebelumnya`).val(result.jumlah);
                    }
                })
            })
            //kembalian action
            $(document).on("change", "#total_bayar", function() {
                const value = $(this).val();
                $(this).val(formatRupiah(value))
            })
            $(document).on("keyup", "#total_bayar", function() {
                const total_harga = parseInt("{{ $sub_total_harga }}");
                const total_bayar = $(this).val();
                const result = total_harga - total_bayar;
                $("#kurang").val(0)
                $("#kembalian").val(0)
                if (total_harga > total_bayar) {
                    $('#kurang').val(formatRupiah(result))
                } else {
                    const kembalian = total_harga - total_bayar;
                    $("#kembalian").val(formatRupiah(parseInt(kembalian.toString().replace(/\-/g, ''))))
                }
                // $(this).val(result)
            })
            //format rupiah
            const formatRupiah = (money) => {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(money);
            }

            $(document).on('submit', '#formTambah', function(e) {
                e.preventDefault();
                const data = $(this).serialize();

                $.ajax({
                    url: '/order-obat',
                    data: data,
                    dataType: 'json',
                    type: 'post',
                    success: function(hasil) {
                        // console.log(hasil);
                        // return false;
                        if (hasil) {
                            Swal.fire(
                                'sukses',
                                'sukses menambah data',
                                'success'
                            ).then(() => {
                                document.location.href = '/order-obat';
                            })
                        } else {
                            Swal.fire(
                                'Gagal',
                                'gagal menambah data',
                                'error'
                            )
                        }
                    }
                })
            })
            //end

        })
    </script>
@endsection
