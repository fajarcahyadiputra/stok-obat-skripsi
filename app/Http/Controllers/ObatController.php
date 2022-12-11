<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obats = Obat::with("satuan")->get();
        $satuans = Satuan::all();
        $kode_obat = Obat::generateKode();
        return view('admin.obat.index', compact('obats', 'kode_obat', 'satuans'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        //buat upload gambar
        if ($request->hasFile('pic')) {
            if ($request->file('pic')->isValid()) {
                $fileName = time() . '-' . date('M') . '.' . $request->file('pic')->extension();
                $request->file('pic')->move(public_path('assets/image/obat'), $fileName);
                $data['pic'] = "assets/image/obat/$fileName";
            }
        }
        $create = Obat::create($data);
        if ($create) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($kode_obat)
    {
        $obat = Obat::find($kode_obat);
        if ($obat) {
            $obat->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($kode_obat)
    {
        $obat = Obat::with("satuan")->find($kode_obat);
        return response()->json($obat);
    }
    public function update($kode_obat, Request $request)
    {
        $obat = Obat::find($kode_obat);
        if ($obat) {
            $data = $request->except('_token');
            // if ($obat->stok_awal != $data['stok_awal']) {
            //     if ($data['stok_awal'] > $obat->stok_awal) {
            //         $total =  $data['stok_awal'] - $obat->stok_awal;
            //         $data['jumlah'] = $obat->jumlah + $total;
            //     } else {
            //         $total =   $obat->stok_awal - $data['stok_awal'];
            //         $data['jumlah'] = $obat->jumlah - $total;
            //     }
            // }
            if ($request->hasFile('pic')) {
                if ($request->file('pic')->isValid()) {
                    if (file_exists(public_path($request->file("pic")) && $request->file("pic") != null)) {
                        unlink(public_path($request->file("pic")));
                    }
                    $fileName = time() . '-' . date('M') . '.' . $request->file('pic')->extension();
                    $request->file('pic')->move(public_path('assets/image/pic'), $fileName);
                    $data['pic'] = "assets/image/pic/$fileName";
                }
            }
            $obat->fill($data);
            if ($obat->save()) {
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        } else {
            return response()->json(false);
        }
    }
}
