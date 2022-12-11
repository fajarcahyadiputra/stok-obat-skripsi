<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\DetailBarangkeluar;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index_laporan');
    }
    public function laporanPdf()
    {
        if (request()->input('dari') &&  request()->input('sampai')) {
            $dari =   Carbon::createFromFormat('Y-m-d', request()->input('dari'));
            $sampai = Carbon::createFromFormat('Y-m-d', request()->input('sampai'));
        }
        if (request()->input('laporan') == 'masuk') {
            $dataMasuk = BarangMasuk::laporan($dari, $sampai);
            return PDF::loadView('admin.barang_masuk.reportPdf', compact('dataMasuk'))->stream('laporan_barang_masuk.pdf');
        } else if (request()->input('laporan') == "keluar") {
            $barang_keluar = DetailBarangkeluar::laporan($dari, $sampai);
            return PDF::loadView('admin.barang_keluar.reportPdf', compact('barang_keluar'))->stream('laporan_barang_keluar.pdf');
        } else {
            $dataBarang = [];
            // $stokAkhir = Barang::with('barangkeluar', 'barangMasuk')->whereBetween('created_at', [$dari, $sampai])->get()->toArray();
            $stokAkhir = Barang::with('barangkeluar', 'barangMasuk')->get()->toArray();
            foreach ($stokAkhir as $barang) {
                $totalkeluar = 0;
                $totalmasuk = 0;
                foreach ($barang['barangkeluar'] as $barangkeluar) {
                    $totalkeluar +=  $barangkeluar['jumlah'];
                }
                if (count($barang['barang_masuk']) > 0) {
                    foreach ($barang['barang_masuk'] as $barangMasuk) {
                        $totalmasuk +=  $barangMasuk['jumlah'];
                    }
                }
                $barang['totalKeluar'] = $totalkeluar;
                $barang['totalMasuk'] = $totalmasuk;
                array_push($dataBarang, $barang);
            }
            return PDF::loadView("admin.barang.reportStokAkhir", ['dataBarang' => $dataBarang])->stream("laporan_stok_barang_akhir.pdf");
        }
    }
}
