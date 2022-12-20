<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ObatMasuk;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat_masuk = ObatMasuk::all();
        // $kode_barang = Barang::generateKode();
        return view('admin.obat_masuk.index', compact('obat_masuk'));
    }
    public function create()
    {
        $obat = Obat::all();
        $supplier = Supplier::all();
        $kode_obat = Obat::generateKode();
        $satuans = Satuan::all();
        return view('admin.obat_masuk.create_obat_masuk', compact('obat', 'supplier', 'kode_obat', 'satuans'));
    }
    public function store(Request $request)
    {
        if ($request->input('checkStok')) {
            $kode_obat = $request->input('kode_obat');
            $obat = Obat::with("satuan")->find($kode_obat);
            return response()->json($obat);
        }
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $obat = Obat::find($data['kode_obat']);
            ObatMasuk::create($data);
            $obat->fill([
                'jumlah' => $data['jumlah'] + $obat->jumlah
            ]);
            $obat->save();
            DB::commit();
            return response()->json(true);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
            // throw $th->getMessage();
        }
    }
    public function destroy($id)
    {
        $obatMasuk = ObatMasuk::find($id);
        if ($obatMasuk) {
            $obat = Obat::find($obatMasuk->kode_obat);
            $total = $obat->jumlah - $obatMasuk->jumlah;
            Obat::where('kode_obat', $obatMasuk->kode_obat)->update([
                'jumlah' => $total
            ]);
            $obatMasuk->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $barang = ObatMasuk::with('obat:satuan', 'supplier')->find($id);
        return response()->json($barang);
    }
    public function edit($id)
    {
        $obat = Obat::all();
        $supplier = Supplier::all();
        $obatMasuk = ObatMasuk::find($id);
        $satuans = Satuan::all();
        return view('admin.obat_masuk.edit_obat_masuk', compact('obat', 'supplier', 'obatMasuk', 'satuans'));
    }
    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $obatMasuk = ObatMasuk::find($id);
            $data = $request->except('_token');
            $obatMasuk->fill($data);
            $obatMasuk->save();

            $obat = Obat::find($data['kode_obat']);
            $data['jumlah_sebelumnya'] = $data['total_stok'];
            $obat->fill([
                'jumlah' => $data['total_stok']
            ]);
            $obat->save();
            DB::commit();
            return response()->json(true);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(true);
            //throw $th;
        }
    }
}
