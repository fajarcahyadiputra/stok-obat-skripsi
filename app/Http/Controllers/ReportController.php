<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\DetailBarangkeluar;
use App\Models\Obat;
use App\Models\ObatMasuk;
use App\Models\Satuan;
use App\Models\Transaksi;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index_laporan');
    }
    public function reportPdf()
    {
        if (request()->input('dari') &&  request()->input('sampai')) {
            $dari =   Carbon::createFromFormat('Y-m-d', request()->input('dari'));
            $sampai = Carbon::createFromFormat('Y-m-d', request()->input('sampai'));
        }
        if (request()->input('laporan') == 'order') {
            //laporan order
            if (request()->input('option-report') == "all") {
                $orders = Transaksi::with("user", "customer")->get();
            } else {
                $orders = Transaksi::with("user", "customer")->whereDate('created_at', '>=', $dari)
                    ->whereDate('created_at', '<=', $sampai)->get();
            }
            return PDF::loadView('admin.laporan.laporan-order-obat', compact('orders'))->stream('laporan_order_obat.pdf');
        } else if (request()->input('laporan') == "obat-masuk") {
            //laporan obat masuk
            if (request()->input('option-report') == "all") {
                $obat_masuk = ObatMasuk::with("obat", "supplier", "satuan")->get();
            } else {
                $obat_masuk = ObatMasuk::with("obat", "supplier", "satuan")->whereDate('created_at', '>=', $dari)
                    ->whereDate('created_at', '<=', $sampai)->get();
            }
            // dd($obat_masuk);
            return PDF::loadView('admin.laporan.laporan-obat-masuk', compact('obat_masuk'))->stream('laporan_obat_masuk.pdf');
        } else if (request()->input('laporan') == "customer") {
            //laporan customer
            if (request()->input('option-report') == "all") {
                $customers = Customer::all();
            } else {
                $customers = Customer::whereDate('created_at', '>=', $dari)
                    ->whereDate('created_at', '<=', $sampai)->get();
            }
            return PDF::loadView('admin.laporan.laporan-customer', compact('customers'))->stream('laporan_customer.pdf');
        } else if (request()->input('laporan') == "obat") {
            //laporan obat
            if (request()->input('option-report') == "all") {
                $obats = Obat::with(['obatMasuk', 'detailTransaksi' => function ($query) {
                    $query->with('satuan', 'obat');
                    // $query->select('satuan.satuan', 'satuan.jumlah_persatuan');
                }])->get();
            } else {
                $obats = Obat::with(["detailTransaksi" => function ($q) {
                    $q->select("satuan.satuan * detailTransaksi.jumlah as jumlah_keluar");
                    $q->join('satuan', 'satuan.id', '=', 'detailTransaksi.satuan_id');
                }])->with(['obatMasuk'])->whereDate('created_at', '>=', $dari)
                    ->whereDate('created_at', '<=', $sampai)->get();
            }
            // dd($obats);
            return PDF::loadView('admin.laporan.laporan-obat', compact('obats'))->stream('laporan_obat.pdf');
        }
    }
}
