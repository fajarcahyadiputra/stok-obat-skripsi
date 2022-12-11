<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ObatMasuk extends Model
{
    use HasFactory;
    protected $table = 'obat_masuk';
    protected $fillable = ['kode_obat', 'supplier_id', 'satuan_id', 'jumlah', 'jumlah_sebelumnya', 'total_stok', 'penerima'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat');
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public static function laporan($dari, $sampai)
    {
        return DB::table('barang_masuk')
            ->select("barang_masuk.*", "barang.nama_barang", "supplier.nama")
            ->join('barang', "barang_masuk.id_barang", "=", "barang.id")
            ->join('supplier', "barang_masuk.id_supplier", "=", "supplier.id")
            ->whereBetween('barang_masuk.created_at', [$dari, $sampai])
            ->get();
    }
}
