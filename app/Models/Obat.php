<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $keyType = 'string';
    protected $primaryKey = 'kode_obat';
    protected $fillable = ['kode_obat', 'nama', 'jumlah', 'keterangan', 'satuan_id', 'khasiat_obat', "tanggal_kadaluarsa", "pic", "harga_satuan", "aturan_pakai"];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public static function generateKode()
    {
        $kode_max = DB::select("SELECT MAX(RIGHT(kode_obat,4)) as kode_max FROM obat");
        if ($kode_max) {
            $kode_max =  collect($kode_max)->pluck('kode_max')->toArray()[0];
            $kode_interval =  (int) $kode_max + 1;
        } else {
            $kode_interval =  1;
        }
        return 'OB' . str_pad($kode_interval, 4, '0', STR_PAD_LEFT);
    }
    public function satuan()
    {
        return $this->hasOne(Satuan::class, "id", "satuan_id");
    }
    // public function barangMasuk()
    // {
    //     return $this->hasMany(BarangMasuk::class, 'id_barang');
    // }
}
