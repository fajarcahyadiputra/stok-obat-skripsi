<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $transaksiHariIni = Transaksi::whereDate("tanggal_transaksi", date('Y-m-d'))->get();
        $total_price = array_sum(array_column($transaksiHariIni->toArray(), 'sub_total'));
        $total_transaksi = $transaksiHariIni->count();
        return view('admin.dashboard', compact("total_price", 'total_transaksi'));
    }
}
