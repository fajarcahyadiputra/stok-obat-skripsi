<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Obat;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with("customer")->orderBy("tanggal_transaksi", "ASC")->get();
        // $kode_barang = Barang::generateKode();
        return view('admin.transaksi.index', compact('transaksi'));
    }
    public function create()
    {
        $obats = Obat::all();
        $no_faktur = Transaksi::generateNoFaktur();
        $satuans = Satuan::all();
        $customers = Customer::all();
        return view('admin.transaksi.create_order', compact('obats', 'no_faktur', 'satuans', 'customers'));
    }
    public function store(Request $request)
    {
        if ($request->input('checkStok')) {
            $kode_obat = $request->input('kode_obat');
            $jumlah_order = $request->input('jumlah_order');
            $satuan_id = $request->input('satuan_id');

            $obat = Obat::find($kode_obat);
            $satuan_beli = Satuan::find($satuan_id);
            if ($satuan_beli->id != $obat->satuan_id) {
                // if (str_contains($satuan->satuan, "strip")) {
                // } else {
                // }
                $jumlah_order_satuan = $satuan_beli->jumlah_persatuan * $jumlah_order;
                $obat['jumlah_order_satuan'] = $jumlah_order_satuan;
                $obat['sisa_obat'] = $obat->jumlah - $jumlah_order_satuan;
                $obat['total_harga'] = $obat->harga_satuan * $jumlah_order_satuan;
            } else {
                $obat['sisa_obat'] = $obat->jumlah - $jumlah_order;
                $obat['total_harga'] = $obat->harga_satuan * $jumlah_order;
                $obat['jumlah_order_satuan'] =  $jumlah_order;
            }
            return response()->json($obat);
        }
        try {
            if (!request()->session()->exists('dataObat')) {
                return response()->json(false);
            }
            $data = $request->except('_token');
            $cartData = request()->session()->get('dataObat');
            $data['kasir'] = auth()->user()->id;
            $data['status_transkasi'] = 'success';
            $data['sub_total'] = array_sum(array_column($cartData, 'total_harga'));
            DB::beginTransaction();
            $create = Transaksi::create($data);
            if (request()->session()->exists('dataObat')) {
                foreach ($cartData as $key => $br) {
                    $obat = Obat::find($br['kode_obat']);
                    $obat->fill([
                        'jumlah' =>  $br['sisa_stok']
                    ]);
                    $obat->save();
                    DetailTransaksi::create([
                        'nomer_faktur' => $data['nomer_faktur'],
                        'kode_obat' => $br['kode_obat'],
                        'nama_obat' => $br['nama_obat'],
                        'satuan_id' => $br['satuan_id'],
                        'sisa_stok' => $br['sisa_stok'],
                        'stok_sebelumnya' => $br['stok_sebelumnya'],
                        'jumlah' => $br['jumlah_order'],
                        'harga_satuan' => $br['harga_satuan'],
                        'total_harga' => $br['total_harga'],
                    ]);
                }
            }
            DB::commit();
            request()->session()->forget('dataObat');
            return response()->json(true);
        } catch (\ErrorException $er) {
            DB::rollBack();
            return response()->json(false);
        }
    }
    public function batal()
    {
        // dd("oko");
        request()->session()->forget('dataObat');
        return redirect()->route('transaksi.show');
    }
    public function destroy($id)
    {
        $orderObat = Transaksi::find($id);
        if ($orderObat) {
            foreach (DetailTransaksi::where('nomer_faktur', $orderObat->id)->get() as $detail) {
                $obat = Obat::find($detail->id_barang);
                $total = $obat->jumlah + $detail->jumlah;
                Obat::where('id', $detail->id_barang)->update([
                    'jumlah' => $total
                ]);
            }
            DetailTransaksi::where('id_barang_keluar', $orderObat->id)->delete();
            $orderObat->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $obat = Transaksi::with('barang')->find($id);
        return response()->json($obat);
    }
    public function edit($id)
    {
        $obat = Obat::all();
        // $customer = Customer::all();
        $obatkeluar = Transaksi::find($id);
        return view('admin.barang_keluar.edit_barang_keluar', compact('barang', 'barangkeluar'));
    }
    public function update($id, Request $request)
    {
        $data = $request->except('_token', 'tgl_keluar');
        $obat = Transaksi::find($id);
        $data['created_at'] = $request->input('tgl_keluar') . date('H:m:i');
        $obat->fill($data);
        if ($obat->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function cetakFakturPdf($nomer_faktur)
    {
        $transaksi = Transaksi::with("user")->find($nomer_faktur);
        $detail_transaksi = DetailTransaksi::with('obat', 'satuan')->where('nomer_faktur', $transaksi->nomer_faktur)->get();
        return view('admin.transaksi.cetak-faktur', compact('transaksi', 'detail_transaksi'));
    }
    public function addCart()
    {
        $dataObat = request()->except("_token");
        $obat = Obat::find($dataObat['kode_obat']);
        $satuan = Satuan::find($dataObat['satuan_id']);
        $dataObat['kode_obat'] = $obat->kode_obat;
        $dataObat['nama_obat'] = $obat->nama;
        $dataObat['satuan'] = $satuan->satuan;
        $dataObat['total_harga'] = preg_replace('/\D/', '', $dataObat['total_harga']);
        $dataObat['harga_satuan'] = preg_replace('/\D/', '', $dataObat['harga_satuan']);
        // unset($dataObat['satuan_id'])
        if (request()->session()->exists('dataObat') && !empty(session()->get('dataObat'))) {
            request()->session()->push('dataObat', $dataObat);
        } else {
            request()->session()->put('dataObat', []);
            request()->session()->push('dataObat', $dataObat);
        }
        return response(true);
    }
    public function detailTransaksi($nomer_faktur)
    {
        $transaksi = Transaksi::find($nomer_faktur);
        $detail_transaksi = DetailTransaksi::with('obat')->where('nomer_faktur', $nomer_faktur)->get();
        return view('admin.transaksi.detail-transaksi', compact('detail_transaksi', 'transaksi'));
    }
}
